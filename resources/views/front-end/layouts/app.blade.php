
@include('front-end.layouts.head')

<div class="wrapper-front">
    @include('front-end.layouts.navbar')

   <div class="container">
    
      <div class="row">
   
          @yield('content')
      
        <!--<div class="col-md-2 col-lg-2">
          @include('front-end.layouts.sidebar')
        </div>-->
      </div>
    </div>

<footer id="footer">
   <i class="tim-icons icon-heart-2"></i>
   <p> <script src=" {{ asset('/public/js/currentdetails.js') }}"></script></p>
</footer>
</div>
</body>
</html>