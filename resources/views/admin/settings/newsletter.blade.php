@extends('admin.layouts.master')
@section('pageTitle', 'newsletter List')
@section('content')




<div class="card">

    <div class="card-body">

<h3>Newsletter List</h3>

      <br/> <br/>
          <table  id="example" class="display" style="width:100%">
            <thead>
            <th>Nr</th>
            <th>Name</th>
              <th>Email</th>
            <th>Date Time</th>
            <th class="no-sort" name="prop_ref_no">Action</th>
          </thead>
          <tbody>
          @if (count($newsletters) > 0)
          @foreach ($newsletters as  $key => $newsletter)
              <td><div>{{ ++$key }}</div></td>
              <td><div>{{ $newsletter->name }}</div></td>
              <td><div>{{ $newsletter->email }}</div></td>
              <td><div>{{ $newsletter->created_at }}</div></td>

              <td style="width:200px">



                          {!! Form::open(array(
                                                        'style' => 'display: inline-block;',
                                                        'method' => 'DELETE',
                                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                        'route' => ['admin.settings.newsletter.destroy', $newsletter->id])) !!}
                                                    {!! Form::submit(trans('global.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                                    {!! Form::close() !!}


                                      </td>

                                  </tr>
                              @endforeach
                          @else
                              <tr>
                                  <td colspan="6">@lang('quickadmin.qa_no_entries_in_table')</td>
                              </tr>
                          @endif
                      </tbody>

        </table>
      </div>
            </div>

      <script>
      $(document).ready(function() {
          $('#example').DataTable( {

              "columnDefs": [ {
                "targets": 'no-sort',
                "orderable": false,
          } ],

          } );
      } );


      </script>
@endsection
