

<div class="card">
  <div class="card-header">
   Edit Task
  </div>





<form  method="POST" action="{{ route('tasks.update',$task->id)}}" enctype="multipart/form-data">

@csrf
@method('put')
 

    <!-- Task Name -->
    <div class="form-group">
      <label for="task-name" class="col-sm-3 control-label">Task</label>

      <div class="col-sm-6">
        <input type="text" name="name"  id="edit_name" class="form-control"
        value="{{ old('name',isset($task) ? $task->name : '') }}">
      </div>
    </div>

    <div class="form-group">

      <label for="task-name" class="col-sm-3 control-label">Display Name</label>

      <div class="col-sm-6">
        <input type="text" name="display_name"  id="edit_display_name" class="form-control"
        value="{{ old('display_name', isset($task) ? $task->display_name : '') }}">
      </div>
    </div>

    <!-- descprition your task -->
    <div class="form-group">

      <label for="description" class="col-md-3 control-label">Description</label>
      <div class="col-md-6">
        <textarea class="form-control"

        rows="5"
        cols="28"
        name="description"
        value="{{ old('description', isset($task) ? $task->description  : '') }}"
        >
        {{  $task->description   }}
      </textarea>



      <span class="error">{{$errors->first('description')}}</span>
    </div>



  </div>
  <button type="submit" class="btn">Update</button>
  <input type="hidden" id="id" name="id">


</form>

</div>

