@extends('admin.layout.base')


@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
    <div class="card" >
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">NEW DISTRICT</h4>
            <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    <li><a data-action="close"><i class="ft-x"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="card-content collapse show">
            <div class="card-body">
                @if(Session::has('success'))
                    <p class="alert alert-success">{{Session::get('success')}}</p>
                @elseif(Session::has('error'))
                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                @endif

            <form class="form" action="{{url('/new-district')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-grid"></i> District Info</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="projectinput2">DISTRICT NAME</label>
                                    <input type="text" id="projectinput2" required class="form-control" placeholder="District Name" name="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                    
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adminlevel">REGION</label>
                                        <select id="adminlevel" required name="region" class="form-control">
                                            <option value="" selected="" disabled="">Select Region</option>
                                           @foreach ($regions as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                           @endforeach
                                           
                                        </select>
                                    </div>
                                </div>
                        </div>

                    </div>

                    <div class="form-actions">
                        <button type="reset" class="btn btn-danger mr-1">
                            <i class="ft-x"></i> CANCEL
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-square-o"></i> ADD ADMIN
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@stop





@section('scripts-below')


@stop