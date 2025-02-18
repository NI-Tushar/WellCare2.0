<?php

namespace App\Http\Controllers;

use App\Action\File;
use App\Models\Configuration;
use App\Http\Requests\StoreConfigurationRequest;
use App\Http\Requests\UpdateConfigurationRequest;

class ConfigurationController extends Controller
{
 /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuration = Configuration::latest()->first();
        return view('Backend.Pages.Configure.index', compact('configuration'));
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
    public function store(StoreConfigurationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Configuration $configuration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Configuration $configuration)
    {
        return view('Backend.Pages.Configure.edit', compact('configuration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConfigurationRequest $request, Configuration $configuration)
    {
        if($request->hasFile('logo')){
            $old_image = $configuration->logo;
            File::deleteFile($old_image);

            $configuration->update([
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'companydetail' => $request->companydetail,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'video' => $request->video,
                'logo' => File::upload($request->file('logo'), 'Configuration'),
            ]);

            }elseif($request->hasFile('manual')){
                $old_manual = $configuration->manual;
                File::deleteFile($old_manual);

                $configuration->update([
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'companydetail' => $request->companydetail,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'instagram' => $request->instagram,
                    'video' => $request->video,
                    'manual' => File::upload($request->file('manual'), 'Configuration')
                ]);
            }else{
                $configuration->update([
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'companydetail' => $request->companydetail,
                    'facebook' => $request->facebook,
                    'twitter' => $request->twitter,
                    'youtube' => $request->youtube,
                    'instagram' => $request->instagram,
                    'video' => $request->video,
                    'career' => $request->career
                ]);

        }
        $this->notificationMessage('Website Configuration Update Successfully!');
        return redirect()->route('admin.configuration.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Configuration $configuration)
    {
        //
    }
}
