@extends('admin.layouts.master')
@section('pageTitle', 'List Photo')
@section('content')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="card">
    <div class="card-header">
      <h3>List  Photo</h3>
        <a href="{{ route('admin.photos.create') }}" class="btn btn-success">New</a>
    </div>
 

      <table class="table table-bordered table-striped table-hover datatable datatable-Categories" id="tblempinfo">
<thead>
   <th>
        <input type="checkbox" class="checkbox_all">
    </th>    
  <th width="10%">Image</th>
  <th width="25%">First Name</th>
  <th width="35%">Last Name</th>
  <th width="35%">Status</th>
  <th width="30%">Action</th>
</teahd>
 <tbody>
 @foreach($data as $row)
  <tr>
     <td><input type="checkbox" class="checkbox_delete" 
       name="entries_to_delete[]" value="{{ $row->id }}" /></td>
   <td><img src="{{ asset('/public/images/' . $row->image) }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>

   <td>
   <?php if($row->status == '1'){ ?> 

<a href="{{ url('/admin/photos/status-update',$row->id)}}" class="btn btn-success">Active</a>

<?php }else{ ?> 

<a href="{{ url('/admin/photos/status-update',$row->id)}}" class="btn btn-danger">Inactive</a>

<?php } ?>


</td>
 
<td>
        
<a href="javascript:void(0)" 

                        id="show-photo" 

                        data-url="{{ route('admin.photos.show', $row->id) }}" 

                        class="btn btn-info" ><i class="fas fa-eye text-success  fa-lg"></i></a>
                        
                        <!--Edit button -->

                        <a href="#" id="' . $row->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" 
                        data-bs-target="#editModal" title="edit">
                          <i class="fas fa-edit fa-lg" ></i></a>
         
                <!-- delete list -->    
  
        <form action="{{ route('admin.photos.destroy', $row->id)  }}" method="POST"
              style="display: inline"
              onsubmit="return confirm('Are you sure?');">
            <input type="hidden" name="_method" value="DELETE">
            {{ csrf_field() }}
            <button class="btn"><i class="fas fa-trash fa-lg text-danger"></i></button>
        </form>
   
  
  
      </td>
  </tr>
 @endforeach
 </tbody>
</table>

</div>

 


    
<!-- Modal -->

<div class="modal fade" id="photoShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Show photo</h5>

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

      </div>

      <div class="modal-body">

        <p><strong>ID:</strong> <span id="photo-id"></span></p>

        <p><strong>First Name:</strong> <span id="first_name"></span></p>

        <p><strong>Last Name:</strong> <span id="last_name"></span></p>

        <p>Picture:

        <span id="image"></span>



      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>

    </div>

  </div>

</div>





{{-- edit  modal start --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
          
          <div class="col-lg">
        
          <label for="title">First Name</label>
         <input type="text" name="first_name" class="form-control" id="first_name" placeholder="first name" >

          
         </div>
         
       </div>
       <div class="my-2">
         <label for="title">Last Name</label>
         <input type="text" name="last_name" class="form-control" id="last_name" placeholder="last name" >
       </div>

   

       <div class="my-2">
         <label for="phone">Photo</label>
       
       </div>




        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_btn" class="btn btn-success">Update Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit  modal end --}}



<script type="text/javascript">

      
/*-----------------view--------------------*/
    $(document).ready(function () {

       

       /* When click show user */

        $('body').on('click', '#show-photo', function () {

          var userURL = $(this).data('url');

          $.get(userURL, function (data) {

              $('#photoShowModal').modal('show');

              $('#photo-id').text(data.id);

              $('#first_name').text(data.first_name);

              $('#last_name').text(data.last_name);

              $("#image").html(
              `<img src="/public/images/${data.image}" width="100" class="img-fluid img-thumbnail">`);
              $("#image").val(data.image);

          })

       });

       

    });

 /*------------------------------update------------------------------*/



 $(document).on('click', '#update-photo', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('admin.posts.edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#id").val(response.id);
            $("#first_name").val(response.first_name);
            $("#last_name").val(response.last_name);
          }
        });
      });

      // update employee ajax request
      $("#edit_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_btn").text('Updating...');
        $.ajax({
          url: '{{ route('admin.photos.update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Updated Successfully!',
                'success'
              )
          //fetchAllPosts();
            }
            $("#edit_btn").text('Update');
            $("#edit__form")[0].reset();
            $("#editModal").modal('hide');
          }
        });
      });

</script>

 <script>
        function getIDs()
        {
            var ids = [];
            $('.checkbox_delete').each(function () {
                if($(this).is(":checked")) {
                    ids.push($(this).val());
                }
            });
            $('#ids').val(ids.join());
        }

        $(".checkbox_all").click(function(){
            $('input.checkbox_delete').prop('checked', this.checked);
            getIDs();
        });

        $('.checkbox_delete').change(function() {
            getIDs();
        });
    </script>  
       <script>
        $(".checkbox_all").click(function(){
            $('input.checkbox_delete').prop('checked', this.checked);
        });



    </script>  
@endsection


@section('scripts')
@parent
<script>

 $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Categories:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
    $($.fn.dataTable.tables(true)).DataTable()
    .columns.adjust();
  });
})


</script>
@endsection

