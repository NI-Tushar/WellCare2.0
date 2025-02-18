<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\FamilyMamber;
use App\Models\Service;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['services'] = Service::latest()->get();
        $data['members'] = FamilyMamber::where('user_id', auth()->user()->id)->latest()->get();
        $data['posts'] = Post::where('user_id', auth()->user()->id)->latest()->get();
        return view('Frontend.Pages.Dashboard.pages.post', $data);
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
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title= $request->title;
        $post->slug= $request->title;
        $post->user_id= auth()->user()->id;
        $post->service_id= $request->service;
        $post->family_member_id= $request->carefor;
        $post->budget= $request->budget;
        $post->date= $request->date;
        $post->time= $request->time;
        $post->start_time= $request->start_time;
        $post->end_time= $request->end_time;
        $post->gender= $request->gender;
        $post->description= $request->description;
        $post->save();

        $notification = [
            'message' => 'Post Created Successfuly!',
            'type' => 'success'
        ];

        return redirect()->route('post.index')->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
