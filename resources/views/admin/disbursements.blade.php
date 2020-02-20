@extends('admin.layout.base')
@section('content')


    <div class="row">
            <div class="col-xl-12 col-lg-12 col-12">
                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">SELECT PERIOD</h4>
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
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
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
                                        <a href="#" class="btn btn-sm btn-danger">APPLICANT DETAILS</a>
                                        <a href="#" class="btn btn-sm btn-success">SEND SMS</a>
                                        <a href="#" class="btn btn-sm btn-warning">PRINT INFO</a>
                                    </td>
                                    </tr>
                             @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
@endif

@endsection