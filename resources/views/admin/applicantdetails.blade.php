@extends('admin.layout.base')
@section('content')



<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card" id="printout">
            <div class="card-header">
                <h4 class="card-title">APPLICANT DETAILS </h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>FIRSTNAME: </strong> <span
                                        style="margin-left:20px;">{{$applicant->firstname}}</span>
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>LASTNAME: </strong> <span
                                        style="margin-left:20px;">{{$applicant->lastname}}</span>
                                </p>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>EMAIL ADDRESS: </strong> <span
                                        style="margin-left:20px;">{{$applicant->email}}</span>
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

                    <hr>

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
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>DATE OF BIRTH: </strong> <span
                                        style="margin-left:20px;">{{date('d-m-Y', strtotime($applicant->dob))}}</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12">
                                <p style="text-transform:uppercase">
                                    <strong>IS GFD MEMBER?: </strong> <span
                                        style="margin-left:20px;">{{$applicant->gfdmember}}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
                                            <strong>DISABILITY TYPE: </strong> 
                                            <br>
                                            <?php 
                                                 $diabilities = json_decode($applicant->disabilitytype);
                                            ?>
                                            @foreach($diabilities as  $key=>$d)
                                            <span style="margin-left:20px;">#{{$key+1}}  - {{$d}}</span><br>
                                            @endforeach
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
                            <hr>
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
                            <hr>
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
                                            <strong>BUSINESS LOCATION: </strong> <span
                                                style="margin-left:20px;">{{$applicant->business_location}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
                                            <strong>EDUCATION: </strong> <span
                                                style="margin-left:20px;">{{$applicant->education}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
                                            <strong>OCCUPATION: </strong> <span
                                                style="margin-left:20px;">{{$applicant->occupation}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
                                            <strong>YEARS IN BUSINESS: </strong> <span
                                                style="margin-left:20px;">{{$applicant->yearsinobusines==NULL?'N/A':$applicant->yearsinobusines}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <p style="text-transform:uppercase">
                                            <strong>DEPENDANTS: </strong> <span
                                                style="margin-left:20px;">{{$applicant->dependants}} DEPENTANTS</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            <div class="col-md-12">
                                <hr>
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

                                                        @foreach ($reasons as $item)
                                                          <li>{{$item}}</li>
                                                        @endforeach

                                                       
                                                @endif
                                               
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <p style="text-transform:uppercase">
                                                <strong>IS GROUP APPLICATION: </strong> 
                                                @if($applicant->groupapplication != null)
                                                       <?php
                                                          $bens = explode(",", $applicant->groupapplication);
                                                       ?>
                                                       @foreach ($bens as $item)
                                                         <li>{{$item}}</li>
                                                       @endforeach
                                                @else
                                                <span
                                                style="margin-left:20px;">NO</span>
                                                @endif
                                               
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <p style="text-transform:uppercase">
                                                    <strong>WHAT APPLICANT INTEND TO DO WITH FUND: </strong> <span
                                                        style="margin-left:20px;">{{$applicant->intentoffund}}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <p style="text-transform:uppercase">
                                                    <strong>TOTAL AMOUNT REQUESTED: </strong> <span
                                                        style="margin-left:20px;">GHC {{$applicant->total_amount}}</span>
                                                </p>
                                            </div>
                                        </div>
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
                                                        <strong>BUDGET BREAKDOWN: </strong> <span
                                                            style="margin-left:20px;">{{$applicant->budgets}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                      
                                        </div>
                                    </div>
                                </div>

                        <hr>
                        <div class="row">
                                <div class="col-md-12">
                                    @role('Approval Officer|Super Admin')
                                    @if($hasApproved == null)
                                        <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success">APPROVE APPLICANT</button>
                                        <button type="button" data-toggle="modal" data-target="#disapprove" class="btn btn-danger">DISAPPROVE APPLICANT</button>
                                    @else
                                       <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-warning">YOU HAVE ALREADY APPROVED APPLICANT </button>
                                       
                                    @endif
                                       
                                    @endrole  
                                    {{-- <button class="btn btn-primary" id="print">PRINT</button> --}}
                                <a target="_blank" href="{{url('/download-pdf/'.$applicant->id)}}" class="btn btn-info">DOWNLOAD IN PDF</a>
                                    </div>
                        </div>

                        <div class="row" style="margin-bottom: 50px;">

                        </div>
                        
                </div>
            </div>
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Approval Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form id="approveForm">
                    <input type="number" style="display: none;" class="form-control" name="applicantid" value="{{$applicant->id}}" id="amount" placeholder="Enter Amount">   
                            <div class="form-group">
                              <label for="exampleInputEmail1">Amount</label>
                              <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">   
                            </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <textarea class="form-control" name="message" rows="7"></textarea> 
                            </div>

                            <button type="submit" class="btn btn-primary">APPROVE</button>
                          </form>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal -->
<div class="modal fade" id="disapprove" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Disapproval Info</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    <form>
                    <input type="number" style="display: none;" class="form-control" value="{{$applicant->id}}" id="appid" placeholder="Enter Amount">   
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Message</label>
                                    <textarea class="form-control" name="message" rows="7"></textarea> 
                            </div>

                            <button type="submit" class="btn btn-primary">DISAPPROVE</button>
                          </form>
            </div>
          </div>
        </div>
      </div>

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

