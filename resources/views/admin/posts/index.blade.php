@extends('admin.layouts.master')
@section('pageTitle', 'Blog List')
@section('content')



  <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_post_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">Category</label>
           
              <select name="category_id" id="category">
                  @foreach($categories as $category)
                  <option value="{!! $category->id !!}">
                  {!! $category->name !!}
                  </option>
                  @endforeach
                  </select>


            </div>
            
          </div>
          <div class="my-2">
            <label for="email">Title</label>
            <input type="text" name="title" class="form-control" placeholder="title" required>
          </div>

          <div class="my-2">
            <label for="email">Slug</label>
            <input type="text" class="form-control"  placeholder="Slug" name="slug">
          </div>

          <div class="my-2">
            <label for="phone">Content</label>
            <textarea class="form-control" rows="3"  name="content"></textarea>
          </div>
          <div class="my-2">
          <label for="check" class="form-check-label">Publish:</label>
    <input class="form-check-input" id="check" value="1" type="checkbox" name="status" wire:model="published">Publish</input>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Posts</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new posts modal end --}}

{{-- edit posts modal start --}}
<div class="modal fade" id="editPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_post_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
          
          <div class="col-lg">
          <label for="fname">Category</label>
           
          <select name="category_id" class="form-control"  id="category_id">
                  @foreach($categories as $category)

       
                  <option value="{{ $category->id }}"   {{ $category->id === old('category_id') ? 'selected' : '' }} >{{ $category->name }}</option>
               
                  @endforeach
                  </select>

 

          
         </div>
         
       </div>
       <div class="my-2">
         <label for="title">Title</label>
         <input type="text" name="title" class="form-control" id="title" placeholder="title" >
       </div>

       <div class="my-2">
         <label for="slug">Slug</label>
         <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
       </div>

       <div class="my-2">
         <label for="phone">Content</label>
         <textarea  name="content" rows="4" cols="50"  class="form-control" id="content"></textarea>
       </div>
       <div class="my-2">
       <label for="check" class="form-check-label">Publish:</label>
 <input class="form-check-input" id="published" value="1" type="checkbox" name="published" wire:model="published">Publish</input>
 <input class="form-check-input" id="published" value="0" type="checkbox" name="published" wire:model="published">No Publish</input>
       </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_post_btn" class="btn btn-success">Update Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit post modal end --}}






{{-- view posts modal start --}}
<div class="modal fade" id="viewPostModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Posts</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
                   <table class="w-100" id="tblempinfo">
                      <tbody></tbody>
                   </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        </div>
      </form>
    </div>
  </div>
</div>
{{-- view post modal end --}}


        <div class="card shadow">
          <div class="card-header bg-danger d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Blog</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addPostModal"><i
                class="bi-plus-circle me-2"></i>Add New Posts</button>
          </div>
          <div class="card-body" id="show_all_posts">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
          </div>
        </div>
      </div>





  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <!-- Script -->


      



  <script>
    $(function() {

      // add new employee ajax request
      $("#add_post_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_posts_btn").text('Adding...');
        $.ajax({
          url: '{{ route('admin.posts.store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'New Post  Added Successfully!',
                'success'
              )
              fetchAllPosts();
            }
            $("#add_post_btn").text('Add Posts');
            $("#add_post_form")[0].reset();
            $("#addPostModal").modal('hide');
          }
        });
      });




      $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
       
        if(id > 0){

      // AJAX request
      var url = "{{ route('admin.posts.show',['id']) }}";
      url = url.replace('id',id);

        // Empty modal data
        $('#tblempinfo tbody').empty();
        $.ajax({
                 url: url,
                 dataType: 'json',
                 success: function(response){

                     // Add employee details
                     $('#tblempinfo tbody').html(response.html);

                     // Display Modal
                     $('#empModal').modal('show'); 
                 }
             });

          }
      });





      // edit employee ajax request
      $(document).on('click', '.editIcon', function(e) {
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
            $("#category_id").val(response.category_id);
            $("#slug").val(response.slug);
            $("#title").val(response.title);
            $("#content").val(response.content);
            $("#status").val(response.status);
            $("#id").val(response.id);
          }
        });
      });

      // update employee ajax request
      $("#edit_post_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_post_btn").text('Updating...');
        $.ajax({
          url: '{{ route('admin.posts.update') }}',
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
                'Posts Updated Successfully!',
                'success'
              )
              fetchAllPosts();
            }
            $("#edit_posts_btn").text('Update Employee');
            $("#edit_posts_form")[0].reset();
            $("#editPostsModal").modal('hide');
          }
        });
      });

      // delete employee ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('admin.posts.delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllPosts();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllPosts();

      function fetchAllPosts() {
        $.ajax({
          url: '{{ route('admin.posts.fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_posts").html(response);
            $(".datatable").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>
  @endsection