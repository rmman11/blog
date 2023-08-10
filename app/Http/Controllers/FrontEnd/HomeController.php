<?php



namespace App\Http\Controllers\FrontEnd;

use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('front-end.pages.home',compact('user'));
    }
    public function faq(){
        $viewData = [];
        $viewData["subtitle"] = "FAQ";
        return view('front-end.pages.faq')->with('viewData',$viewData);

       }  
}
