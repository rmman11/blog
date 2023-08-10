<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Models\User;
use App\Models\AdminUser;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Charts\ExpensesChart;
use Illuminate\Http\Request;
use DB;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{



 

    public function __construct()
    {
        $this->middleware('auth');
        
    }

 
    public function dashboard(ExpensesChart $chart) {
 
        $user = new User();
   

        $chart_options = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart1 = new LaravelChart($chart_options);

 
	 return view('admin.dashboard',compact('user','chart1'),['chart' => $chart->build()]);
 
    }

   public function profile(AdminUser $user)
    {
        $title = 'profile';
        $user  = Auth::user();
      //  dd($user);
        return view('admin.profile.index', compact('user'));
    }

}
