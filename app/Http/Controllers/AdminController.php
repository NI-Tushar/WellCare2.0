<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Packages;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::latest()->get();
        return view('Backend.Pages.Admin.index', compact('admins'));
    }

    // ______________________________ PACKAGE FUNCTION START
    public function package()
    {
        $packages = Packages::latest()->get();
        return view('Backend.Pages.Admin.package', compact('packages'));
    }
    public function addPackage()
    {
        return view('Backend.Pages.Admin.addPackage');
    }
    public function storePackage(Request $request)
    {
        $add_package= new Packages();
        $add_package->name= $request->name;
        $add_package->apply= $request->apply;
        $add_package->price= $request->price;
        $add_package->save();
        return redirect()->route('admin.manage.package');
    }
    public function delete($id)
    {
        $package = Packages::find($id);
        if ($package) {
            $package->delete();
            $this->notificationMessage('Package Deleted Successfully!');
            return redirect()->route('admin.manage.package');
        } else {
            $this->notificationMessage('Package Deleted Successfully!');
            return redirect()->route('admin.manage.package');
        }
    }
    // ______________________________ PACKAGE FUNCTION END
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.Pages.Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        if($request->password === $request->repassword) {
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' =>  $request->role,
            ]);
            $this->notificationMessage('New User Added Successfully!');
            return redirect()->route('admin.add-admin.index');
        } else {
            return back()->with('repassword', 'Passwords do not match');
        }        
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        return view('Backend.Pages.Admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        if($request->password){
            if($request->repassword){
                if($request->password === $request->repassword) {
                    $admin->update([
                        'name' => $request->name,
                        'role' => $request->role,
                        'password' => Hash::make($request->password),
                    ]);
                    $this->notificationMessage('User Update Successfully!');
                    return redirect()->route('admin.add-admin.index');
                } else {
                    return back()->with('repassword', 'Passwords do not match');
                } 
            }else{
                return back()->with('repassword', 'Please Enter Re-Passwords');
            }
        }else{
            $admin->update([
                'name' => $request->name,
                'role' => $request->role,
            ]);
            $this->notificationMessage('User Update Successfully!');
            return redirect()->route('admin.add-admin.index'); 
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $deleteAdmin = $admin->delete();
        if($deleteAdmin){
            $this->notificationMessage('User Deleted Successfully!');
            return redirect()->route('admin.add-admin.index');
        }
    }
}
