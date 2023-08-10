<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Task;
use App\User;
use App\Repositories\HistoryRepository;
use App\Repositories\TaskRepository;
use Session;
use DB;
use Carbon\Carbon;
use Validator, Redirect;


class TaskController extends Controller
{


      protected $tasks;




      public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');


    }
    public function index()
    {

        $today =  Carbon::now();
         $title   = "Tasks";

        $tasks= Task::orderBy('id', 'DESC')->get();

    //    dd($tasks);
        return view('admin.tasks.index',compact('title'),['tasks' =>$tasks]);
    }


  public function create() {
        $title = "Create Task";
        return view("admin.tasks.create", compact("title"));
    }
 public function store(Request $request)
    {
            $this->validate($request, [
            'name' => 'required|max:255',
          ]);
   $time = Carbon::now();

            $task= Task::insert([
                                  'name' => $request->name,
                                   'user_id' => auth()->id(),
                                  'description' =>$request->description,
                                  'display_name' => $request->user()->username,
                                  'created_at'  => $time]
                              );

            Session::flash('message', 'Successfully add the Task!');
           return $this->index();
    }


    public function show($id) {

     $task= Task::find($id);
     return view('admin.tasks.show', compact('task'));

    }

   public function edit($id){

        $task = DB::table('tasks')->find($id);
        return view('admin.tasks.edit', ['task' => $task]);

    }

 public function update(Request $request,$id) {


   /* here is coding for update picture*/
$task = Task::findOrFail($id);

  //  dd($task);

  $time = Carbon::now();

  $task->name = $request->name;
  $task->display_name = $request->user()->username;
  $task->description = $request->description;
  $task->created_at =$time;
  $task->save();


 Session::flash('message', 'Successfully updated the task!');
 return back();



    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
  public function destroy(Task $tasks)
    {


      $tasks->delete();
      Session::flash('message', 'Successfully deleted the task!');
      return back();


    }

    public function massDestroy(Request $request)
    {
        Task::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

       public function DeleteAllTask(Request $request)

    {

        $ids = $request->ids;

        DB::table('tasks')->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Products Deleted successfully."]);

    }
}
