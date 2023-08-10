<?php

namespace App\Http\Controllers\Admin;


use App\Models\Employee;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Session;
use Validator, Redirect;
use DB;
use File;
use Carbon\Carbon;

class EmployeesController extends Controller {

	// set index page view
	public function index() {

		return view('admin.employees.index');
	}

	// handle fetch all eamployees ajax request
	public function fetchAll() {
		$emps = Employee::all();
		$output = '';
		if ($emps->count() > 0) {
			$output .= '
		  
 
			<table class="table table-bordered table-striped table-hover datatable" id="datatablesSimple" style="float:left">
            <thead>
              <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Post</th>
                <th>Phone</th>
				<th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($emps as $emp) {
				$output .= '<tr>
                <td>' . $emp->id . '</td>
                <td><img src="../public/images/employees/' . $emp->avatar . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $emp->first_name . ' ' . $emp->last_name . '</td>
                <td>' . $emp->email . '</td>
                <td>' . $emp->post . '</td>
                <td>' . $emp->phone . '</td>';


			 if($emp->status == '1'){  

			$output .= '<td>
			
			<a href="'.url('/admin/employees/status-update',$emp->id).'"
			class="toggle-switch"  data-onstyle="success" data-offstyle="danger" data-toggle="toggle" 
			data-on="Active" data-off="InActive" >Active</a> </td>';
					
					}else{ 
					
				$output .= '<td><a  href="'. url('/admin/employees/status-update',$emp->id).'" 
				class="toggle-switch toggle-label" data-onstyle="success"
				 >Inactive<a></a></td>';
					
				 } 
		




				 $output .= '
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal" title="edit"><i class="fas fa-edit fa-lg" ></i></a>
				  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#viewEmployeeModal" title="view">        <i class="fas fa-eye text-success  fa-lg"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon" title="delete">    <i class="fas fa-trash fa-lg text-danger"></i></a>
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
	
		$file = $request->file('avatar');
		$fileName = time() . '.' . $file->getClientOriginalExtension();
		Image::make($file)->resize(300, 300)->save(public_path('/images/employees/' . $fileName) );
			

	  

		$empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post,'avatar' => $fileName];
		Employee::create($empData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Employee::find($id);
		return response()->json($emp);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		//$emp = Employee::find($request->emp_id);
		
		$emp = Employee::find($request->emp_id);
	

		if($request->hasFile('avatar') ){
			$file = $request->file('avatar');
		   // $product->image = $filename;
		   $timestamp = str_replace([' ', ':'], '-', Carbon::now() -> toDateTimeString());
		   $fileName = $timestamp . '-' . $file -> getClientOriginalName();
		   $data['avatar'] = '/images/employees' . $request->file('avatar')->getClientOriginalName();
		   $user->avatar = $fileName;
		   $file->move(public_path() . '/images/employees/', $fileName);
		}

		$empData = ['first_name' => $request->fname, 'last_name' => $request->lname, 'email' => $request->email, 'phone' => $request->phone, 'post' => $request->post, 'avatar' => $fileName];

		$emp->update($empData);
		return response()->json([
			'status' => 200,
		]);
	}


	function status_update($id)
	{
		//get product status with the help of product ID
		$product = DB::table('employees')
					->select('status')
					->where('id','=',$id)
					->first();
	
		//Check user status
		if($product->status == '1'){
			$status = '0';
		}else{
			$status = '1';
		}
	
		//update product status
		$values = array('status' => $status );
		DB::table('employees')->where('id',$id)->update($values);
	
		session()->flash('msg','Product status has been updated successfully.');
		return back();
	}

	public function show($id = 0){

		$emp= Employee::find($id);
   
		 $html = "";
		 if(!empty($emp)){
			$html = "<div class='card-body'>
		   <div class='mb-2'>
			   <table class='table table-bordered table-striped'>
				   <tbody>
					   <tr>
						   <th>
							   Id
						   </th>
						   <td>
							   ".$emp->id."
						   </td>
					   </tr>
					   <tr>
						   <th>
						   Name
						   </th>
						   <td>
							   ".$emp->first_name."
						   </td>
					   </tr>
					   <tr>
						   <th>
							  Email
						   </th>
						   <td>
							   ".$emp->email ."
						   </td>
					   </tr>
   
   <tr>
						   <th>
							  Post
						   </th>
						   <td>
							   ".$emp->post."
						   </td>
   </tr>
					   <tr>
						   <th>
							   Data
						   </th>
						   <td>
							   ".$emp->created_at."
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
		$emp = Employee::find($id);
		if (File::delete('/public/images/avatars/' . $emp->avatar)) {
			Employee::destroy($id);
		}
	}
}