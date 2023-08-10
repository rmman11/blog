@extends('admin.layouts.master')
@section('pageTitle', 'ReportDay')
@section('content')



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="card">
    <div class="card-header">
      <h3> {{ $title }}</h3>
        <a href="#" class="btn btn-success">New Report</a>
    </div>

    <p>Repots View page</p>
</div>

@endsection

