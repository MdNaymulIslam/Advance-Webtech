<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerPages extends Controller
{
    //
    public function home(){
    return view('Home');
}
public function service(){
    return view('service');
}
public function teams(){
    return view('OurTeam');
}
public function aboutus(){
    return view('AboutUs');

}
public function contactus(){
    return view('ContactUs');
}
}