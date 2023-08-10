<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mail;
use Hash;
use Carbon\Carbon;
use Session;
use Validator, Redirect;
use Activity;



use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contact() {
		$title = 'Contact';
		return view('front-end.pages.contact', compact('title'));

	}/*
	public function send(Request $request) {

		$this -> validate($request,
		['name' => 'required',
		'email' => 'required|email',
		'message' => 'required']);

		ContactUS::create($request -> all());
		return back() -> with('success', 'Thanks for contacting us!');

	}  */
public function contactUSPost(Request $request)
	{
	 $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
	 Contact::create($request->all());

	 Mail::send('email',
		array(
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'user_message' => $request->get('message')
		), function($message)
	{
		$message->from('saquib.gt@gmail.com');
		$message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
	});
	 return back()->with('success', 'Thanks for contacting us!');
	}


}
