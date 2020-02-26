<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    
    <title>TEERE Diability Fund Management Committee - DFMC</title>
   
    @yield('styles-above')
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
      .ui-widget-overlay{background: rgba(0,0,0,0.7);}
    </style>
     @yield('page-styles')
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
    @yield('styles-below')
  </head>
  <body data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar">
  
    @include('admin.layout.topnav')  
    
    @include('admin.layout.sidemenu')

    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
           @yield('content')
        </div>
      </div>
    </div>
    <footer class="footer footer-static footer-light navbar-border">
      <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2 content"><span class="float-md-left d-block d-md-inline-block">Copyright  &copy; {{date('Y')}}. All rights reserved. Teere Systems. Designed by <a href="www.digicodesystems.com">Digicode Systems</a></span></p>
    </footer>
    @yield('scripts-above')
    <div id="roxyCustomPanel2" style="display: none;">
        <iframe style="width:100%;height:100%" frameborder="0">
          </iframe>
    </div>
    {{-- send message modal --}}
{{-- <div class="modal fade text-left" id="sendmessagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <label class="modal-title text-text-bold-600" id="myModalLabel33">Send Message</label>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="POST" action="{{url('/admin/sendsinglemessage')}}" id="sendsinglemessageform">
      <input type="hidden" name="phone" id="receipientphonehidden">

        {{csrf_field()}}
      <div class="modal-body">

         <label>Sending Message To: </label>
        <div class="form-group">
            <input type="text" placeholder="Recipient Name" class="form-control" name="receipientname" id="receipientname" readonly="">
        </div>

         <label>Phone Number: </label>
        <div class="form-group">
            <input type="text" placeholder="Phone Number" class="form-control" name="receipientphone" id="receipientphone" required="required">
        </div>

        <label>Subject: </label>
        <div class="form-group">
            <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject" required="required">
        </div>

        <label>Message: </label>
        <div class="form-group">
            <textarea placeholder="Add Message" class="form-control" rows="3" name="message" id="message" required="required"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <input type="reset" class="btn btn-outline-secondary" data-dismiss="modal" value="Cancel">
        <button type="button" class="btn btn-outline-primary" id="sendsinglemessagebtn">Send Message <img src="{{asset('assets/images/loading.gif')}}" style="max-height: 20px;display: none;" id="loading"></button>
      </div>
    </form>
</div>
</div>
</div> --}}


{{-- <button type="button" data-toggle="modal" id="onshowbtn" data-target="#showthisbefore">
                  
                  </button> --}}
{{-- try this and see --}}
{{-- <div class="modal fade text-left" id="showthisbefore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <label class="modal-title text-text-bold-600" id="myModalLabel33"></label>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                      
                                    </div>
                                </div>
                            </div>
                        </div> --}}
{{-- end --}}

     <script>
        function openCustomRoxy2(id){
         // $('textarea,.cke').hide();
            $('iframe').attr('src',"{{Request::root()}}/{{Session::get('school_id')}}/index.html?integration=custom&type=files&txtFieldId="+id);
              $('#roxyCustomPanel2').addClass('modal').dialog({modal:true, width:875,height:600});
            $('.ui-dialog-titlebar-close').html('<span class="ui-button-icon ui-icon ui-icon-closethick"></span><span class="ui-button-icon-space"> </span>');
        }
        function closeCustomRoxy2(){
          $('textarea,.cke').show();
          $('#roxyCustomPanel2').dialog('close');
          //$('textarea,.cke').show();
        }
     </script>
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