<?php

namespace App\Http\Controllers;
use App\Action\File;
use App\Models\FamilyMamber;
use App\Http\Requests\StoreFamilyMamberRequest;
use App\Http\Requests\UpdateFamilyMamberRequest;

class FamilyMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreFamilyMamberRequest $request)
    {
        $request->validate([
            'nid_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);
        if ($request->hasFile('nid_img')) {
            $imgPath = File::upload($request->file('nid_img'), 'members_nid');
            $user = auth()->user();
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
        
        $member = new FamilyMamber();
        $member->user_id = $request->id;
        $member->nid_name= $request->member_name;
        $member->nid_number= $request->nid_number;
        $member->nid_image = $imgPath;
        $member->address= $request->member_address;
        $member->relation= $request->relation;
        $member->save();

        $notification = [
            'message' => 'Member Added Successfuly!',
            'type' => 'success'
        ];

        return redirect()->route('user.profile')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(FamilyMamber $familyMamber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FamilyMamber $familyMamber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFamilyMamberRequest $request, FamilyMamber $familyMamber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FamilyMamber $familyMamber)
    {
        //
    }
}
