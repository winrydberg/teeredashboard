@extends('admin.layout.base')
@section('content')


<div class="row">
    <div class="col-xl-12 col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">SEARCH BIN</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <div class="card-block"> --}}
                    <form method="GET">
                        <fieldset>
                            <div class="input-group">
                                <input type="text" name="searchbin" class="form-control" placeholder="Enter BIN">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i> SEARCH
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
                                <th>ID</th>
                                <th>NAME</th>
                                <th>REGION</th>
                                <th>DISTRICT</th>
                                <th>PHONE NO</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $a)
                            <tr>
                            <td class="text-truncate">TEERE{{$a->id}}</td>
                            <td class="text-truncate">{{$a->firstname." ".$a->lastname}}</td>
                                {{-- <td class="text-truncate">{{$a->}}</td> --}}
                            <td class="text-truncate">{{$a->region}}</td>
                            <td class="text-truncate">{{$a->district}}</td>
                            <td class="text-truncate">{{$a->phoneno}}</td>
                                <td class="text-truncate">
                                    <a href="#" class="btn btn-md btn-danger">View Details</a>
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

@endsection