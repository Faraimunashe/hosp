<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\BirthYearRule;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstname' => ['required', 'string'],
            'lastname' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'dob' => ['required', new BirthYearRule()],
            'phone' => ['required', 'digits:10'],
            'address' => ['required', 'string']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole('user');

        event(new Registered($user));

        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->firstname = $request->firstname;
        $patient->lastname = $request->lastname;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
