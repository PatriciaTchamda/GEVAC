<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthentificationController extends Controller
{
    public function login()
    {
        return view('pages.Authentification.login');
    }

    public function registration()
    {
        return view('pages.Authentification.registration');
    }

    public function connexion(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'login'=>'required',
            'password'=>'required',
            'service'=>'required',
        ]);
        $user = new User();

        $user->nom = $request->name;
        $user->login = $request->login;
        $user->password = Hash::make($request->password);
        $user->service = $request->service;
        $res = $user->save();

        if ($res) {
            return back()->with('success',"Registered Successfuly");
        }else{
            return back()->with('success',"Something Wrong");
        }

    }

    public function authentifier(Request $request)
    {
        $request->validate([
            'login'=>'required',
            'password'=>'required',
        ]);
        $user = User::where("login",$request->login);

        if ($user) {
            if (Hash::check($request->password,$user->password)) {
                $request->session()->put('LoginIn', $user->id);
                return redirect('dashboard');
            } else{
                return back()->with('fail',"The Password not matches");
            }
        }else{
            return back()->with('fail',"The Login is not registered");
        }

    }

    public function dashboard()
    {
        return "Welcome to your dashboard";
    }

}
