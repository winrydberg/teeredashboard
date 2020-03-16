@extends('admin.layout.base')
@section('content')



<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card" id="printout">
            <div class="card-header">
                <h4 class="card-title">MONITORING DETAILS </h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>

            <div class="card-content">

                <div class="col-md-12">
                    <h4 class="form-section"><i class="ft-user"></i> Applicant Info</h4>
                </div>
                    
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-8">
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>NAME: </strong> <span style="margin-left:20px;">{{$applicant->firstname}}
                                        {{$applicant->lastname}}</span>
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>PHONE NUMBER: </strong> <span
                                        style="margin-left:20px;">{{$applicant->phoneno}}</span>
                                </p>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>GENDER: </strong> <span
                                        style="margin-left:20px;">{{$applicant->gender}}</span>
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>MARITAL STATUS: </strong> <span
                                        style="margin-left:20px;">{{$applicant->marital_status}}</span>
                                </p>
                            </div>
                        </div>


                        <div class="col-md-4">
                       
                            <img style="height: 200px; width: 200px;" src="{{asset('uploads/'.$applicant->image)}}"
                                class="img-fluid img-thumbnail" />
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>ID TYPE: </strong> <span
                                        style="margin-left:20px;">{{$applicant->idtype}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>ID NUMBER: </strong> <span
                                        style="margin-left:20px;">{{$applicant->idnumber}}</span>
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:capitalize">
                                            <strong>STREET NAME: </strong> <span
                                                style="margin-left:20px;">{{$applicant->streetname}}</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:capitalize">
                                            <strong>COMMUNITY: </strong> <span
                                                style="margin-left:20px;">{{$applicant->community}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:capitalize">
                                            <strong>POSTAL ADDRESS: </strong> <span
                                                style="margin-left:20px;">{{$applicant->postal_address}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:capitalize">
                                            <strong>HOUSE NUMBER: </strong> <span
                                                style="margin-left:20px;">{{$applicant->houseno}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:capitalize">
                                            <strong>AREAS APPLICANT IS SEEKING FUND TO UNDERTAKE: </strong>

                                            @if($applicant->objective != null || $applicant->objective != "")
                                            <?php
                                                           $reasons = json_decode($applicant->objective);
                                                          // preg_match_all("/\[(.*?)\]/", $reasons, $matches); 
                                                           //$res = explode(',', $matches[1][0]);
                                                        ?>
                                           <ul style="list-style:none;">
                                            @foreach ($reasons as $key=> $item)
                                            <li>
                                                <div style="margin-top:10px;">
                                                    <div class="badge border-info info badge-border">
                                                        {{$key+1}}
                                                    </div>
                                                    {{$item}}
                                                </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                            @endif

                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:capitalize">
                                            <strong>DISABILITY TYPE: </strong>
                                            <br>
                                            <?php 
                                                     $diabilities = json_decode($applicant->disabilitytype);
                                                ?>
                                            @foreach($diabilities as $key=>$d)
                                            <div style="margin-left:20px;">
                                                <div class="badge border-info info badge-border">
                                                    {{$key+1}}
                                                </div>
                                                {{$d}}
                                            </div><br>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>AMOUNT RELEASED: </strong> <span
                                        style="margin-left:20px;">GHC {{$applicant->approvedAmt}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:capitalize">
                                    <strong>ACTIVITY UNDERTAKEN: </strong> <span
                                        style="margin-left:20px;">{{$monitor->activity_undertaken}}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="">
                                    <strong>HAS MADE GAINS: </strong> <span
                                        style="margin-left:20px;">{{$monitor->made_gains==1?'Yes':'No'}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="">
                                    <strong>{{$monitor->made_gains==1?'WHAT GAINS?':'REASONS FOR LOSS'}} </strong><br/>
                                     <span
                                        style="margin-left:20px;">{{$monitor->made_gains?$monitor->gains:$monitor->nogain_reasons}}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="">
                                    <strong>ADDITIONAL INFO: </strong> <br/>
                                    <span
                                        style="margin-left:20px;">{{$monitor->additional_info}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="">
                                    <strong>RECOMMENDATIONS: </strong><br/>
                                     <span
                                        style="margin-left:20px;">{{$monitor->recommendations}}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
                                            <strong>TOTAL EXPENDITURE: </strong> <span
                                                style="margin-left:20px;"></span>
                                                <div class="table-responsive">
                                                    <table id="recent-orders" class="table table-bordered table-hover mb-0 ps-container ps-theme-default">
                                                        <thead>
                                                            <tr>
                                                                <th>ITEM</th>
                                                                <th>AMT. REQUESTED</th>
                                                                <th>AMT. SPENT</th>
                                                                <th>BALANCE</th>
                                                            </tr>
                                                        </thead>

                                                        <?php 
                                                           $total = 0;
                                                           $breakdowns = json_decode($monitor->expenditure);
                                                        ?>
                                                        <tbody>
                                                            @foreach($breakdowns as $a)
                                                            
                                                            <tr>
                                                            <td class="text-truncate">{{$a->item}}</td>
                                                            <td class="text-truncate">{{$a->amountrequested}}</td>
                                                            <td class="text-truncate">GHC {{$a->amountspent}}</td>
                                                            <td class="text-truncate">GHC {{$a->balance}}</td>
                                                            
                                                            </tr>                          
                                                            @endforeach
                                                            <tr>
                                                                <td class="text-truncate"><strong>TOTAL</strong></td>
                                                                <td class="text-truncate"></td>
                                                                <td class="text-truncate"></td>
                                                                <td class="text-truncate"><strong>GHC {{$total}}</strong></td>
                                                                
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                        </p>
                                    </div>
                                </div>
                          
                            </div>
                        </div>
                    </div>

                    <div  style="margin-bottom: 50px;">
                        <?php
                            $district = App\District::where('id', Auth::guard('admin')->user()->district_id)->first();
                            $disbursement = App\Disbursement::where('applicant_id', $applicant->id)->first();
                            ?>

                            
                    <div class="col-md-12">
                    <a class="btn btn-primary" target="_blank" href="{{url('assets/images/disbursements/'.$district->name.'/'.$disbursement->scancopy)}}">
                      VIEW PAYMENT RECEIPT
                    </a> 
                </div>
                         {{-- <button class="btn btn-primary" id="print">PRINT TO PDF</button> --}}
                    </div>

                </div>


            </div>
        </div>
    </div>

</div>


<!-- Modal -->



<!-- Modal -->


@endsection


@section('scripts-below')
<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>

<script>
    $("#approveForm").submit(function(event){
        event.preventDefault();
        swal({
            title: "Approving Applicant",
            text: "Are you sure you want to Approve Applicant?",
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
                    text: "Yes, Approve",
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
                   url: "{{url('/approve-applicant')}}",
                   method: 'POST',
                   data: {data, _token:"{{Session::token()}}"},
                   success: function(response){
                       console.log(response);
                          if(response.status =='success'){
                            swal("Success", response.message, "success");
                          }else{
                            swal("Error", response.message, "error");
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

     $('#btnSave').click(function(){
        $.ajax({
                   url: "{{url('/monitoring-activity')}}",
                   method: 'POST',
                   data: {activity: $('#activities').val(),applicant_id: "{{$applicant->id}}", quarter: $('#quarter').val(), _token:"{{Session::token()}}"},
                   success: function(response){
                       console.log(response);
                          if(response.status =='success'){
                            swal("Success", 'Activities Record Saved Successfully', "success");
                            $('#activities').val(response.newmon);
                          }else{
                            swal("Error", "OOps Something Went Wrong. please try again", "error");
                          }
                   },
                   error: function(error){
                    swal("Error", "OOps Something Went Wrong. please try again", "error");
                        console.log(error)
                   }
               })
     })
//SAVE EXPENDICTUITR
     $('#expenditureForm').submit(function(event){
         event.preventDefault();
         $.ajax({
                   url: "{{url('/monitoring-expenditure')}}",
                   method: 'POST',
                   data: new FormData($("#expenditureForm")[0]),
                   contentType: false,
                   processData: false,
                   success: function(response){
                       console.log(response);
                          if(response.status =='success'){
                            swal("Success", 'Monitoring Data Record Saved Successfully', "success");
                            $('#activities').val(response.newmon);
                          }else{
                            swal("Error", "OOps Something Went Wrong. please try again", "error");
                          }
                   },
                   error: function(error){
                    swal("Error", "OOps Something Went Wrong. please try again", "error");
                        console.log(error)
                   }
               })
     })

$(document).ready(function(){
    $('#madegain').show();
     $('#nogainw').hide();
     $('#hasgain').change(function(){
         var val = $('#hasgain').val();
         if(val ==1){
             $('#madegain').show();
             $('#nogainw').hide();
         }else{
            $('#madegain').hide();
             $('#nogainw').show();
         }
     })
})
     




    function setAmountSpent(key){
        var value = $("#classobj").find("#amountspent"+key).val()
        var amountspent  = $('#amountspent'+key).val();
        var totalcost  = $('#totalcost'+key).val()
        var total = totalcost - amountspent;
        $('#balance'+key).val(total)
}


 
   

    


     
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

@stop