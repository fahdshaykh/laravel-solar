<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\NewSpeakerRegistrationMail;
use App\Mail\NewUserRegistrationMail;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\UserDetail;
use App\Notifications\NewUserRegistrationNotification;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        $usertype = $request->usertype;
        $states = State::get();
        $countries = Country::get();
		//$denominations = Denomination::get();
		//dd($denominations);
        $title = 'Register as '.$usertype;
        return view('website.register',compact('usertype','states','countries','title'));
        
       
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'contact_number' => 'required|unique:user_details,contact_number',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
//dd($request->denomination);
		$randomPassword=$request->password;
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country' => 'United States',
            'state' => $request->state,
            'usertype' => $request->usertype,
            'password' => Hash::make($request->password),
        ]);
        //dd($request->denomination);
        UserDetail::create(['user_id'=>$user->id,'contact_number'=>$request->contact_number]);
        event(new Registered($user));

        Auth::login($user);
        $admin = User::where('usertype','admin')->first();
        $admin->notify(new NewUserRegistrationNotification($user));
       
            Mail::to($user->email)->queue(new NewUserRegistrationMail($user, $randomPassword));
            return redirect()->to('/dashboard')->with('success','Logged In Successfully');
        
        return redirect(RouteServiceProvider::HOME);
    }
	
	
	 public function registeradmin(Request $request): RedirectResponse
    {
        
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'contact_number' => 'required|unique:user_details,contact_number',
        ]);
        $profilephot ='';
		if ($image = $request->file('profile_photo')) {
            request()->validate([
                'profile_photo' => 'image|mimes:jpg,png,jpeg|max:50000',
            ]);
            $destinationPath = public_path('profile/');
            $profileImage = 'cover'.date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $profilephot = "$profileImage";
           
        }
        $randomPassword = Str::random(8);
		//ye random password es user ko email kr dena he first time per
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'country' => 'United States',
            'state' => '',
            'usertype' => $request->usertype,
            'gender' => 'Male',
            'password' => Hash::make($randomPassword),
            'image'=>$profilephot,
            'intro' => $request->intro,
        ]);
        //dd($request->denomination);
        UserDetail::create(['user_id'=>$user->id,'contact_number'=>$request->contact_number]);
        event(new Registered($user));

       // Auth::login($user);
        $admin = User::where('usertype','admin')->first();
        $admin->notify(new NewUserRegistrationNotification($user));
       // $user->rawpassword = $randomPassword;

            Mail::to($user->email)->queue(new NewUserRegistrationMail($user, $randomPassword));
            
			if($request->usertype=='staff'){return redirect()->to('/allusers')->with('success','Staff added Successfully');}
			elseif($request->usertype=='customer'){return redirect()->to('/allcustomers')->with('success','Customer added Successfully');}
			elseif($request->usertype=='sale reps'){return redirect()->to('/allsalereps')->with('success','Sale rep added Successfully');}
			elseif($request->usertype=='contractor'){return redirect()->to('/allcontractors')->with('success','Contractor added Successfully');}
			else{return redirect()->back()->with('success','Status Changed successfully');}
            
            
        //return redirect(RouteServiceProvider::HOME);
    }
}
