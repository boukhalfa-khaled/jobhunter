<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $user_attrubutes = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $employer_attrubutes =  $request->validate([
            'employer_name' => ['required'],
            'employer_logo' => ['required', 'file', 'max:2048'],
        ]);

        
        $user = User::create($user_attrubutes);
        $logoPath = basename($request->employer_logo->store('public'));
        $user->employer()->create([
            'name' => $employer_attrubutes['employer_name'],
            'logo' => $logoPath
        ]);

        event(new Registered($user));

        
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
    
    public function dashboard(){
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }
}
