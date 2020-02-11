@extends('admin.layout.base')
@section('content')


  
<div class="row">
		<div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">STAFF</h4>
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
                                <th>NAME</th>
                                <th>EMAIL</th>
                                {{-- <th>ACTOR TYPE</th> --}}
                                <th>PHONENO</th>
                                <th>ROLE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $a)
                            <tr>
                            <td class="text-truncate">{{$a->name}}</td>
                            <td class="text-truncate">{{$a->email}}</td>
                            {{-- <td class="text-truncate">{{$a->}}</td> --}}
                            <td class="text-truncate">{{$a->phoneno}}</td>
                            @if($a->role_id ==1)
                            <td class="text-truncate">SUPER ADMIN</td>
                            @elseif($a->role_id ==2)
                            <td class="text-truncate">MONITOR</td>
                            @else
                            <td class="text-truncate">N/A</td>
                            @endif
                            <td class="text-truncate">
                                <a href="#" class="btn btn-sm btn-danger">DELETE</a>
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