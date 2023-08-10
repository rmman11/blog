

       
      
      
              <div class="container-fluid px-4">
             
<div class="card mb-4">
    <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.id') }}
                        </th>
                        <td>
                            {{ $task->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.title') }}
                        </th>
                        <td>
                            {{ $task->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.task.fields.display_name') }}
                        </th>
                        <td>
                            {{ $task->display_name }}
                        </td>
                    </tr>
                        <th>
                            {{ trans('cruds.task.fields.description') }}
                        </th>
                        <td>
                            {{ $task->description }}
                        </td>
                    </tr>

                            <th>
                            {{ trans('cruds.task.fields.created_at') }}
                        </th>
                        <td>
                            {{ $task->created_at }}
                        </td>
                    </tr>

                </tbody>
            </table>
          
        </div> 
        </div>
              </div>
      
    </div>
    </div>

