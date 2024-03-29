@extends('admin.layout.base')
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">

@stop
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">APPROVED APPLICANTS</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                {{-- <th>REGION</th> --}}
                                {{-- <th>DISTRICT</th> --}}
                                <th>PHONE NO.</th>
                                <th>APPROVED AMT.</th>

                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $a)
                            <tr>
                                <td class="text-truncate">TEERE{{$a->id}}</td>
                                <td class="text-truncate">{{$a->firstname." ". $a->lastname}}</td>
                                {{-- <td class="text-truncate">{{$a->region}}</td> --}}
                                {{-- <td class="text-truncate">{{$a->district}}</td> --}}
                                <td class="text-truncate">{{$a->phoneno}}</td>
                                <td class="text-truncate">GHC {{$a->approvedAmt}}</td>
                                <td class="text-truncate">
                                    <a href="{{url('/applicant-details/teere00'.$a->id)}}" class="btn btn-success">
                                        DETAILS</a>
                                    @role('Finance Officer')
                                    <a href="{{url('approved/teere00'.$a->id)}}" class="btn btn-md btn-primary">UPLOAD RECEIPT</a>
                                    @endrole
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>


                <div class="col-md-12">
                <a href="{{url('approved-excel')}}" class="btn btn-success">
                    <i class="fa fa-save"></i>
                    EXPORT TO EXCEL</a>
                </div>

                <div class="row" style="margin-bottom: 30px;">

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

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
