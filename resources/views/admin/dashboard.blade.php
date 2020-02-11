@extends('admin.layout.base')
@section('content')
<div class="row">

        <div class="col-xl-4 col-lg-4 col-12">
                <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left">
                                       
                                        <span> <h5>TOTAL APPROVALS</h5></span>
                                    <h3 class="danger">{{$approvedCount}}</h3>
                                        
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="ft-users danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                   
                                    <span> <h5>PENDING APPROVAL</h5></span>
                                <h3 class="danger">{{$unapprovedCount}}</h3>
                                    
                                </div>
                                <div class="media-right media-middle">
                                    <i class="ft-users danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
         
        <div class="col-xl-4 col-lg-4 col-12">
                <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left">
                                            <h5>NEW APPLICATIONS</h5>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="ft-user-plus success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                {{-- <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            <a href="{{url('/new-applications')}}"  class="btn btn-success btn-block btn-md"> <i class="ft-plus-circle"></i>NEW APPLICATION</a>
                            </div>
                        </div>
                    </div>
        </div>

    </div>

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
                                            <input type="text" name="search" class="form-control" placeholder="Enter name">
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

    
@if(isset($actors))  
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
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>BIN</th>
                                <th>Name</th>
                                {{-- <th>ACTOR TYPE</th> --}}
                                <th>DIGITAL ADDRESS</th>
                                <th>PHONE NO.</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actors as $a)
                            <tr>
                            <td class="text-truncate">{{$a->bin}}</td>
                            <td class="text-truncate">{{$a->name}}</td>
                            {{-- <td class="text-truncate">{{$a->}}</td> --}}
                            <td class="text-truncate">{{$a->digital_address}}</td>
                            <td class="text-truncate">{{$a->phoneno}}</td>
                            <td class="text-truncate">
                                <a href="#" class="btn btn-danger">View Transactions</a>
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