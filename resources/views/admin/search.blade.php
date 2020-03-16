@extends('admin.layout.base')
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">

@stop
@section('content')
<div class="row">
        <div class="col-xl-12 col-lg-12 col-12">
                <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">SEARCH APPLICANT</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                            {{-- <div class="card-block"> --}}
                            <form  method="GET" >
                                <fieldset>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" value="{{ request()->get('search') }}" placeholder="Enter Name, Phone Number">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">
                                                 <i class="fa fa-search"></i>  SEARCH
                                            </button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                            {{-- </div> --}}
                        </div>
                        </div>
                    </div>
        </div>
</div>


@if(isset($applicants))  
<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">SEARCH RESULTS</h4>
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
                            <th>APPROVAL STATUS</th>
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
                        
                        <td class="text-truncate">
                            @if($a->approved ==1)
                               <button class="btn btn-sm btn-success">
                                   <i class="fa fa-check"></i>
                                   APPROVED</button>
                            @else
                            <button class="btn btn-sm btn-danger">
                                <i class="fa fa-remove"></i>
                                NOT APPROVED</button>
                            @endif
                        </td>
                        <td class="text-truncate">
                        {{-- <a href="{{url('/applicant-details/teere00'.$a->id)}}" class="btn btn-success">VIEW DETAILS</a> --}}
                        <a href="{{url('/applicant-details/teere00'.$a->id)}}" class="btn btn-success">VIEW DETAILS</a>
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
@endif

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