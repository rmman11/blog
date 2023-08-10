@extends('admin.layouts.master')
@section('pageTitle', 'Testari')
@section('content')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>


<style>

.settings-menu {
    float: left;
    width: 13%;

    padding: 5px;
    display: block;
    color:black;
    background-color: #f1f1f1;
 border: 1px solid #555;
}

/* Style the list inside the menu */
 ul li{
    list-style-type: none;
    padding: 0;
    padding: 5px;

}



/* Change the link color on hover */
.nav  a:hover {
  background-color: #555;
  color: white;
}

article {
    float: left;
    padding: 20px;
    width: 70%;
    background-color: #f1f1f1;
    height: auto; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

</style>

<div class="card">
    <div class="card-header">
      <p><b> Today is: {{ $today }} </b></p>
    </div>

    <div class="card-body">
        <nav class="settings-menu">
            <ul class="nav">
              <li><a data-toggle="tab" href="#general">General</a></li>
              <li class="active"><a data-toggle="tab" href="#computer">Task Computer</a></li>
              <li><a data-toggle="tab" href="#conventor">Conventor</a></li>
              <li><a data-toggle="tab" href="#security">Security/Change Password</a></li>
              <li><a data-toggle="tab" href="#timeline">Timeline and Tagging Settings</a></li>
              <li><a data-toggle="tab" href="#info">History</a></li>
            </ul>
          </nav>


  <article>

      <div class="tab-content">
          <div id="general" class="tab-pane fade in active">
            <h3>General Account Settings</h3>
<ul>

     <li>Username  {{ Auth::user()->username }}</li>
     <li>contact mail@yahoo.com</li>
     <li>Memorialization Settings</li>
     <li>Identity Confirmation</li>
   </ul>



          </div>
          <div id="computer" class="tab-pane fade">
            <h3>Computer</h3>
            <p>

              @include('admin.settings.calculator')


         </p>




      </div>
          <div id="conventor" class="tab-pane fade">
           
           <p>

              @include('admin.settings.conventor')


         </p>

          </div>

      		<div id="security" class="tab-pane fade">
            <h3>Security</h3>
          

            @include('admin.settings.changepassword')


          </div>


          <div id="timeline" class="tab-pane fade">

            <h3>Timeline and Tagging Settings</h3>


          </div>




          <div id="info" class="tab-pane fade">

       <h3>History</h3>
          </div>

        </div>
</article>
</div>
</div>

@endsection
