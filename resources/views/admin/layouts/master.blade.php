@include('admin.layouts.header')
<div class="wrapper">

  @include('admin.layouts.navbars.sidebar')

  <nav class="sidebar">
    <div class="container-fluid">

      @guest
      <div class="navbar-header">

        <!--<button type="button" class="navbar-toggle">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar bar1"></span>
        <span class="icon-bar bar2"></span>
        <span class="icon-bar bar3"></span>
      </button>-->
      <a class="navbar-brand" href="#">@yield('page')</a>
    </div>
    @else

    <div class="collapse navbar-collapse">


      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ti-settings"></i>
            <p>{{ auth()->guard('admin')->check() ? auth()->guard()->user()->name : 'Account' }}</p>
            <b class="caret"></b>
          </a>


          <ul class="dropdown-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Sttenigs</a></li>
            <li><a href="{{ route('admin.logout') }}">Logout</a></li>
          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>
@endguest

<div id="layoutSidenav_content">
<main>



<div class="container-fluid px-4">
    @yield('content')

  </div>
</main>
</div>
@include('admin.layouts.footer')
</div>



