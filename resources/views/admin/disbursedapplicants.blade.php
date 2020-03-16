@extends('admin.layout.base')
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">

@stop
@section('content')


<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">DISBURSED APPLICANTS</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            @if(count($applicants)>0)
            <div class="table-responsive">
                <table id="myTable" class="table table-hover mb-0 ps-container ps-theme-default">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                          
                            <th>PHONE NO</th>
                            <th>AMT. RELEASED</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applicants as $a)
                        <tr>
                        <td class="text-truncate">TEERE0{{$a->id}}</td>
                        <td class="text-truncate">{{$a->firstname.' '.$a->lastname}}</td>
                        {{-- <td class="text-truncate">{{$a->}}</td> --}}
                        
                        <td class="text-truncate">{{$a->phoneno}}</td>
                        <td class="text-truncate">GHC {{$a->approvedAmt}}</td>
                        <td class="text-truncate">
                        <a href="{{url('/monitoring/'.$a->id)}}" class="btn btn-success">RECORD MONITORING</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
              <p class="alert alert-danger">No Records Found.</p>
            @endif
        </div>
    </div>
</div>

</div>


@stop

@section('scripts-below')
<script src="{{asset('assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/tables/datatables/datatable-basic.js')}}"></script>
<script>
    $.noConflict();
    jQuery( document ).ready(function( $ ) {
        $('#myTable').DataTable();
    });
    // Code that uses other library's $ can follow here.
    </script>
@stop