<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Teere DFMC</title>
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
        <section class="flexbox-container" style="background-image: url('{{asset('assets/images/backgrounds/bg-12.jpg')}}')">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div><img src="{{asset('assets/images/logo.jpeg')}}" style="max-width:100px;border-radius:10px" alt="branding logo"></div>
                                    </div>

                                    <h3 align="center" style="margin-top: 10px;">401 ACCESS DENIED</h3>
                                   
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                       <h4>:) OOOPS Access To Resource Denied</h4>
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
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 content"><span class="text-center d-block d-md-inline-block">Copyright  &copy; {{date('Y')}}. All rights reserved. Teere App</span></p>
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
  </body>
</html>