<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnterController extends Controller
{
    function enter(Request $request){
        //dd($request->all());

        $loggedin = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);

        if($loggedin == true){
            if(Session::get('redirecturl')){
                return redirect(Session::get('redirecturl'));
            }
            else{
                return redirect('profile');
            }
        }

        if($loggedin == false){
            return redirect('enter')->with('false_message', 'Nem sikerült a belépés,kérem először lépjen be!');
        }

    }
}
