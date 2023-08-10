<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\AdminUser;


    class AdminUserController extends Controller
    {

        public function __construct()
        {
            //$this->middleware('guest:admin')->except('logout');
        }

   
        public function showAdminLoginForm()
        {
            return view('admin.login', ['url' => 'admin']);
        }
 
        public function logare(Request $request) {

            // Validate the user
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            // Log the user In
            $credentials = $request->only('email','password');

            if (! Auth::guard('admin')->attempt($credentials)) {
                return back()->withErrors([
                    'message' => 'Wrong credentials please try again'
                ]);
            }

            // Session message
            session()->flash('msg','You have been logged in');

            return redirect('/admin/dashboard');

        }


/*-------this for logout from admni panel--------*/
        public function logout() {
            auth()->guard('admin')->logout();

            session()->flash('msg','You have been logged out');

           return redirect('/admin/login');
        }

    }
