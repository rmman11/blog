@extends('front-end.layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')


<div class="container"  style="background: #fff">
<div class="container-fluid">
@foreach ($posts->chunk(4) as $items)
         <div class="row">
             @foreach ($items as $post)
             <div class="col-md-6 col-lg-3 mb-2">
<div class="card-body" style="border:2px solid">
                         <div class="caption text-center">

                             <a href="{{ route('blog.show_blog', ['id'=> $post->getId()]) }}"
class="btn bg-primary text-white"><h3>{{ $post->title }}</h3></a>
                              <p>{{ $post->created_at }}</p>
                             
                         </div> <!-- end caption -->
                      


                     </div> <!-- end thumbnail -->
                 </div> <!-- end col-md-3 -->
             @endforeach
         </div> <!-- end row -->
     @endforeach
     </div>

{{$posts->links("pagination::bootstrap-4")}}
</div>


@endsection