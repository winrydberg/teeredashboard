<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Tracepro</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/base/jquery-ui-1.10.4.custom.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/unslider.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/weather-icons/climacons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/meteocons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/core/menu/menu-types/vertical-menu-modern.css')}}">
    <style type="text/css">
    .form-simple input[type='text'] {
  margin-bottom : -1px;
  border-bottom-right-radius : 0;
  border-bottom-left-radius : 0;
}

.form-simple input[type='mail'] {
  margin-bottom : -1px;
  border-top-left-radius : 0;
  border-top-right-radius : 0;
  border-bottom-right-radius : 0;
  border-bottom-left-radius : 0;
}

.form-simple input[type='password'] {
  margin-bottom : 10px;
  border-top-left-radius : 0;
  border-top-right-radius : 0;
}

.help-block ul {
  margin : 0  !important;
  padding : 0 !important;
}
.help-block ul li {
  list-style : none;
}
      .ui-widget-overlay{background: rgba(0,0,0,0.7);}
    </style>
     <style type="text/css">
     .picker{
        position: relative;
     }
     .tab-content > .tab-pane,
.pill-content > .pill-pane {
display: block; 
height: 0;
overflow-y: hidden;
}
.tab-content > .active,
.pill-content > .active {
height: auto;       
}
 </style>
  </head>
  <body background="{{asset('assets/images/backgrounds/bg-12.jpg')}} data-open="click" data-menu="horizontal-menu" data-col="1-column" class="horizontal-layout horizontal-menu 1-column   menu-expanded blank-page blank-page">
 
    
    <div class="app-content content" background="{{asset('assets/images/backgrounds/bg-12.jpg')}}">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body" background="{{asset('assets/images/backgrounds/bg-12.jpg')}}"><!-- Stats -->
            {{-- start here --}}
        <section class="flexbox-container" style="background-image: url('{{asset('assets/images/backgrounds/mac.jpg')}}')">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-6 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div><img src="{{asset('assets/images/user.png')}}" style="max-width:100px;border-radius:10px" alt="branding logo"></div>
                                    </div>

                                    <h3 align="center" style="margin-top: 10px;">ENTER NEW PASSWORD</h3>
                                   
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                      @if(Session::has('error'))
                                    <p class="alert alert-danger">{{Session::get('error')}}</p>
                                      @endif
                                    <form class="form-horizontal form-simple" method="POST" id="changePasswordForm">
                                             {{csrf_field()}}   
                                             <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="password" name="newpassword" class="form-control form-control-lg input-lg" id="user-password" placeholder="New Password" required="">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="confirmpassword" class="form-control form-control-lg input-lg" id="cuser-password" placeholder="Confirm Password" required="">
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>

                                        <input type="text" hidden  value="{{ $token }}" name="token" class="form-control form-control-lg input-lg" id="token" placeholder="Confirm Password" required="">
                                        <input type="text" hidden  value="{{ $id }}" name="id" class="form-control form-control-lg input-lg" id="bin" placeholder="Confirm Password" required="">


                                            <button type="submit" class="btn btn-lg btn-block" style="background:black;color:white"><i class="ft-unlock"></i> RESET PASSWORD</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    {{-- <div class="">
                                        <p class="float-sm-left text-center m-0" ><a href="#" class="card-link"><span style="color:black">Recover password</span></a></p>
                                       
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            {{-- ends here --}}
        </div>
      </div>
    </div>
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 content"><span class="text-center d-block d-md-inline-block">Copyright  &copy; {{date('Y')}}. All rights reserved. Tracepro</span></p>
    </footer>
    @yield('scripts-above')
    
    {{-- send message modal --}}   
   <script src="{{asset('assets/js/core/jquery/jquery.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/vendors.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/jquery/jquery-ui.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendors/js/extensions/unslider-min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/app-menu.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/core/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/scripts/customizer.js')}}" type="text/javascript"></script>
    @yield('scripts-below')
    <script type="text/javascript">
      setTimeout(function(){$('.alert').slideUp(500);},5000);
    </script>
    <script type="text/javascript">
      // $('table, .datatables').DataTable();
    </script>
    <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>


<script>
  $("#changePasswordForm").submit(function(event){
     event.preventDefault();
     swal({
         title: "Changing Password",
         text: "",
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
                 text: "Reset Password",
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
                url: "{{url('/save-new-password')}}",
                method: 'POST',
                data: new FormData($("#changePasswordForm")[0]),
                contentType: false,
                processData: false,
                success: function(response){
                    console.log(response);
                       if(response.status =='success'){
                         swal("Success", response.message, "success");
                         setTimeout(function(){
                             window.location.href="{{url('/login')}}";
                         }, 1500)
                       }else if(response.status=='notloggedin'){
                        window.location.href="{{url('/login')}}";
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
  </body>
</html>