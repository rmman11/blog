<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
         <div class="sb-sidenav-menu">
                        <div class="nav">

  <ul class="list-unstyled components">


    @guest
  <!--  <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
      <span class="glyphicon glyphicon-log-in"></span>
      <a class="nav-link" href="#">{{ __('Login') }}</a>
    </li>-->

    @else
    <li>
     <img
      src="{{ asset('/public/storage/avatars/' .auth()->guard()->user()->avatar) }}"
      class="avatar" alt="User Image"
      />
    </li>
    <li class="nav-item" >
      <a  href="{{ route('admin.dashboard')  }}" class="nav-link {{ request()->is('admin/dashboard') || request()->is('admin/dashboard/*') ? 'active' : '' }}">
        <i class="fa fa-fw fa-home"></i>
        {{ __('Dashboard') }} </a>

      </li>

         <li class="nav-item">
        <a href="{{ route('admin.photos.index')  }}" class="nav-link {{ request()->is('admin/photos/index') || request()->is('admin/photos/index') ? 'active' : '' }}" >
          <i class="fa-fw fas fa-user-plus">

          </i>
          {{ __('List Photo') }}
        </a>
      </li>


      <li class="nav-item">
        <a href="{{ route('admin.profile')  }}" class="nav-link {{ request()->is('admin/profile') || request()->is('admin/profile/*') ? 'active' : '' }}" >
          <i class="fa-fw fas fa-user-plus">

          </i>
          {{ __('Profile') }}
        </a>
      </li>

      <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Settings
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                                        
        <a href="{{ route('admin.employees.index') }}" class="nav-link {{ request()->is('admin/employees') || request()->is('admin/employees') ? 'active' : '' }}">
          <i class="fa-fw fas fa-cogs nav-icon">

          </i>
          {{ __('Employees') }}
        </a>

                                  
        <a class="nav-link  {{ request()->is('admin.users.index') || request()->is('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                                <i class="fas fa-users"></i>
                                Users
                            </a>

  
        <a href="{{ route('admin.reviews.index')  }}" class="nav-link {{ request()->is('admin/reviews/index') || request()->is('admin/reviews/index') ? 'active' : '' }}" >

          <i class="fa fa-list"></i>

          {{ __('Review') }}
        </a>
    


   
        <a href="{{ route('admin.posts.index')  }}" class="nav-link {{ request()->is('admin/posts/index') || request()->is('admin/posts/index') ? 'active' : '' }}" >

          <i class="fa fa-list"></i>

          {{ __('Blog') }}
        </a>



  <a href="{{ route('admin.settings.index') }}"  class="nav-link {{ request()->is('admin/sitemap') || request()->is('admin/sitemap/*') ? 'active' : '' }}">

    <i class="fa-fw fas fa-server">

    </i>
    {{ __('Setari') }}</a>
  



                                </nav>
                            </div>



  

      



                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Reoprts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                
                          
        <a href="{{ route('admin.reports.payment') }}" class="nav-link {{ request()->is('admin/reports/index') || request()->is('admin/reports/index') ? 'active' : '' }}" >
        <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg"> <path d="M9 21H15M9 21V16M9 21H3.6C3.26863 21 3 20.7314 3 20.4V16.6C3 16.2686 3.26863 16 3.6 16H9M15 21V9M15 21H20.4C20.7314 21 21 20.7314 21 20.4V3.6C21 3.26863 20.7314 3 20.4 3H15.6C15.2686 3 15 3.26863 15 3.6V9M15 9H9.6C9.26863 9 9 9.26863 9 9.6V16" stroke="currentColor" stroke-width="1.5"/> </svg> 
          {{ __(' Payments Report ') }}
        </a>
      


        <a href="{{ route('admin.reports.leave') }}" class="nav-link {{ request()->is('admin/reports/index') || request()->is('admin/reports/index') ? 'active' : '' }}" >
        <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg"> <path d="M9 21H15M9 21V16M9 21H3.6C3.26863 21 3 20.7314 3 20.4V16.6C3 16.2686 3.26863 16 3.6 16H9M15 21V9M15 21H20.4C20.7314 21 21 20.7314 21 20.4V3.6C21 3.26863 20.7314 3 20.4 3H15.6C15.2686 3 15 3.26863 15 3.6V9M15 9H9.6C9.26863 9 9 9.26863 9 9.6V16" stroke="currentColor" stroke-width="1.5"/> </svg> 
          {{ __('  Leave Report') }}
        </a>
   



        <a href="{{ route('admin.reports.daily') }}" class="nav-link {{ request()->is('admin/reports/index') || request()->is('admin/reports/index') ? 'active' : '' }}" >
        <svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
         xmlns="http://www.w3.org/2000/svg"> <path d="M9 21H15M9 21V16M9 21H3.6C3.26863 21 3 20.7314 3 20.4V16.6C3 16.2686 3.26863 16 3.6 16H9M15 21V9M15 21H20.4C20.7314 21 21 20.7314 21 20.4V3.6C21 3.26863 20.7314 3 20.4 3H15.6C15.2686 3 15 3.26863 15 3.6V9M15 9H9.6C9.26863 9 9 9.26863 9 9.6V16" stroke="currentColor" stroke-width="1.5"/> </svg> 
          {{ __('  Daily Report') }}
        </a>


                                </nav>
                            </div>





<li class="nav-item">
  <a  class="nav-link" href="{{ route('admin.logout') }}"
  onclick="event.preventDefault();
  document.getElementById('logout-form').submit();">
  <i class="nav-icon fas fa-fw fa-sign-out-alt">

  </i>    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
  @csrf
</form>

</li>
@endguest
</ul>

<!-- /.sidebar-menu -->

</div>
</div>
</nav>
</div>
</div>

<script src="{{ asset('/public/js/scripts.js') }}" defer></script>

