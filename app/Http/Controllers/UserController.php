<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(): View {
        return view('user.index');
    }
    
    public function login(Request $request){
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        $remember = ($request->filled('remember') ? true : false);

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended(route('book.index'));
        }else{
            return redirect()->route('login')->with('credencialesIncorrectas', __('password or username are invalid'));
        }
    }

    public function viewCreateUser(){
        return view('user.createUser');
    }
     
    public function register(Request $request){
        if($request->password1 === $request->password2){
            $user = new User();
            $user->name = $request->name;
            $user->password = Hash::make($request->password1);
            $user->save();
            Auth::login($user);
            return redirect()->route('book.index');
        }else{
            return redirect()->route('viewCreateUser');
        }
        
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    
}
