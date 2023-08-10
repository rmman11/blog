<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Models\Album;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class learnLaravel extends Controller
{
    //
    public function index(){

      $today =  Carbon::now();
      $title   = "Home";
      $albums = Album::with('Photos')->paginate(5);
     return view('front-end/pages/welcome',compact('title','albums'),['today' => $today])  
     ->with('i', (request()->input('page', 1) - 1) * 3);

    }
    public function about(){
       $today =  Carbon::now();
    return view('front-end/pages/about',['today' => $today]);

    }
  


    public function blog()
{

        $viewData = [];
        $posts = Post::latest('created_at')->paginate(5);
        $viewData["title"] = "Posts all information";
        $viewData["subtitle"] = $posts['title'];
        return view('front-end.blog.blog',compact('posts'))->with("viewData", $viewData);
}              
  

public function show_blog($id){

                $viewData = [];
                $posts = Post::findOrFail($id);
                $user=User::find($id); 
                
                $viewData["title"] = " - Details Blog";
                $viewData["subtitle"] = $posts["title"];
                $viewData["posts"] = $posts;
                $viewData["user"] =$user;
                return view('front-end.blog.show_blog',compact('user'))->with("viewData", $viewData);

}   
}
