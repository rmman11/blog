<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\User;


class ImageUploadController extends Controller
{
    //
    public function index(){

      $today =  Carbon::now();
      $title   = "Home";
      
     return view('front-end/pages/welcome',compact('title'),['today' => $today]);

    }
    public function about(){
       $today =  Carbon::now();
    return view('front-end/pages/about',['today' => $today]);

    }
    public function fqa(){
    return view('front-end/pages/fqa');

    }
    public function help(){
    return view('front-end/pages/help');

    }
}
