@extends('admin.layout.base')
@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">YOUR MONITORINGS</h4>
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
                <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>APPLICANT NAME</th>
                            <th>FUND RELEASED DATE</th>
                            
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($monitorings as $a)
                        <tr>
                        <td class="text-truncate">1</td>
                        <td class="text-truncate">2</td>
                        <td class="text-truncate">3</td>
                        <td>
                        <a href="{{url('/applicant-details/teere00'.$a->id)}}" class="btn btn-success">VIEW DETAILS</a>
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


@stop