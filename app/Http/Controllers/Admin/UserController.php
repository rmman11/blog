<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator, Redirect;
use DB;
use File;
use Cache;
use Carbon\Carbon;

class UserController extends Controller
{
    //

    public function __construct(){

   $this->middleware('admin');

    }   
  public function index(){


     return view('admin.users.index');

  }


  public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}


  public function fetchAll() {
		$users = User::all();


		$output = '';
		if ($users->count() > 0) {
			$output .= '
  
      <table class="table table-bordered table-striped table-hover datatable datatable-Users" id="datatablesSimple">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Image</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Last Seen</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
			foreach ($users as $user) {


				$output .= '<tr>
                <td>' . $user->id . '</td>
             
                <td>' . $user->name .'</td>
                <td>' . $user->email . '</td>
                <td><img src="../public/images/avatars/' . $user->photo . '" width="50" class="img-thumbnail rounded-circle"></td>
                <td>' . $user->phone . '</td> 
                <td>' . $user->gender . '</td>';



              if(Cache::has('user-online' . $user->id))
              {
              $output .='<td> <span class="text-green-500">Online</span></td>';
              }else{
                $output .= '<td><span class="text-gray-500">Offline</span></td>'; 
              }


                 $output .='  <td>'. \Carbon\Carbon::parse($user->last_seen)->diffForHumans() .'</td>
             
         

                <td>
          <a href="#" id="' . $user->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editUserModal" title="edit"><i class="fas fa-edit fa-lg" ></i></a>
				  <a href="#" id="' . $user->id . '" class="text-danger mx-1 viewIcon" data-bs-toggle="modal" data-bs-target="#viewUserModal" title="view"><i class="fas fa-eye text-success  fa-lg"></i></a>
          <a href="#" id="' . $user->id . '" class="text-danger mx-1 deleteIcon" title="delete">    <i class="fas fa-trash fa-lg text-danger"></i></a>
                </td>
              </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
	}


  public function create()
  {
      //add in database
    return view('admin.users.create');

  }
  public function store(Request $request) {
	


  $file = $request->file('photo');
  $fileName = time() . '.' . $file->getClientOriginalExtension();
  Image::make($file)->resize(300, 300)->save(public_path('/images/avatars/' . $fileName) );
	  

		$userData = [
      
     'name' => $request->name, 
     'email' => $request->email,
     'gender' => $request->gender,
     'phone' => $request->phone, 
     'status' => 1,
     'photo' => $fileName,
     'password' => Hash::make('password')
    
    ];
		User::create($userData);
		return response()->json([
			'status' => 200,
		]);
	}

	// handle edit an employee ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$users = User::find($id);
		return response()->json($users);
	}

	// handle update an employee ajax request
	public function update(Request $request) {
		$fileName = '';
		//$emp = Employee::find($request->emp_id);
		
		$user = User::find($request->id);


    if($request->hasFile('photo') ){
      $file = $request->file('photo');
     // $product->image = $filename;
     $timestamp = str_replace([' ', ':'], '-', Carbon::now() -> toDateTimeString());
     $fileName = $timestamp . '-' . $file -> getClientOriginalName();
     $data['photo'] = '/images/avatars' . $request->file('photo')->getClientOriginalName();
     $user->photo = $fileName;
     $file->move(public_path() . '/images/avatars/', $fileName);
  }
  


    $userData = [
      
      'name' => $request->name, 
      'email' => $request->email,
      'gender' => $request->gender,
      'phone' => $request->phone, 
      'photo' => $fileName,
      'password' => Hash::make('password')
     
     ];
	
		$user->update($userData);
		return response()->json([
			'status' => 200,
		]);
	}


  public function changeStatus(Request $request)

  {

      $user = User::find($request->user_id);

      $user->status = $request->status;

      $user->save();



      return response()->json(['success'=>'Status change successfully.']);

  }



   public function show($id = 0){

     $users= User::find($id);

      $html = "";
      if(!empty($users)){
         $html = "<div class='card-body'>
        <div class='mb-2'>
            <table class='table table-bordered table-striped'>
                <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            ".$users->id."
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Name
                        </th>
                        <td>
                            ".$users->name ."
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Image
                        </th>
                        <td>
                            ".$users->email ."
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Picture
                        </th>
                        <td>
                        <img  src=".asset('public/images/avatars/' .$users->photo) ." with=100 height=100>
                        </td>
</tr>

<tr>
              
                        <th>
                            Data
                        </th>
                        <td>
                            ".$users->created_at."
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




//is delete the user
	// handle delete an employee ajax request

    public function delete(Request $request) {
      $id = $request->id;
      $user = User::find($id);
      if (File::delete('/public/images/avatars/' . $user->photo)) {
        User::destroy($id);
      }
      $user->delete();
    }
	}
 


