<?php

namespace App\Http\Controllers;
use App\Action\File;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
        /**
     * Update the user's profile information.
     */
    public function profile_img(Request $request)
    {
        $request->validate([
            'profile_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ]);


        if ($request->hasFile('profile_img')) {
            // Upload the image and store the path
            $imgPath = File::upload($request->file('profile_img'), 'Profiles');

            // Save the uploaded image path to the authenticated user
            $user = auth()->user();
            $user->image = $imgPath;
            $user->save();

            // Notification for successful upload
            $notification = [
                'message' => 'Profile Image Uploaded Successfully!',
                'type' => 'success',
            ];
        } else {
            // Notification for error
            $notification = [
                'message' => 'Something went wrong, please try again.',
                'type' => 'error',
            ];
        }

        // You can return or redirect with notification
        return redirect()->back()->with('notification', $notification);


    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

}
