<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use App\Models\Job;
use App\Models\Serviceoffer;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\AcceptServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['services'] = Service::latest()->get();
        $data['my_offer'] = Serviceoffer::where('giver_id', auth()->id())->with('user')->latest()->get();
        return view("Frontend.Pages.Dashboard.pages.my_offer", $data);
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
    public function store(StoreServiceRequest $request)
    {
        $service = new Serviceoffer();
        $service->giver_id = $request['giver_id'];
        $service->taker_id = auth()->user()->id;
        $service->service_title = $request['service_title'];
        $service->service = $request['service'];
        $service->budget = $request['budget'];
        $service->date = $request['date'];
        $service->start_time = $request['start_time'];
        $service->end_time = $request['end_time'];
        $service->gender = $request['gender'];
        $service->carefor = $request['carefor'];
        $service->description = $request['description'];

        $service->save();

        $notification = [
            'message' => 'Offer Submitted Successfuly!',
            'type' => 'success'
        ];
        return redirect()->route('post.index')->with($notification);;
    }

    public function store_offer(AcceptServiceRequest $request)
    { 
        $offer = new Job();
        $offer->taker_id = $request['taker_id'];
        $offer->giver_id = auth()->user()->id;
        $offer->offer_id = $request['offer_id'];
        $offer->save();

        Serviceoffer::where('giver_id', auth()->user()->id)->where('taker_id', $request['taker_id'])->update(['is_accepted' => true]);

        $notification = [
            'message' => 'Offer Accepted Successfuly!',
            'type' => 'success'
        ];
        return redirect()->route('requested_job')->with($notification);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
