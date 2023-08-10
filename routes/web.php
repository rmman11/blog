<?php


/* sarcina una sa sriu rutele de class care sa faca arcina mai*/
/*la fiecare si apoi sa facem cu employess si users*/

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminUserController;

use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\FrontEnd\learnLaravel;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\ContactController;
use App\Http\Controllers\FrontEnd\AlbumsController;



//ImageController

use App\Http\Controllers\Admin\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/






Route::get('/', [learnLaravel::class,'index'])->name('welcome');
Route::get('/about', [learnLaravel::class,'about'])->name('about');

Route::get('/blog', [learnLaravel::class,'blog'])->name("blog.blog");
Route::get('/blog/show/{id}', [learnLaravel::class,'show_blog'])->name('blog.show_blog');




Auth::routes();
Route::get('/login', [LoginController::class,'showWriterLoginForm'])->name('login');
Route::get('/register', [RegisterController::class,'showWriterRegisterForm'])->name('register');


Route::get('/home', [HomeController::class ,'index'])->name('home');
Route::get('/photos', 'FrontEnd\PhotosController@index')->name('photos');
Route::post('/image/upload', 'FrontEnd\PhotosController@upload');

Route::get('/faq', [HomeController::class,'faq'])->name('faq');

Route::get('/contact',[ContactController::class ,'contact'])->name('contact');
Route::post('/contact', ['as'=>'contactus.store','uses'=>[ContactController::class ,'index']]);


/*-------------------------albums-------------------------------*/



Route::get('/albums', [AlbumsController::class,'index'])->name('albums');
Route::get('/albums/create',[AlbumsController::class ,'create'])->name('albums.create');
Route::get('/albums/{id}', [AlbumsController::class ,'show']);
Route::post('/albums/store', [AlbumsController::class ,'store']);

Route::get('/photos/create/{id}', 'FrontEnd\PhotosController@create')->name('photos.create');
Route::post('/photos/store', 'FrontEnd\PhotosController@store');
Route::get('/photos/{id}', 'FrontEnd\PhotosController@show');
Route::delete('/photos/{id}', 'FrontEnd\PhotosController@destroy');


/*----------------------end albums-------------------------------*/



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'],function() {

	Route::middleware('auth:admin')->group(function() {

		Route::get('/dashboard',  [DashboardController::class,'dashboard'])->name('dashboard');

		Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');

		Route::get('/admin/photos', [ImageController::class,'index'])->name('photos.index');
		Route::get('/photos/create', [ImageController::class ,'create'])->name('photos.create');
		Route::get('/photos/store', [ImageController::class ,'store'])->name('photos.store');
		Route::get('/photos/edit/{id}', [ImageController::class, 'edit'])->name('photos.edit');
		Route::post('/photos/update', [ImageController::class, 'update'])->name('photos.update');
		Route::get('/photos/show/{id}', [ImageController::class, 'show'])->name('photos.show');
		Route::delete('/photos/delete/{id}', [ImageController::class ,'destroy'])->name('photos.destroy');

		Route::get('/photos/status-update/{id}', [ImageController::class, 'status_update'])->name('photos.status_update');
		
	


  //reviews  routes

	Route::get('/admin/reviews', [ReviewsController::class,'index'])->name('reviews.index');
	Route::get('/reviews/fetchall', [ReviewsController::class, 'fetchAll'])->name('reviews.fetchAll');
	Route::get('/reviews', [ReviewsController::class ,'create'])->name('reviews.create');
	Route::post('/reviews/store', [ReviewsController::class ,'store'])->name('reviews.store');
	Route::get('/reviews/show/{id}', [ReviewsController::class ,'show'])->name('reviews.show');
	Route::get('/reviews/edit/', [ReviewsController::class ,'edit'])->name('reviews.edit');
	Route::post('/reviews/update', [ReviewsController::class ,'update'])->name('reviews.update');
	Route::delete('/reviews/delete',[ReviewsController::class,'delete'])->name('reviews.delete');
	//Route::resource('/reviews', ReviewsController::class);





	   /***************** start employee ********************/
	   Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');

	   Route::get('/employees/fetchall', [EmployeesController::class, 'fetchAll'])->name('employees.fetchAll');
	   Route::post('/employees/store', [EmployeesController::class, 'store'])->name('employess.store');
	   Route::delete('/delete', [EmployeesController::class, 'delete'])->name('employees.delete');
	   Route::get('/employees/show/{id}', [EmployeesController::class ,'show'])->name('employees.show');
	   Route::get('/employees/edit/', [EmployeesController::class, 'edit'])->name('employees.edit');
	   Route::post('/employees/update', [EmployeesController::class, 'update'])->name('employees.update');
	   Route::get('/employees/status-update/{id}', [EmployeesController::class, 'status_update'])->name('employees.status_update');

	  // Route::resource('/employees', EmployeesController::class);
	
	
	/*****************end employee*******************/




   /***************** start posts ********************/

   Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

   Route::get('/posts/fetchall', [PostsController::class, 'fetchAll'])->name('posts.fetchAll');
   Route::post('/posts/store', [PostsController::class, 'store'])->name('posts.store');
   Route::delete('/posts/delete', [PostsController::class, 'delete'])->name('posts.delete');
   Route::get('/posts/show/{id}', [PostsController::class ,'show'])->name('posts.show');
   Route::get('/posts/edit/', [PostsController::class, 'edit'])->name('posts.edit');
   Route::post('/posts/update', [PostsController::class, 'update'])->name('posts.update');
  // Route::resource('/employees', EmployeesController::class);


/*****************end posts*******************/



   /***************** start report ********************/



   Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
   Route::get('/reports/daily', [ReportController::class, 'report_daily'])->name('reports.daily');
   Route::get('/reports/payment', [ReportController::class, 'report_payment'])->name('reports.payment');
   Route::get('/reports/leave', [ReportController::class, 'report_leave'])->name('reports.leave');


   /***************************************** */






	/******************** code for list users ****************************** */
	Route::get('/users', [UserController::class ,'index'])->name('users.index');
	Route::get('/users/create', [UserController::class ,'create'])->name('user.create');
	
	Route::get('/users/fetchall', [UserController::class, 'fetchAll'])->name('users.fetchAll');
	Route::post('/users/store', [UserController::class ,'store'])->name('users.store');
	Route::delete('/users/delete/', [UserController::class ,'delete'])->name('users.delete');

	Route::get('/users/show/{id}', [UserController::class ,'show'])->name('users.show');

	Route::get('/users/edit/', [UserController::class ,'edit'])->name('users.edit');
	/*daca in route avem parametru id si in editare trebuie sa avem parametru id la action : $user->id*/
	Route::post('/users/update', [UserController::class ,'update'])->name('users.update');

	Route::get('/users/changeStatus/', [UserController::class,'changeStatus'])->name('users.changeStatus');

	//Route::resource('/user', UserController::class);
/*------------------------------------------ end the  code for users --------------------------*/



		Route::get('/settings', [SettingsController::class,'index'])->name('settings.index');
		Route::get('/newsletter',[SettingsController::class ,'newsletter'])->name('settings.newsletter');
		Route::delete('/newsletter/destroy/{id}', [SettingsController::class, 'destroy'])->name('settings.newsletter.destroy');
		

		
		Route::put('reset-password' ,[SettingsController::class,'resetPassword'])->name('settings.reset-password');


    //  Route::resource('profile', 'AdminUserController');

		Route::post('/admin/logout', [AdminUserController::class, 'logout'])->name('logout');


	});

	
	Route::get('/login', [AdminUserController::class, 'showAdminLoginForm'])->name("admin.login");
	Route::post('/logare', [AdminUserController::class, 'logare'])->name('logare');

	Route::resource('/admin/login', AdminUserController::class);

});


