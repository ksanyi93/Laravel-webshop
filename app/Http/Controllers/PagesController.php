<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    function home(){

        // $users = DB::table('users')->where('name', 'like', 'n%')->get();

        return view('welcome',);
    }
}
