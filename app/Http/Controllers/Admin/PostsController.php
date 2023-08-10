<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function index(Request $request) {


		$categories = Category::all();
		$post = Post::all();
	    return view('admin.posts.index', compact('categories','post'));

		//dd($post);
	}




	// handle fetch all eamployees ajax request
	public function fetchAll() {
        $posts = Post::with('category')->get();
		$output = '';
		if ($posts->count() > 0) {
			$output .= '<table class="table table-bordered table-striped table-hover datatable" id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Content</th>
                <th>Slug</th>
                <th>Published</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
           
			foreach ($posts as $post) {
				$output .= '<tr>
                <td>' . $post->id . '</td>
                <td>' . optional($post->category)->name  .'</td>
                <td>' . $post->title . '</td>
                <td>' . $post->content . '</td>
                <td>' . $post->slug . '</td>
                <td>' . $post->status . '</td>
                <td>
                  <a href="#" id="' . $post->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editPostModal" title="edit"><i class="fas fa-edit fa-lg" ></i></a>
				  <a href="#" id="' . $post->id . '" class="text-danger mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#viewPostModal" title="view">        <i class="fas fa-eye text-success  fa-lg"></i></a>
                  <a href="#" id="' . $post->id . '" class="text-danger mx-1 deleteIcon" title="delete">    <i class="fas fa-trash fa-lg text-danger"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}

	// handle insert a new employee ajax request
	public function store(Request $request) {
	

  $postData = [ 
			
		'user_id' => $request->user()->id,
		'category_id' => $request->input('category_id'),
		'title' => $request->title,
		'slug' => \Str::slug($request->slug),
		'content' => $request->content,
		'status' => $request->has('published',1)
		
	];
		Post::create($postData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an post ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$post = Post::find($id);
		$categories = Category::find($id);
		return response()->json($post);
	}

	// handle update an post ajax request
	public function update(Request $request) {
	
		
		$post = Post::find($request->id);

		$postData = [ 
			
			'user_id' => $request->user()->id,
			'category_id' => $request->input('category_id'),
			'title' => $request->title,
			'slug' => \Str::slug($request->slug),
			'content' => $request->content,
			'status' => $request->has('status',1)
			
		];

		$post->update($postData);
		return response()->json([
			'status' => 200,
		]);
	}



	public function show($id = 0){

		$posts= Post::find($id);
		 $user=User::find($id); 
				
   
		 $html = "";
		 if(!empty($posts)){
			$html = "<div class='card-body'>
		   <div class='mb-2'>
			   <table class='table table-bordered table-striped'>
				   <tbody>
					   <tr>
						   <th>
							   Id
						   </th>
						   <td>
							   ".$posts->id."
						   </td>
					   </tr>
					   <tr>
						   <th>
						   Name
						   </th>
						   <td>
							   ".$posts->title ."
						   </td>
					   </tr>
					   <tr>
						   <th>
							  User
						   </th>
						   <td>
							   ".$user->name ."
						   </td>
					   </tr>
					   <tr>
						   <th>
							  Content
						   </th>
						   <td>
						  ".$posts->content ."
						   </td>
						   </tr>
   
						   <tr>
						   <th>
							  Slug
						   </th>
						   <td>
							   ".$posts->slug."
						   </td>
					 </tr>
					   <tr>
						   <th>
							   Data
						   </th>
						   <td>
							   ".$posts->created_at."
						   </td>
					   </tr>
					   <tr>
				 
					   </tr>
				   </tbody>
			   </table>
		   </div>";
		 }
		 $response['html'] = $html;
   
		 return response()->json($response);
	  }

	// handle delete an employee ajax request
	public function delete(Request $request) {
		$id = $request->id;
         $post= Post::find($id);//obtinerea unui id
        $post->delete();

       // dd($post);
    }

}
