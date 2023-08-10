<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          @yield('title')
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
@guest
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('welcome') }}">{{ __('Welcome') }}</a>
            </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('about') }}">{{ __('About') }}</a>
            </li>
            <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('blog.blog') }}">{{ __('Blog') }}</a>
            </li>




            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else

           <li  class="nav-item {{ Request::is('home') ? 'active' : '' }}"><a  href="{{ route('home') }}" class="nav-link"> {{ Auth::user()->name }}</a></li>
              <li class="nav-item {{ Request::is('albums') ? 'active' : '' }}"><a  href="{{ route('albums') }}" class="nav-link"> Albums</a></li>
              <li class="nav-item {{ Request::is('faq') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('faq') }}">{{ __('Faq') }}</a>
            </li>



            <li class="{{ Request::is('contact') ? 'active' : '' }}">
              <a class=" nav-link" href="{{ route('contact') }}">{{ __('Contact') }}</a>
            </li>

        <li class="nav-item dropdown ml-auto">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
            <div class="dropdown-menu dropdown-menu-right">

        <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
        <div class="dropdown-divider"></div>

    </div>

    @endguest
</ul>
</div>
</div>
</nav>
