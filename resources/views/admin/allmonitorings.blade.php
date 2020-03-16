@extends('admin.layout.base')

@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">

@stop
@section('content')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-12">
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">GET MONITORING BY PERIOD</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        {{-- <div class="card-block"> --}}
                        <form  method="GET" >
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput2">START DATE</label>
                                        <input type="date" id="projectinput2" required class="form-control" placeholder="Start Date" name="start">
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput4">END DATE</label>
                                        <input type="date" id="projectinput4" required class="form-control" placeholder="End Date" name="end">
                                    </div>
                                </div>


                            </div>

                            <div class="form-actions">
                               
                                <button type="submit" class="btn btn-primary col-md-6">
                                    <i class="fa fa-check-square-o"></i> GET DISBURSEMENTS
                                </button>
                            
                                {{-- <button type="reset" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> RESET
                                </button> --}}
                        
                            </div>
                        </form>
                        {{-- </div> --}}
                    </div>
                    </div>
                </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">MONITORINGS</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            @if(count($monitorings)>0)
            <div class="table-responsive">
                <table id="myTable" class="table table-hover mb-0 ps-container ps-theme-default">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>APPLICANT NAME</th>
                            <th>DATE MONITORED</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monitorings as $a)
                        <tr>
                        <td class="text-truncate">#{{$a->id}}</td>
                        <td class="text-truncate">{{$a->applicant->firstname." ".$a->applicant->lastname}}</td>
                        <td class="text-truncate">{{date('d-m-Y', strtotime($a->registered))}}</td>
                        <td>
                        <a href="{{url('/monitoring-details/mon00'.$a->id)}}" class="btn btn-success">VIEW DETAILS</a>
                        {{-- <a href="{{url('/applicant-details/teere00'.$a->applicant->id)}}" class="btn btn-success">VIEW DETAILS</a> --}}
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