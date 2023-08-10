    @extends('admin.layouts.master')
@section('pageTitle', 'Users')

@section('content')




<div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_user_form" enctype="multipart/form-data">
        @csrf
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
            <label for="email">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
        
          </div>
          <div class="my-2">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
          </div>
          <div class="my-2">
    
            <label for="phone">Phone</label>
            <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
          </div>


          <label for="email">{{ __('Gender') }}</label>

                    <div class="my-2">
            <fieldset>
                    <div>
                        <input type="radio" name="gender" id="sex-m" value="masculin"  v-model="gender">
                        <label for="sex-m">Male</label>
                        <input type="radio" name="gender" id="sex-f" value="femenin" v-model="gender">
                        <label for="sex-f">Female</label>
                    </div>
                   </fieldset>
                </div>

          <div class="my-2">
            <label for="post">Pictures</label>
            <label for="avatar">Select Avatar</label>
            <input type="file" name="photo" class="form-control" required>
          </div>
</div>



<div class="my-2">


<div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_user_btn" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- add new  modal end --}}


{{-- edit modal start --}}
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="edit_user_form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" id="id">
        <input type="hidden" name="photo" id="photo">
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
              <label for="fname">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="name" required>
            </div>
         
          <div class="my-2">
          <label for="title">Email</label>
            <input type="email" name="email" id="title" class="form-control" placeholder="email" required>
          </div>
          <div class="my-2">
          <label for="phone">Phone</label>
          <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
          </div>
          <div class="my-2">
    
          <label for="email">{{ __('Gender') }}</label>


<fieldset>
<div>
    <input type="radio" name="gender" id="gender-m" value="masculin">
    <label for="sex-m">Male</label>
    <input type="radio" name="gender" id="gender-f" value="femenin">
    <label for="sex-f">Female</label>
</div>
</fieldset>
        
        
        </div>


        <div class="my-2">
            <label for="avatar">Select Avatar</label>
            <input type="file" name="photo" id="photo" class="form-control">
          </div>
          <div class="mt-2" id="photo">

          </div>
        </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="edit_user_btn" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
{{-- edit  modal end --}}






{{-- view  modal start --}}
<div class="modal fade" id="viewUserModal" tabindex="-1" aria-labelledby="exampleModalLabel"
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
            <h3 class="text-light">Manage Users</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addUserModal"><i
                class="bi-plus-circle me-2"></i>Add New Users</button>
          </div>
          <div id="show_all_users" style="float:left" >
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

  $('.toggle-class').change(function() {

      var status = $(this).prop('checked') == true ? 1 : 0; 

      var id = $(this).data('id'); 

       

      $.ajax({

          type: "GET",

          dataType: "json",

          url: '/admin/users/changeStatus',

          data: {'status': status, 'id': id},

          success: function(data){

            console.log(data.success)

          }

      });

  })

})

</script>


  <script>
    $(function() {

      // add new employee ajax request
      $("#add_user_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_user_btn").text('Adding...');
        $.ajax({
          url: '{{ route('admin.users.store') }}',
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
              fetchAllUsers();
            }
            $("#add_user_btn").text('Add Reviews');
            $("#add_user_form")[0].reset();
            $("#addUserModal").modal('hide');
          }
        });
      });




      $(document).on('click', '.viewIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
       
        if(id > 0){

      // AJAX request
      var url = "{{ route('admin.users.show',['id']) }}";
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
          url: '{{ route('admin.users.edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#phone").val(response.phone);
            $("#gender").val(response.gender);
            $("#id").val(response.id);
            $("#photo").html(
              `<img src="../public/images/avatars/${response.photo}" width="100" class="img-fluid img-thumbnail">`);
              $("#photo").val(response.photo);
            
          }
        });
      });

      // update employee ajax request
      $("#edit_user_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_user_btn").text('Updating...');
        $.ajax({
          url: '{{ route('admin.users.update') }}',
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
                'User Updated Successfully!',
                'success'
              )
              fetchAllUsers();
            }
            $("#edit_user_btn").text('Update User');
            $("#edit_user_form")[0].reset();
            $("#editUserModal").modal('hide');
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
              url: '{{ route('admin.users.delete') }}',
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
                fetchAllUsers();
              }
            });
          }
        })
      });

      // fetch all employees ajax request
      fetchAllUsers();

      function fetchAllUsers() {
        $.ajax({
          url: '{{ route('admin.users.fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_users").html(response);
            $(".datatable").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>
  @endsection

