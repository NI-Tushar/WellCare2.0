<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view("Frontend.Pages.Register.account_type");
    }

    public function selectAccountType(Request $request)
    {
        $account_type = $request->acc_type;

        return redirect()->route('register.create_account', $account_type);
    }

    public function createAccount($type)
    {
        return view("Frontend.Pages.Register.Register", compact('type'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the request input
        $request->validate([
            'phone' => ['required', 'min:11', 'max:11'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Find the user by phone number or create a new user
        $user = User::where('phone', $request->phone)->first();

        if(!$user){

            // // Validate the request input
            // $request->validate([
            //     'phone' => ['required', 'max:11', 'unique:'.User::class],
            //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // ]);

            $user = User::create([
                'account_type' => $request->account_type,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);


            // Redirect to the createOtp route with the user ID or another identifying attribute
            return redirect()->route('register.createOtp', ['user' => $user->id]);

        }else{

            if($user->phone_verified_at === NULL){

                return redirect()->route('register.createOtp', ['user' => $user->id]);

            }elseif($user->location === NULL){


                return redirect()->route('register.create_location', ['user' => $user->id]);

            }else{

                $notification = [
                    'message' => 'This Number Already Exist a Account!',
                    'type' => 'error'
                ];

                return redirect()->route('login')->with($notification);

            }
        }

    }


    public function createOtp(User $user)
    {
        if($user->phone_verified_at === NULL){

            $user_id = $user->id;
            // Generate a new random 4-digit OTP
            $otp = random_int(1000, 9999);

            // Save the OTP in the session
            session(['otp' => $otp]);

            // Optionally, send the OTP to the user via SMS or email here
            // Example: SendOtp($user->phone, $otp);

            return view("Frontend.Pages.Register.otp", compact('user_id', 'otp'));

        }else{

            return redirect()->route('register.create_location', ['user' => $user->id]);
        }

    }

    public function OTPVarification(Request $request)
    {

        $inputOtp = $request->dig1 . $request->dig2 . $request->dig3 . $request->dig4;

        $storedOtp = session('otp');

        // return $inputOtp . '=' . $storedOtp;

        $user = User::find($request->user_id);


        if ($inputOtp == $storedOtp) {

            $user->phone_verified_at = Carbon::now();
            $user->save();

            return redirect()->route('register.create_location', ['user' => $user->id]);

        } else {

            return back()->withErrors(['otp' => 'The OTP you entered is incorrect.']);
        }
    }

    public function createLocation(User $user)
    {
        $user_id = $user->id;

        return view("Frontend.Pages.Register.location", compact('user_id'));
    }

    public function storeLocation(Request $request)
    {

         $validatedData = $request->validate([
            'location' => ['required', 'regex:/^https:\/\/maps\.app\.goo\.gl\/[A-Za-z0-9]+$/'],
        ], [
            'location.regex' => 'The location must be a valid Google Maps URL.', // Custom error message
        ]);

        $user = User::find($request->user_id);
        $user->location = $request->location;
        $user->save();



        if ($user->location !== NULL && $user->phone_verified_at !== NULL) {

            event(new Registered($user));

            Auth('web')->login($user);

            return redirect(RouteServiceProvider::HOME);

        } else {

            return back()->withErrors(['error' => 'kindly Varify your account. Thank You']);
        }
    }

}
