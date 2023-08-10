
@extends('admin.layouts.master')
@section('pageTitle', 'Dashboard')
@section('content')

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<div class="card">
<div class="row">
    <div class="col-lg-3 col-sm-6">
   
        
                    <div class="col-xs-7">
                        <div class="numbers">
                            <p>Users</p>
                            {{ $user->count() }}
                        </div>
                    </div>
</div>
           
                    <div class="stats">
                        <a href="{{ url('/admin/users') }}"><i class="ti-panel"></i> Users</a>
                    </div>
             
        


    <div class="col-sm-4">
        
    <h1>{{ $chart1->options['chart_title'] }}</h1>
                                {!! $chart1->renderHtml() !!}
    </div>
    <div class="col-sm-4">
               

    {!! $chart->container() !!}
    </div>
  </div>
</div>
</div>
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection
