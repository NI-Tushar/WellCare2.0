<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Cancel_job;
use App\Models\FamilyMamber;
use App\Models\Post;
use App\Models\Service;
use App\Models\Serviceoffer;
use App\Models\User;
use App\Models\Update_post_info;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\StoreCancelJob;
use App\Http\Requests\UpdateJobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $data = [];
        $data['services'] = Service::latest()->get();
        $data['members'] = FamilyMamber::where('user_id', auth()->user()->id)->latest()->get();
        $data['user'] = User::where('account_type', "care_taker")->latest()->get();
        $data['posts'] = Post::where('taken_id', auth()->user()->id)->latest()->get();
        return view('Frontend.Pages.Dashboard.pages.jobs', $data);
    }

    public function requested_job()
    {
        $data = [];
        $data['accepted_requests'] = Serviceoffer::where('giver_id', auth()->user()->id)->
        where('is_accepted', true)->latest()->get();
        return view('Frontend.Pages.Dashboard.pages.requested_jobs', $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJobRequest $request)
    {
        $job = new Job();
        $job->giver_id= auth()->user()->id;
        $job->taker_id= $request->taker_id;
        $job->post_id= $request->post_id;
        $job->save();
        
        // inserting caregiver id to the post table 'taken_id'
        Update_post_info::where('id', $request->post_id)->update(['taken_id' => auth()->user()->id]);
        
        $notification = [
            'message' => 'Job Accepted Successfuly!',
            'type' => 'success'
        ];
        
        return redirect()->route('job.index')->with($notification);
    }


    public function cancelledData(StoreCancelJob $request)
    {
        $exists = Cancel_job::where('giver_id', auth()->user()->id)
                   ->where('post_id', $request->post_id)
                   ->exists();
        if($exists){
            try {
                Cancel_job::where('giver_id', auth()->user()->id)->update(['reason' => $request->reason]);
                Update_post_info::where('id', $request->post_id)->update(['taken_id' => null]);
                Job::where('giver_id', auth()->user()->id)->where('post_id', $request->post_id)->delete();
                    $notification = [
                        'message' => 'Job Canceled Successfuly!',
                        'type' => 'success'
                    ];
                    return redirect()->route('job.index')->with($notification);
            } catch (QueryException $e) {
                if ($e->errorInfo[1] == 1062) {
                    return response()->json(['error' => 'Duplicate entry: This employee code already exists.'], 409);
                }
            }
        }else{
            try {
                $cencel_job = new Cancel_job();
                $cencel_job->giver_id= auth()->user()->id;;
                $cencel_job->post_id= $request->post_id;
                $cencel_job->reason= $request->reason;
                $cencel_job->save();
                Update_post_info::where('id', $request->post_id)->update(['taken_id' => null]);
                if($cencel_job){
                    $notification = [
                        'message' => 'Job Canceled Successfuly!',
                        'type' => 'success'
                    ];
                    return redirect()->route('job.index')->with($notification);
                }else{
                    echo "not found";
                }
            } catch (QueryException $e) {
                if ($e->errorInfo[1] == 1062) {
                    return response()->json(['error' => 'Duplicate entry: This employee code already exists.'], 409);
                }
            }
        }

    }


    
    
    public function taker_enrolled()
    {
        $data = [];
        // $data['jobs'] = Job::latest()->get();
        // $data['jobs'] = Job::where('taker_id', auth()->id())->get();
        $data['jobs'] = Job::where('taker_id', auth()->id())->with('user')->latest()->get();
        return view("Frontend.Pages.Dashboard.pages.enrolled_job", $data);
    }



    public function show(Job $job)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job, )
    {
        //
    }
}
