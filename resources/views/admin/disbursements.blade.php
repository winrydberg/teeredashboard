@extends('admin.layout.base')
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/tables/datatable/datatables.min.css')}}">

@stop
@section('content')


    <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">SELECT PERIOD OF DISBURSEMENT</h4>
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


@if(isset($disbursements))
<div class="row">
		<div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">RESULTS</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table id="myTable" class="table table-responsive">
                        <thead>
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th>APPLICANT NAME</th>
                                <th>AMOUNT</th>
                                <th>ACCOUNT NO</th>
                                <th>RELEASE DATE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                           
                              @foreach($disbursements as $d)
                                <tr>
                                {{-- <td class="text-truncate">#{{$d->id}}</td> --}}
                                    <td class="text-truncate" style="text-transform:uppercase">{{$d->applicant->firstname." ".$d->applicant->lastname}}</td>
                                    <td class="text-truncate">GHC {{$d->amount}}</td>
                                    <td class="text-truncate">{{$d->account}}</td>
                                    <td class="text-truncate">{{date('d-m-Y', strtotime($d->release_date))}}</td>
                                    <td class="text-truncate">
                                    <a href="{{url('/applicant-details/teere00'.$d->applicant->id)}}" class="btn btn-sm btn-danger">APPLICANT DETAILS</a>
                                    
                                    <?php
                                    $district = App\District::where('id', Auth::guard('admin')->user()->district_id)->first();
                                    $disbursement = App\Disbursement::where('applicant_id', $d->applicant->id)->first();
                                    ?>
                                    <a target="_blank" href="{{url('assets/images/disbursements/'.$district->name.'/'.$disbursement->scancopy)}}" class="btn btn-sm btn-success">VIEW RECEIPT</a>
                                        {{-- <a href="#" class="btn btn-sm btn-warning">PRINT INFO</a> --}}
                                    </td>
                                    </tr>
                             @endforeach

                        </tbody>
                    </table>
                    {{-- {{ $disbursements->links() }} --}}
                </div>
            </div>
        </div>
    </div>

</div>
@endif

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
