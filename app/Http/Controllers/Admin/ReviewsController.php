<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Category;
use App\Models\Review;

class ReviewsController extends Controller
{
  protected $reviews;
  protected $requests;

  public function __construct(Review $reviews, Request $requests) {
    $this->reviews = $reviews;
    $this->requests = $requests;
  }
 

  public function editreview() {
    $tasks = $this->reviews->get();
    //return all $tasks;
    return view('pages.editreview', compact('tasks'));
  }


  public function index() {
	$categories = Category::get()->pluck('name', 'id');

		return view('admin.reviews.index',compact('categories'));
	}


  public function fetchAll() {

	$reviews = Review::with('category')->get();
    //$reviews = Review::all();
		$output = '';
		if ($reviews->count() > 0) {
			$output .= '<table class="table table-bordered table-striped table-hover datatable" id="datatablesSimple"  style="float:left">
            <thead>
              <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Content</th>
                <th>Rating</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($reviews as $rev) {
				$output .= '<tr>
                <td>' . $rev->id . '</td>
                <td>' . optional($rev->category)->name .'</td>
                <td>' . $rev->title . '</td>
                <td>' . substr($rev->content, 0, 50)  . '</td>
                <td>' . $rev->rating . '</td>
                <td>
                  <a href="#" id="' . $rev->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal"><i class="fas fa-edit" style="font-size:36px"></i></a>

				  <a href="#" id="' . $rev->id . '" class="text-danger mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal"><i class="fas fa-eye text-success  fa-lg"></i></a>


                  <a href="#" id="' . $rev->id . '" class="text-danger mx-1 deleteIcon">    <i class="fas fa-trash fa-lg text-danger"></i></a>
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
	
		$revData = ['categ_id' => $request->categ_id, 
		            'title' => $request->title, 
					'content' => $request->content, 
					'rating' => $request->rating
				];
		Review::create($revData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$rew = Review::find($id);
		return response()->json($rew);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
	
		
		$rev = Review::find($request->id);
	

		$revData = [
		'categ_id' => $request->categ_id, 
		'title' => $request->title, 
		'content' => $request->content, 
		'rating' => $request->rating
	];

		$rev->update($revData);
		return response()->json([
			'status' => 200,
		]);
	}



	public function show($id = 0){

	  $rev = Review::with('category')->find($id);
   
		 $html = "";
		 if(!empty($rev)){
			$html = "<div class='card-body'>
		   <div class='mb-2'>
			   <table class='table table-bordered table-striped'>
				   <tbody>
					   <tr>
						   <th>
							   Id
						   </th>
						   <td>
							   ".$rev->id."
						   </td>
					   </tr>
					   <tr>
						   <th>
						   Categorie
						   </th>
						   <td>
							   ".optional($rev->category)->name ."
						   </td>
					   </tr>
					   <tr>
						   <th>
							  Title
						   </th>
						   <td>
							   ".$rev->title ."
						   </td>
					   </tr>
   
   <tr>
						   <th>
							  Content
						   </th>
						   <td>
							   ".substr($rev->content, 0, 150)."
						   </td>
   </tr>
					   <tr>
						   <th>
							   Data
						   </th>
						   <td>
							   ".$rev->created_at."
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
    $rev = Review::find($id);
    $rev->delete();
  }



 
}
