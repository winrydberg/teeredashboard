@extends('admin.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
@section('content')

<!-- Form wizard with step validation section start -->
<section id="validation">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">NEW APPLICANT</h4>
                    <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
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
                        <form id="applicantForm" action="#" class="steps-validation wizard-circle" method="POst" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <h6>Step 1</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6 col-offset-md-2">
                                        <img id="photo" src="{{asset('assets/images/user.png')}}"
                                            style="height: 200px; width: 200px;" class="img-circle img-fluid" />
                                        <div class="form-group">
                                            <label for="firstName3">
                                                Passport Photo
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="file" class="form-control " id="passport" name="passport">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>


                            <!-- Step 1 -->
                            <h6>Step 2</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName3">
                                                First Name :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control " id="firstName3"
                                                name="firstname">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName3">
                                                Last Name :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control " id="lastName3"
                                                name="lastname">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress5">
                                                Email Address :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="email" class="form-control" id="emailAddress5" name="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">
                                                Select City :
                                                <span class="danger">*</span>
                                            </label>
                                            <select class="custom-select form-control " id="gender"
                                                name="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phoneNumber3">Phone Number :</label>
                                            <input type="tel" name="phoneno" class="form-control" id="phoneNumber3">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date3">Date of Birth :</label>
                                            <input type="date" class="form-control " id="date3">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">
                                                ID Type :
                                                <span class="danger">*</span>
                                            </label>
                                            <select class="custom-select form-control " id="idtype"
                                                name="idtype">
                                                <option value="">Select ID Type</option>
                                                <option value="Voter ID">Voter ID</option>
                                                <option value="Driver License">Driver License</option>
                                                <option value="NHIS">NHIS</option>
                                                <option value="Ghana card">Ghana Card</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress5">
                                                ID Number :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="number" class="form-control" id="emailAddress5"
                                                name="idnumber">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">
                                                Marital Status :
                                                <span class="danger">*</span>
                                            </label>
                                            <select class="custom-select form-control " id="idtype"
                                                name="marital_status">
                                                <option value="">Select Marittal Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Maried">Maried</option>
                                                <option value="Divorced">Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">
                                                Are You GFD Member :
                                                <span class="danger">*</span>
                                            </label>
                                            <select class="custom-select form-control " id="idtype"
                                                name="gfdmember">
                                                <option value="">GFD Member?</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                              
                                <div class="row">
                                        <legend>Applicant Account Info</legend>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location"> Password :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="password" name="password">
                                                </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="location">Repeat Password :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <input type="text" class="form-control" id="confirmpassword" name="confirmpassword">
                                                </div>
                                        </div>
                                </div>
                            </fieldset>

                            <!-- Step 2 -->
                            <h6>Step 3</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Diability Type :</label>
                                            <div class="c-inputs-stacked">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="vision"
                                                         id="item21">
                                                    <label class="custom-control-label" for="item21">Visually
                                                        Impaired</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"  name="hearing"
                                                         id="item22">
                                                    <label class="custom-control-label" for="item22">Hearing
                                                        Impaired</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="physic"
                                                         id="item23">
                                                    <label class="custom-control-label" for="item23">Physically
                                                        Disabled</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="mental"
                                                         id="item24">
                                                    <label class="custom-control-label"
                                                        for="item24">Mental/Intellectual</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="albinos"
                                                         id="item25">
                                                    <label class="custom-control-label" for="item25">Albino</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </fieldset>

                            <!-- Step 3 -->
                            <h6>Step 4</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventName3">
                                                Community Name :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="communityname"
                                                name="communityname">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventName3">
                                                Postal Address :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="postaladdress"
                                                name="postaladdress">
                                        </div>

                                        <div class="form-group">
                                            <label for="eventName3">
                                                Street Name :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="streetname" name="streenname">
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="eventName3">
                                                House no :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="postaladdress"
                                                name="houseno">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventName3">
                                                Contact No :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="contactno" name="phoneno">
                                        </div>
                                        <div class="form-group">
                                            <label for="eventName3">
                                                Business Location :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="bislocation" name="business_location">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Step 4 -->
                            <h6>Step 5</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="location">
                                                Education :
                                                <span class="danger">*</span>
                                            </label>
                                            <select class="custom-select form-control " id="idtype"
                                                name="education">
                                                <option value="">Select Education</option>
                                                <option value="None">None</option>
                                                <option value="Basic">Basic</option>
                                                <option value="Secondary">Secondary</option>
                                                <option value="Tertiary">Tertiary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Step 4 -->
                            <h6>Step 6</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName3">
                                                Occupation :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" id="occupation" name="occupation">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastName3">
                                                Years In Business :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="text" class="form-control " id="yearsinbusiness"
                                                name="yearsinobusines">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress5">
                                                Number Of Depedants :
                                                <span class="danger">*</span>
                                            </label>
                                            <input type="number" class="form-control" id="depedants" name="dependants">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <h6>Step 7</h6>
                            <fieldset>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label>Which of the following objective area are you seeking the fund to
                                                undertake? :</label>
                                            <div class="c-inputs-stacked">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="income"
                                                        id="item21">
                                                    <label class="custom-control-label" for="item21">Income
                                                        Generation</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="educational"
                                                        id="item22">
                                                    <label class="custom-control-label" for="item22">Educational
                                                        Support</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="organization"
                                                        id="item23">
                                                    <label class="custom-control-label" for="item23">Organizational
                                                        development</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="medical"
                                                        id="item24">
                                                    <label class="custom-control-label" for="item24">Medical/Assistive
                                                        devices</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="skillsdev" 
                                                        id="item25">
                                                    <label class="custom-control-label" for="item25">Skills
                                                        training/apprenticeship</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emailAddress5">
                                                For group applications, Enter list of beneficiaries names.:
                                                <span class="danger">*</span>
                                            </label>
                                            <textarea class="form-control" name="groupapplication"
                                                placeholder="Eg. John Doe, Jane Doe, Owusu Aboagye"></textarea>
                                        </div>
                                    </div>


                                </div>
                            </fieldset>
                            {{-- <h6>Step 8</h6> --}}
                            {{-- <fieldset>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emailAddress5">
                                                                For group applications, Enter list of beneficiaries names.:
                                                            <span class="danger">*</span>
                                                        </label>
                                                       <textarea class="form-control" name="fundintents" placeholder="Describe briefly what you intend to do with the fund "></textarea>
                                                    </div>
                                            </div>
                                    </div>
                            </fieldset> --}}

                            <h6>Step 8</h6>
                            <fieldset>
                                    <div class="row">
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emailAddress5">
                                                           Total Amount Requested :(GHC)
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="number" class="form-control" id="amount" name="amount">
                                                    </div>
                                                </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emailAddress5">
                                                               Budget Breakdown :
                                                            <span class="danger">*</span>
                                                        </label>
                                                       <textarea class="form-control" name="budgets" placeholder="Budget Breakdown "></textarea>
                                                    </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                            <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Disclosure Statement by Applicant:</label>
                                                        <div class="c-inputs-stacked">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="radio" name="agree" value="1"
                                                                    id="item21">
                                                                <label class="custom-control-label" for="item21">I Agree</label>
                                                            </div>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="radio" name="agree" 
                                                                    id="item22" value="0">
                                                                <label class="custom-control-label" for="item22">I Disagree</label>
                                                            </div>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                    </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Form wizard with step validation section end -->



<!-- Modal -->
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
        <div class="modal-dialog modal-sm" role="document">
          <div class="modal-content">
            <div class="modal-body text-center">
              <div class="loader"></div>
              <div clas="loader-txt">
                <p>Sending Application. <br><br><small>Please Wait...</small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <style>
      @import url(https://fonts.googleapis.com/css?family=Roboto:300,400);
body {
  height: 100%;
  padding: 0px;
  margin: 0px;
  background: #333;
  font-family: 'Roboto', sans-serif !important;
  font-size: 1em;
}
h1{
  font-family: 'Roboto', sans-serif;
  font-size: 30px;
  color: #999;
  font-weight: 300;
  margin-bottom: 55px;
  margin-top: 45px;
  text-transform: uppercase;
}
h1 small{
  display: block;
  font-size: 18px;
  text-transform: none;
  letter-spacing: 1.5px;
  margin-top: 12px;
}
.row{
  max-width: 950px;
  margin: 0 auto;
}
.btn{
  white-space: normal;
}
.button-wrap {
  position: relative;
  text-align: center;
  .btn {
    font-family: 'Roboto', sans-serif;
    box-shadow: 0 0 15px 5px rgba(0, 0, 0, 0.5);
    border-radius: 0px;
    border-color: #222;
    cursor: pointer;
    text-transform: uppercase;
    font-size: 1.1em;
    font-weight: 400;
    letter-spacing: 1px;
    small {
      font-size: 0.8rem;
      letter-spacing: normal;
      text-transform: none;
    }
  }
}


/** SPINNER CREATION **/

.loader {
  position: relative;
  text-align: center;
  margin: 15px auto 35px auto;
  z-index: 9999;
  display: block;
  width: 80px;
  height: 80px;
  border: 10px solid rgba(0, 0, 0, .3);
  border-radius: 50%;
  border-top-color: #000;
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}

@-webkit-keyframes spin {
  to {
    -webkit-transform: rotate(360deg);
  }
}


/** MODAL STYLING **/

.modal-content {
  border-radius: 0px;
  box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
}

.modal-backdrop.show {
  opacity: 0.75;
}

.loader-txt {
  p {
    font-size: 13px;
    color: #666;
    small {
      font-size: 11.5px;
      color: #999;
    }
  }
}

#output {
  padding: 25px 15px;
  background: #222;
  border: 1px solid #222;
  max-width: 350px;
  margin: 35px auto;
  font-family: 'Roboto', sans-serif !important;
  p.subtle {
    color: #555;
    font-style: italic;
    font-family: 'Roboto', sans-serif !important;
  }
  h4 {
    font-weight: 300 !important;
    font-size: 1.1em;
    font-family: 'Roboto', sans-serif !important;
  }
  p {
    font-family: 'Roboto', sans-serif !important;
    font-size: 0.9em;
    b {
      text-transform: uppercase;
      text-decoration: underline;
    }
  }
}
      </style>


@endsection



@section('scripts-below')
<script src="{{asset('assets/vendors/js/extensions/sweetalert.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/vendors/js/extensions/jquery.steps.min.js')}}"></script>
<script src="{{asset('assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/scripts/forms/wizard-steps.js')}}"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> --}}
<script type="text/javascript">

// Show form
var form = $(".steps-validation").show();

$(".steps-validation").steps({
    headerTag: "h6",
    bodyTag: "fieldset",
    transitionEffect: "fade",
    titleTemplate: '<span class="step">#index#</span> #title#',
    labels: {
        finish: 'Submit'
    },
    onStepChanging: function (event, currentIndex, newIndex)
    {
        // Allways allow previous action even if the current form is not valid!
        if (currentIndex > newIndex)
        {
            return true;
        }
        // Forbid next action on "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age-2").val()) < 18)
        {
            return false;
        }
        // Needed in some cases if the user went back (clean up)
        if (currentIndex < newIndex)
        {
            // To remove error styles
            form.find(".body:eq(" + newIndex + ") label.error").remove();
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
        }
        form.validate().settings.ignore = ":disabled,:hidden";
        return form.valid();
    },
    onFinishing: function (event, currentIndex)
    {
        form.validate().settings.ignore = ":disabled";
        return form.valid();
    },
    onFinished: function (event, currentIndex)
    {
      var agree = $('input[name="agree"]:checked').val();
      if(agree==1 | agree=='1'){
      
        $("#loadMe").modal({
      backdrop: "static", //remove ability to close modal with click
      keyboard: false, //remove option to close with keyboard
      show: true //Display loader!
    });
   
    var fd = new FormData();
    var files = $('#passport')[0].files[0];
    fd.append('passport',files);
    fd.append('_token', "{{Session::token()}}")

    $.ajax({
        url: '{{url('/new-applicant')}}',
        type: 'POST',
        data: new FormData($("#applicantForm")[0]),
        contentType: false,
        processData: false,
        success: function(response){
            $("#loadMe").modal("hide");
            console.log(response)
            if(response.status =='success'){
                $("#loadMe").modal("hide");
                swal("Success",response.message,'success'); 
                setTimeout(function(){
                    window.location.reload(true);
                },1000)
            }else{
                $("#loadMe").modal("hide");
                swal("Error",'Sorry.. Application Not Sent.'+response.message,'error');
            }
        },
        error: function(){
            $("#loadMe").modal("hide");
            swal("Error",'Sorry.. Applicantion Could Not be sent. Please try again','error');
        }
    });

}else{
    swal("Info",'Applicant Must Agree to Terms','info');
}

    }
})


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#photo').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#passport").change(function(){
    readURL(this);
});



;
</script>


<script>
// $(document).ready(function() {
//   $("#just_load_please").on("click", function(e) {
//     e.preventDefault();
//     $("#loadMe").modal({
//       backdrop: "static", //remove ability to close modal with click
//       keyboard: false, //remove option to close with keyboard
//       show: true //Display loader!
//     });
//     setTimeout(function() {
//       $("#loadMe").modal("hide");
//     }, 3500);
//   });
//   //ajax code here (example for $.post) using test page from https://reqres.in
//   //Adding a delay so we can see the functionality of the loader while request processes
//   $("#load_me_baby").on("click", function(e) {
//     e.preventDefault();
   
//   });
// });

</script>

@endsection