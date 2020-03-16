@extends('admin.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/forms/selects/select2.min.css')}}">
@stop
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">SMS Sent</div>
@endif
@if(Session::has('error'))
<div class="alert alert-error">Unable to send SMS</div>
@endif
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">SEND PUSH NOTIFICATION</h4>
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
                        <div class="col-md-12">
                            <form class="form form-horizontal"  id="theform">
                                {{csrf_field()}}
                                <div class="form-body">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput3"> FROM </label>
                                            <select class=" form-control block" id="from" name="from"
                                                style="width: 100%">
                                                <option value="null">Select Applicant Category </option>

                                                <option value="0">All Applicant </option>
                                                <option value="1">All Approved Applicant </option>
                                                <option value="2">All Disbursed Applicant</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput3"> RECIPIENTS <span style="color:red" id="cat"></span></label>
                                            <select class="select2 form-control block" id="applicantlist" name="receipients[]"
                                                multiple="multiple" style="width: 100%">

                                                <option value="122">234566778888</option>

                                            </select>

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="projectinput3"> ENTER MESSAGE </label>
                                            <textarea  class="form-control" name="message"></textarea>

                                        </div>
                                    </div>






                                </div>

                                <div class="form-actions center">
                                    <button type="reset" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </button>
                                    <button type="button" id="btnSubmit" class="btn btn-primary submit">
                                        <i class="fa fa-check-square-o"></i> SEND NOTIFICATION
                                    </button>
                                </div>
                            </form>
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
@section('scripts-below')
<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/scripts/forms/select/form-select2.js')}}"></script>


<script>
    $('#from').change(function(){
        var value = $('#from').val();

        if(value==0){
            $('#cat').text(" - Leave blank if you want to send to all applicants")
        }else if(value ==1){
            $('#cat').text(" - Leave blank if you want to send to all approved applicants")
        }else if(value==2){
            $('#cat').text(" - Leave blank if you want to send to all disbursed applicant")
        }else{
            $('#cat').text("")
        }
        $('#applicantlist').find('option').remove().end()
        $.ajax({
                   url: "{{url('/get-sms-applicant')}}",
                   method: 'POST',
                   data: {group: value, _token:"{{Session::token()}}"},
                   success: function(response){
                       var applicants = response.apllicants;
                     
                        $.each(applicants, function (index, value) {
                            $('#applicantlist').append($('<option/>', { 
                                value: value.id,
                                text : value.firstname+' '+value.lastname
                            }));
                        });    
                   },
                   error: function(error){
                        alert('Oops Something went wrong. Please try again');
                        console.log(error)
                   }
               })
    }); 
  
</script>

<script>
     $('#btnSubmit').click(function(){
     

        swal({
            title: "PUSH NOTIFICATION",
            text: "Sure to send notification",
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
                    text: "Yes, Send",
                    value: true,
                    visible: true,
                    className: "btn-success",
                    closeModal: false
                }
            }
        }).then(isConfirm => {
            if (isConfirm) {
                var data = new FormData($("#theform")[0]);
                console.log(data);
                $.ajax({
                   url: "{{url('/send-notification')}}",
                   method: 'POST',
                   data: new FormData($("#theform")[0]),
                    contentType: false,
                    processData: false,
                   success: function(response){
                       console.log(response);
                          if(response.status =='success'){
                            swal("Success", response.message, "success");
                            setTimeout(function(){
                                location.reload();
                            }, 2000)
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
                swal("Error", "Action cancelled. Notification not sent", "error");
            }
        });

    })
</script>
@endsection