@extends('admin.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">{{Session::get('error')}}</div>
@endif
<div class="row">
        <div class="col-md-12">
           
            <div class="card">
                 <div class="card-header">
                    <h4 class="card-title">DISBURSEMENT INFO</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collpase show">
                    <div class="card-body">
                        <div class="card-text">
                        </div>
                     <div class="row">
                         <div class="col-md-8">
                                <form class="form form-horizontal" method="POST" action="{{url('/save-disbursement-info')}}" enctype="multipart/form-data" >
                                    {{csrf_field()}}
                                    <div class="form-body">

                                       <input type="number" id="admin_id" style="display:none;" class="form-control" value="{{Auth::guard('admin')->user()->id}}" name="admin_id">
                                       <input type="number" id="amount" style="display:none;" class="form-control" value="{{Auth::guard('admin')->user()->district_id}}" name="district_id">
                                       <input type="number" id="amount" style="display:none;" class="form-control" value="{{$applicant->id}}" name="applicant_id">
                                           
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="farmname">Amount Released(GHC)</label>
                                            <div class="col-md-9">
                                            <input type="number" id="amount" readonly class="form-control" value="{{$applicant->approvedAmt}}" name="amount">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="farmlocation">Date Released</label>
                                                <div class="col-md-9">
                                                <input type="date" id="farmlocation"  class="form-control" name="date">
                                                </div>
                                        </div>
        
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="farmlocation">Receipient Account</label>
                                                <div class="col-md-9">
                                                    <input type="text" required id="farmlocation" class="form-control" name="accountno">
                                                </div>
                                        </div>
        
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="farmlocation">Scan Copy of Receipt</label>
                                                <div class="col-md-9">
                                                    <input type="file" required id="farmlocation" class="form-control" name="image">
                                                </div>
                                        </div>
        
                                      
                                                                    
                                        
                                    </div>
        
                                    <div class="form-actions center">
                                        <button type="reset" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary submit">
                                            <i class="fa fa-check-square-o"></i> Save Info
                                        </button>
                                    </div>
                                </form>
                         </div>
                         <div class="col-md-4">
                               <div class="col-md-12">
                               <img style="height:200px; width:200px;" src="{{asset('uploads/'.$applicant->image)}}" class="img-thumbnail"/>
                               </div>
                               <div class="col-md-12">
                               <h5 style="margin-top:30px; text-transform:uppercase">{{$applicant->firstname." ".$applicant->lastname}}</h5>
                               <h5 style="margin-top:5px; text-transform:uppercase">{{$applicant->phoneno}}</h5>
                               </div>
                         </div>
                     </div>
                   

                        <br>
                        <br>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>  


  
@endsection
{{-- @section('scripts-below')
  <script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
  <script type="text/javascript">
//   $('#showqrcode').modal('show');
  $('.delete').click(function(e){
        e.preventDefault();
     var id = $(this).attr('id');
        swal({
            title: "Are you Sure?",
            text: "Delete This Farm From Database",
            icon: "info",
            showCancelButton: true,
            buttons: {
                cancel: {
                    text: "No",
                    value: null,
                    visible: true,
                    className: "btn-danger",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes",
                    value: true,
                    visible: true,
                    className: "btn-success",
                    closeModal: false
                }
            }
        }).then(isConfirm => {
            if (isConfirm) {
                $.get("{{url('farmers/deletefarm')}}",{id:id},function(r){
                        if(r.status=='success'){
                            
                            window.location.reload(true);
                        }
                }).fail(function(){
                    swal("Error",'Check Network Connection','error');
                })
            }else {
                swal("Error", "Farm Not Deleted", "error");
            }
        });
    });
  </script>
  <script type="text/javascript">
    $('#addproductform').submit(function(e){
        e.preventDefault();
        $('#loadinggif').show();
        $.post($('#addproductform').attr('action'),$(this).serialize(),function(response){
            $('#loadinggif').hide(); 
          if(response.status==='success'){
            $('#qrcodebay').attr('src',"{{url('/qrcodes')}}"+'/'+response.productidno+'.svg');
            var dt = JSON.parse(response.data);
            $('#productname').text(dt.productname)
            $('#productbatch').text(dt.productbatchno)
            $('#productqty').text(dt.productquantity)

            // $('#farmdetails').text(dt.farm)
            $('#showqrcode').modal('show');
           // swal("Success",'Transactions successfully recorded','success');
          }else{
            swal("Error",'Sorry.. Your Transactions could not be saved.. Please try again','error');
          }
        }).fail(function(){
        $('#loadinggif').hide(); 
        swal("Error",'Sorry.. Your Transactions could not be saved.. Please try again','error');
        });
    });
</script>
 <script type="text/javascript">
    $('#print').on('click',function(){
     let mywindow = window.open('', 'PRINT', 'height=650,width=900,top=100,left=150');
         mywindow.document.write('<html><head><title>Print out</title>');
         mywindow.document.write('<style type="text/css">@media print { .headback{background:#ddd;} }</style>');
         //mywindow.document.write('<link rel="stylesheet" type="text/css" href="http://localhost/rework/ugpay/assets/css/vendors.css">');
         mywindow.document.write('</head><body>');
         mywindow.document.write(document.getElementById('printout').innerHTML);
         mywindow.document.write('</body></html>');
         mywindow.document.close(); // necessary for IE >= 10
         mywindow.focus(); // necessary for IE >= 10*/
         mywindow.print();
          mywindow.close();
   return true;
 
 
    })
  
   </script>

@endsection --}}