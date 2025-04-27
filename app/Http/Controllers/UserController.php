<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request){
        $registerData=$request->validate([
            'name'=>['required','min:3','max:10', Rule::unique('users','name')],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>['required','min:8','max:10']
        ]);
        $registerData['password']=bcrypt($registerData['password']);
        $user = User::create($registerData);
        auth()->login($user);
        return redirect('/')->with('success', 'Registration successful. Welcome!');;

    

    }
    public function showRegisterForm()
{
    return view('register');
}

    public function login(Request $request)  
{
    $loginData = $request->validate([
        'loginemail' => 'required|email',
        'loginpassword' => 'required'
    ]);

    if (auth()->attempt(['email' => $loginData['loginemail'], 'password' => $loginData['loginpassword']])) {
        $request->session()->regenerate();
        return redirect('/')->with('success', 'Logged in successfully!');
    }

    return back()->withErrors([
        'loginemail' => 'The provided credentials do not match our records.',
    ]);
}

    public function showLoginForm()
{
    return view('login');
}

    public function logout()  {
        auth()->logout();
        return   redirect('/')->with('success', 'Logged out successfully!');   
    }
}
