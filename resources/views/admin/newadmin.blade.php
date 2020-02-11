@extends('admin.layout.base')


@section('content')
<div class="col-md-12">
    <div class="card" style="height: 980px;">
        <div class="card-header">
            <h4 class="card-title" id="basic-layout-form">NEW ADMINISTRATOR</h4>
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

            <form class="form" action="{{url('/new-admin')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> Admin Info</h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput2">NAME</label>
                                    <input type="text" id="projectinput2" required class="form-control" placeholder="Name" name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput4">PHONE NUMBER</label>
                                    <input type="text" id="projectinput4" required class="form-control" placeholder="Phone No" name="phoneno">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="projectinput3">EMAIL</label>
                                    <input type="email" id="projectinput3" required class="form-control" placeholder="E-mail" name="email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adminlevel">ADMIN LEVEL</label>
                                        <select id="adminlevel" required name="adminlevel" class="form-control">
                                            <option value="" selected="" disabled="">Select Admin Level</option>
                                            <option value="1">SUPER ADMIN</option>
                                            <option value="2">MONITOR</option>
                                        </select>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="projectinput3">PASSWORD</label>
                                        <input type="text" id="password" readonly class="form-control" placeholder="Password" name="password">
                                    </div>
                                </div>

                                {{-- <div class="col-md-6" >
                                        <div class="form-group">
                                            <input type="hidden"  id="passwordmain" class="form-control" placeholder="Password" name="passwordmain">
                                        </div>
                                    </div> --}}
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
@stop





@section('scripts-below')
    <script>
          $(document).ready(function(){ 
               $.ajax({
                   url: "{{url('/get-passsword')}}",
                   method: 'GET',
                   data: {_token:"{{Session::token()}}"},
                   success: function(response){
                          $('#password').val(response.password);
                          $('#passwordmain').val(response);
                   },
                   error: function(error){
                        alert('Oops Something went wrong. Please try again');
                        console.log(error)
                   }
               })
          });
    </script>
@stop