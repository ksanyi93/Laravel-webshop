<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class PageController extends Controller
{
    function user1(){
        return "Én vagyok a ".__FUNCTION__.".";
    }

    function user2(){
        return "Én vagyok a ".__FUNCTION__.".";
    }

    function user3(){
        return "Én vagyok a ".__FUNCTION__.".";
    }

    function vendeg1(){
        return "Én vagyok a ".__FUNCTION__.".";
    }

    function vendeg2(){
        return "Én vagyok a ".__FUNCTION__.".";
    }

    function vendeg3(){
        return "Én vagyok a ".__FUNCTION__.".";
    }

    function test(){
        return "Ez egy teszt szöveg.";
    }










    /* function showpage(){

        $asszoctombom=[
            'tomb' => ['alma', 'körte', 'szilva', 'dinnye'],
            'cím' => 'Gyümölcsök'
        ];
        return view('welcome', $asszoctombom);
    }


    function contact(ContactFormRequest $request){

        $checked_data = $request->validated();

        
        return redirect()->back()->with('message', 'Sikerült a küldés!');
    } */



    function users(){


        $user = User::findOrFail(13);
        $user->update([
            'password'=>5563,
            'email'=>'lajos@vipmail.hu'
        ]);

        /* User::create([
            'name'=>'Lilla',
            'email'=>'lilla44@citromail.hu',
            'password'=>Hash::make(12122)
        ]); */

        $user = User::findOrFail(17);



        /* $user = User::create([
            'name'=>'Lali',
            'email'=>'lali@lali.hu',
            'password'=>Hash::make(12122)
        ]); 
        --------Modellek segítségével------
        */





        /* DB::table('users')->insert([
            'name'=>'Jani',
            'email'=>'jani@jani.hu',
            'password'=>Hash::make(12122)
        ]);

        $user = DB::table('users')->where('id',3)->first(); 
        
        ------ DB osztály használatával -----
        */

        return view('users', [
            'user'=>$user??''
        ]);
    }
}
