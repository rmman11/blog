@extends('admin.layouts.master')
@section('pageTitle', 'Reviews')
@section('content')


<div class="modal fade" id="addReviewsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New reviews</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_reviews_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">Category</label>
              {!! Form::select('id', $categories, old('categories'), [
              'required' => '','name'=>'categ_id','class' =>'form-control']) !!}
            </div>
        
          </div>
          <div class="my-2">
            <label for="email">Title</label>
            <input type="text" name="title" class="form-control" placeholder="title" required>
          </div>
          <div class="my-2">
            <label for="phone">Content</label>
            <textarea  name="content" rows="4" cols="50"></textarea>
          </div>
          <div class="my-2">
            <label for="post">Rating</label>
            <input type="text" name="rating" class="form-control" placeholder="rating" required>
          </div>
</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_reviews_btn" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new  modal end --}}


{{-- edit modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_reviews_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">Category</label>
              <input type="text" name="category" id="categ_id" class="form-control" placeholder="category" required>
            </div>
         
          <div class="my-2">
          <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="title" required>
          </div>
          <div class="my-2">
          <label for="phone">Content</label>
            <textarea id="content" name="content" rows="4" cols="50"  class="form-control"></textarea>
          </div>
          <div class="my-2">
          <label for="post">Rating</label>
            <input type="text" name="rating" class="form-control" id="rating" class="form-control" placeholder="rating" required>
          </div>
        
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_employee_btn" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit  modal end --}}






{{-- view  modal start --}}
<div class="modal fade" id="viewEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View</h5>
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
{{-- view modal end --}}







        <div class="card shadow">
          <div class="card-header ">
            <h3 class="text-light">Manage Reviews</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addReviewsModal"><i
                class="bi-plus-circle me-2"></i>Add New Reviews</button>
          </div>
          <div class="card-body" id="show_all_review" >
            <h1 class="text-center text-secondary my-10">Loading...</h1>
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
      $("#add_reviews_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_reviews_btn").text('Adding...');
        $.ajax({
          url: '{{ route('admin.reviews.store') }}',
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
                'Added Successfully!',
                'success'
              )
              fetchAllRev();
            }
            $("#add_reviews_btn").text('Add Reviews');
            $("#add_reviews_form")[0].reset();
            $("#addReviewsModal").modal('hide');
          }
        });
      });




      $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
       
        if(id > 0){

      // AJAX request
      var url = "{{ route('admin.reviews.show',['id']) }}";
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
          url: '{{ route('admin.reviews.edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#categ_id").val(response.categ_id);
            $("#title").val(response.title);
            $("#content").val(response.content);
            $("#rating").val(response.rating);
            $("#emp_id").val(response.id);
            
          }
        });
      });

      // update employee ajax request
      $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Updating...');
        $.ajax({
          url: '{{ route('admin.reviews.update') }}',
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
                'Employee Updated Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#edit_employee_btn").text('Update Employee');
            $("#edit_employee_form")[0].reset();
            $("#editEmployeeModal").modal('hide');
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
              url: '{{ route('admin.reviews.delete') }}',
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
                fetchAllRev();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllRev();

      function fetchAllRev() {
        $.ajax({
          url: '{{ route('admin.reviews.fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_review").html(response);
            $(".datatable").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>
  @endsection