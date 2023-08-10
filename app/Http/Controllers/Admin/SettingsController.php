<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\ResetPasswordRequest;
use App\Newsletter;
use Carbon\Carbon;
use DB;
use Session;
use App\Models\User;
use App\Models\AdminUser;


class SettingsController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth');
  //  $this->middleware(['auth', 'verified']);
  }

  public function index(){

      	$title = 'sitemap';
    		$today =  Carbon::now();

       return view('admin.settings.index',compact('title'),['today' => $today]);
  }
  //=== list of Newsletter from db ===
  public function newsletter() {

      // = Newsletter::all();
    $newsletters = DB::table('newsletter')
       ->select('id','name','email','created_at')
         -> get();
      return view('admin.settings.newsletter',compact('newsletters'));
  }



  //====  delete Newsletter ====
  public function destroy(Request $request,$id)
  {


     DB::table('newsletter')->where('id', $id)->delete();
      return redirect()->route('admin.settings.newsletter');
  }

  public function massDestroy(Request $request)
    {

        Newsletter::whereIn('id', request('ids'))->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }


//*----------------- change password---------------------*/
public function resetPassword(ResetPasswordRequest $request){


  
 
  if (auth()->attempt(['email'=> auth()->user()->email,'password' => $request->password])) {
    
    //cream o parola criptata

    $newPassword = bcrypt($request->new_password);
    $user= AdminUser::findOrFail(auth()->id());
    $user->password=$newPassword;
    $user->save();
    
  }


  return redirect()->back()->with('message','The password has been changed successfully.The new password for this account is<br/>:<strong>'.$request->new_password.'</strong>');

 }




}
