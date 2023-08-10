

    <div class="card-body">


    <form action="{{ route('admin.tasks.store') }}" method="POST" class="form-horizontal"  enctype="multipart/form-data">

                        {{ csrf_field() }}

                      <h3>@yield('title')</h3>
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
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
                                value="{{ old('description') }}"
                                style="resize:none;"></textarea>


                                <span class="error">{{$errors->first('description')}}</span>
                                </div>



                             </div>

         <div class="form-group">
                <label for="date" class="col-sm-3 control-label">Start Date</label>
                <div class="col-sm-9">

                <input type="date" class="date" placeholder="eg. 31-10-1984" name="created_at"  class="date form-control">
                </div>
            </div>
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                                
</div>


