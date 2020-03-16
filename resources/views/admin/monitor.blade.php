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
                     <div class="col-md-5 col-md-offset-3">
                        <button class="btn btn-primary btn-block">Monitored <span>{{$monitors}}</span></button>
                        </div>
                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-8">
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>NAME: </strong> <span style="margin-left:20px;">{{$applicant->firstname}}
                                        {{$applicant->lastname}}</span>
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>PHONE NUMBER: </strong> <span
                                        style="margin-left:20px;">{{$applicant->phoneno}}</span>
                                </p>
                            </div>

                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>GENDER: </strong> <span
                                        style="margin-left:20px;">{{$applicant->gender}}</span>
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
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
                                <p style="text-transform:uppercase">
                                    <strong>ID TYPE: </strong> <span
                                        style="margin-left:20px;">{{$applicant->idtype}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
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
                                        <p style="text-transform:uppercase">
                                            <strong>STREET NAME: </strong> <span
                                                style="margin-left:20px;">{{$applicant->streetname}}</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
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
                                        <p style="text-transform:uppercase">
                                            <strong>POSTAL ADDRESS: </strong> <span
                                                style="margin-left:20px;">{{$applicant->postal_address}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
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
                                        <p style="text-transform:uppercase">
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
                                        <p style="text-transform:uppercase">
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





                    <div class="col-md-12">
                        <form class="form" id="expenditureForm" enctype="multipart/form-data" action="#" method="POST">
                            {{csrf_field()}}
                            <input name="file" type="file" style="display:none;" />
                            <input name="applicant_id" type="text"  style="display:none;" value="{{$applicant->id}}" />




                            <div class="form-body" id="classobj">
                                <h4 class="form-section"><i class="ft-user"></i> Enter Monitoring Information</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">QUARTER</label>
                                            <select name="quarter" id="quarter" class="form-control">

                                                <option value="1">First Quarter</option>
                                                <option value="2">Second Quarter</option>
                                                <option value="3">Third Quarter</option>
                                                <option value="4">Fourth Quarter</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput2">ACTUAL ACTIVITIES UNDERTAKEN</label>
                                            <textarea required class="form-control" id="activities" name="activities"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <p>Indicate actual amount spent in each category</p>
                                <?php 
                                    $total = 0;
                                    $breakdowns = json_decode($applicant->breakdown);
                                ?>
                                @foreach($breakdowns as $key=> $b)
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">Item</label>
                                            <input type="text" readonly id="name" value="{{$b->item}}" required
                                                class="form-control" placeholder="Item Name" name="item[]">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">Amount Requested</label>
                                            <input type="text" readonly id="totalcost{{$key}}" value="{{$b->totalcost}}"
                                                required class="form-control" placeholder="Item Name"
                                                name="amountrequested[]">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput2">Amount Spent</label>
                                            <input type="text" id="amountspent{{$key}}"
                                                onchange="setAmountSpent({{$key}})" required class="form-control"
                                                placeholder="Item Name" name="amountspent[]">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="projectinput4">Balance</label>
                                            <input type="text" readonly id="balance{{$key}}" value="" required
                                                class="form-control" placeholder="Balance" name="balance[]">
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">DID YOU MAKE ANY GAIN</label>
                                            <select name="hasgain" id="hasgain" class="form-control">

                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="madegain">
                                            <label for="projectinput4">WHAT GAIN(s)</label>
                                            <textarea name="gain" class="form-control" ></textarea>
                                        </div>
                                        <div class="form-group"  id="nogainw">
                                            <label for="projectinput4">REASON ACCOUNTED FOR LOSS(s)</label>
                                            <textarea name="nogain" class="form-control" ></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">ADDITIONAL INFORMATION YOU WANT TO GIVE</label>
                                            <textarea required class="form-control" id="addiontalinfo" name="addiontalinfo"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">RECOMMENDATIONS</label>
                                            <textarea required class="form-control" id="recommendations" name="recommendations"
                                                rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" id="btnSaveExpenditure" style="margin-bottom:10px;"
                                            class="btn btn-success"> <i class="fa fa-remove"></i> SAVE RECORD</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    <div class="row" style="margin-bottom: 50px;">

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