<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showlogin(){
        return view('auth.login');
    }

    public function showregister(){
        return view('auth.register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('login')->with('successRegist', 'Akun berhasil dibuat, silakan login');
    }

    public function login(Request $request){
       $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6'],
        ]);

       if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if($user->role === 'admin'){
                return redirect()->route('admin.dashboard');
            }elseif($user->role === 'user'){
                return redirect()->route('user.home.index');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }
}
