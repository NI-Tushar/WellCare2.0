<?php

namespace App\Http\Controllers;
use App\Action\File;
use App\Models\Configer;
use App\Models\FamilyMamber;
use App\Models\Order;
use App\Models\Service;
use App\Models\Post;
use App\Models\Job;
use App\Models\User;
use App\Models\Serviceoffer;
use App\Models\Update_user_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $data = [];
        $data['services'] = Service::latest()->get();
        $data['members'] = FamilyMamber::latest()->get();
        $data['posts'] = Post::where('user_id', auth()->id())->latest()->get();
        
        if(auth()->user()->account_type === 'care_taker'){
            $data['offers'] = Serviceoffer::where('taker_id', auth()->id())->latest()->get();
            $data['giver_acc'] = User::where('account_type', "care_giver")->latest()->get();
            return view("Frontend.dashboard", $data);
            
        }elseif(auth()->user()->account_type === 'care_giver'){
            $data['all_post'] = Post::latest()->get();
            return view("Frontend.giver_dashboard", $data);
        }
    }

    public function profile()
    {
        // return auth()->user();
        $data = [];
        $data['services'] = Service::latest()->get();
        return view("Frontend.Pages.Dashboard.pages.profile",$data);
    }
    public function my_post()
    {
        $data = [];
        return view("Frontend.Pages.Dashboard.pages.my_post");
    }

    public function updateUserInformation(Request $request, Update_user_info $user)
    {
        $request->validate([
            'user_nid_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);
        if ($request->hasFile('user_nid_img')) {
            $imgPath = File::upload($request->file('user_nid_img'), 'user_nid');
            $user = auth()->user();
            $user->nid_image = $imgPath;
            $user->save();
            $notification = [
                'message' => 'NID Uploaded Successfully!',
                'type' => 'success',
            ];
        } else {
            $notification = [
                'message' => 'NID Image Cannot Upload, Please Try Again.',
                'type' => 'error',
            ];
        }
            $info = Update_user_info::find($request['id']);
            $info->name = $request['fullname'];
            $info->division = $request['division'];
            $info->state = $request['state'];
            $info->city = $request['city'];
            $info->address = $request['address'];
            $info->nid_number = $request['nid_number'];
            $info->gender = $request['gender'];
            $info->service = $request['service'];
            $info->budget = $request['asking_amount'];
            $info->profile_heading = $request['headline'];
            $info->save();

            $this->notificationMessage('Profile Updated Successfully!');
            return redirect()->route('user.profile');

    }

}
