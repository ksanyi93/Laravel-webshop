<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function enter(){

        //print(Hash::make('1122'));  jelszó generálás
        return view('enter');
    }
}
