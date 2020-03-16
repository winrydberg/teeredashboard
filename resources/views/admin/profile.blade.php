@extends('admin.layout.base')

@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/users.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/pages/timeline.min.css')}}">
@stop

@section('content')
{{-- <div class="row col-md-12"> --}}
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div id="user-profile">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card profile-with-cover">
                            <div class="card-img-top img-fluid bg-cover height-300"
                        style="background: url('{{asset('assets/images/22.jpg')}}') 50%;"></div>
                            <div class="media profil-cover-details w-100">
                                <div class="media-left pl-2 pt-2">
                                    <a href="#" class="profile-image">
                                    <img src="{{asset('assets/images/user.png')}}"
                                            class="rounded-circle img-border height-100" alt="Card image">
                                    </a>
                                </div>
                                <div class="media-body pt-3 px-2">
                                    <div class="row">
                                        <div class="col">
                                        <h3 class="card-title">{{$admin->name}}</h3>
                                        {{-- <p><strong>My Profile</strong></p> --}}
                                        </div>
                                        {{-- <div class="col text-right">
                                            <button type="button" class="btn btn-primary d-"><i class="fa fa-plus"></i>
                                                Follow</button>
                                            <div class="btn-group d-none d-md-block float-right ml-2" role="group"
                                                aria-label="Basic example">
                                                <button type="button" class="btn btn-success"><i
                                                        class="fa fa-dashcube"></i> Message</button>
                                                <button type="button" class="btn btn-success"><i
                                                        class="fa fa-cog"></i></button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <nav class="navbar navbar-light navbar-profile align-self-end">
                                <button class="navbar-toggler d-sm-none" type="button" data-toggle="collapse"
                                    aria-expanded="false" aria-label="Toggle navigation"></button>
                                <nav class="navbar navbar-expand-lg">
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav mr-auto">

                                            <li class="nav-item">
                                                <a class="nav-link" href="#"><i class="fa fa-heart-o"></i>
                                                    Favourites</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#"><i class="fa fa-bell-o"></i>
                                                    Notifications</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </nav>

                            <div class="col-md-12">
                                    <form class="form" action="{{url('/new-admin')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i> Profile Info</h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput2">NAME</label>
                                                    <input type="text" id="projectinput2" required class="form-control" placeholder="Name" disabled value="{{$admin->name}}" name="name">
                                                    </div>
                                                </div>
                    
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput4">PHONE NUMBER</label>
                                                    <input type="text" id="projectinput4" required class="form-control" value="{{$admin->phoneno}}" disabled placeholder="Phone No" name="phoneno">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput3">EMAIL</label>
                                                    <input type="email" id="projectinput3" required class="form-control" value="{{$admin->email}}" disabled placeholder="E-mail" name="email">
                                                    </div>
                                                </div>

                                                

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            
                                                            <label for="projectinput3"> STAFF ROLE(S)</label>
                                                            <?php 
                                                                  $roles = json_decode($admin->adminroles);
                                                                
                                                            ?>
                                                         
                                                            <select disabled class="select2 form-control block" name="roles[]" multiple="multiple" style="width: 100%">
                                                                   @foreach($roles as $r)
                                                                     <option selected value="{{$r}}">{{$r}}</option>
                                                                   @endforeach
                                                                    
                                                            </select>
                                                    
                                                        </div>
                                                        </div>
                    
                
                                            </div>
                                            
                                            <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput3">PASSWORD</label>
                                                            <input type="text" id="password" readonly class="form-control" placeholder="Password" disabled value="***********" name="password">
                                                        </div>
                                                    </div>
                    
                                            </div>
                    
                                        </div>
                    
                                        <div class="form-actions">
                                            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> CHANGE PASSWORD
                                            </button>
                                        </div>
                                    </form>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <form id="changePasswordForm">
                    {{csrf_field()}}
                <div class="form-group">
                          <label for="exampleInputEmail1">Old Password</label>
                          <input type="text" class="form-control" id="oldpassword" name="oldpassword" placeholder="Enter Old Password">   
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">New Password</label>
                            <input type="text" class="form-control" id="password" name="newpassword" placeholder="Enter New Password">   
                          </div>

                          <div class="form-group">
                            <label for="exampleInputEmail1">Confirm New Password</label>
                            <input type="text" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Repeat Password">   
                          </div>
                        

                        <button type="submit" class="btn btn-primary">CHANGE PASSWORD</button>
                      </form>
        </div>
      </div>
    </div>
  </div>

@stop





@section('scripts-below')
<script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/forms/select/form-select2.js')}}"></script>
<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>

{{-- <script src="{{asset('assets/js/scripts/charts/echarts/bar-column/stacked-column.js')}}"></script>
<script src="{{asset('assets/js/scripts/charts/echarts/radar-chord/non-ribbon-chord.js')}}"></script>
<script src="{{asset('assets/js/scripts/gallery/photo-swipe/photoswipe-script.js')}}">
    </scrip
<script src="{{asset('assets/js/scripts/pages/timeline.js')}}">
</script> --}}
<script>
     $("#changePasswordForm").submit(function(event){
        event.preventDefault();
        swal({
            title: "Change Password",
            text: "Are you sure you want to Change Password?",
            icon: "info",
            showCancelButton: true,
            buttons: {
                cancel: {
                    text: "No Cancel",
                    value: null,
                    visible: true,
                    className: "btn-danger",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes, Change Password",
                    value: true,
                    visible: true,
                    className: "btn-success",
                    closeModal: false
                }
            }
        }).then(isConfirm => {
            if (isConfirm) {
                var data = $(this).serialize();
                $.ajax({
                   url: "{{url('/change-password')}}",
                   method: 'POST',
                   data: new FormData($("#changePasswordForm")[0]),
                   contentType: false,
                   processData: false,
                   success: function(response){
                       console.log(response);
                          if(response.status =='success'){
                            swal("Success", response.message, "success");
                            setTimeout(function(){
                                location.reload()
                            }, 1500)
                          }else if(response.status=='notloggedin'){
                            window.location.href='/login';
                          }else if(response.status=='error'){
                            swal("Error", response.message, "error");
                          }else{
                            swal("Error",'Oops Something Went Wrong. Please try again', "error");
                          }
                   },
                   error: function(error){
                        alert('Oops Something went wrong. Please try again');
                        console.log(error)
                   }
               })
            }else {
                swal("Error", "Action cancelled. Applicant not approved by you yet", "error");
            }
        });
        
        
     })
</script>
@stop