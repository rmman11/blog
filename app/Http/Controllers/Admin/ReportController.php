<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;
use Carbon\Carbon;
use Validator, Redirect;


class ReportController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');


    }
    public function index()
    {

        $today =  Carbon::now();
         $title   = "Report";


    //    dd($tasks);
        return view('admin.reports.index',compact('title'));
    }

    public function report_payment(){

        $today =  Carbon::now();
        $title   = "Report Payment";


   //    dd($tasks);
       return view('admin.reports.payment',compact('title'));
    }
  
    public function report_leave(){

        $today =  Carbon::now();
        $title   = "Report Leave";


   //    dd($tasks);
       return view('admin.reports.leave',compact('title'));
    }


  
    public function report_daily(){

        $today =  Carbon::now();
        $title   = "Report Daily";


   //    dd($tasks);
       return view('admin.reports.daily',compact('title'));
    }

}
