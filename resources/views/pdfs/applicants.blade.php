<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  --}}
    <style>
        body {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 99999;
            background: url('{{asset('assets/images/logo.jpeg')}}') center center no-repeat;
            pointer-events: none;
        }
        .mainContainer {
            display: flex;
            flex-direction: column;
        }

        .contain {
            display: flex;
            flex-direction: row;
        }


        .info1 {
            flex: 5;
            /* float: left; */

            /* margin-left: 20px; */


        }

        .image {
            flex: 1;
            float: right;
            /* float: right;
    flex-shrink: inherit; */
            /* background-color:yellow; */
        }
    </style>
    <title>Hello, world!</title>
</head>

<body>

    {{-- <div class="container"> --}}
    {{-- <div class="row">
                <img class="mx-auto d-block" src="{{asset('assets/images/logo.jpeg')}}" />
    <br />
    </div> --}}
    {{-- <div class="row"> --}}


    <div class="col-md-12">
        <h4 align="center">BOLGATANGA MUNICIPAL ASSEMBLY</h4>
        <h4 align="center">DISTRICT ASSSEMBLY COMMON FUND FOR PERSONS LIVING WITH DISABILITY</h4>
    </div>
    {{-- </div> --}}

    <br />
    <br />
    <legend style="text-transform:uppercase">Personal Information</legend>
    <hr />
    <div class="contain">

        <div class="info1">

            <p><strong>First Name: </strong><span style="text-transform:uppercase">{{$applicant->firstname}}</span></p>
            <p><strong>Last Name: </strong><span style="text-transform:uppercase">{{$applicant->lastname}}</span></p>
            <p><strong>Gender: </strong><span style="text-transform:uppercase">{{$applicant->gender}}</span></p>
            <p><strong>Date Of Birth: </strong><span
                    style="text-transform:uppercase">{{date('d-m-Y', strtotime($applicant->dob))}}</span></p>
            {{-- <div class="" style="display:flex; flex-direction:row;"> --}}
            <p><strong>ID Type: </strong><span style="text-transform:uppercase">{{$applicant->idtype}}</span></p>
            <p><strong>ID Number: </strong><span style="text-transform:uppercase">{{$applicant->idnumber}}</span></p>
            {{-- </div> --}}

            <p><strong>Are You GFD Member: </strong><span
                    style="text-transform:uppercase">{{$applicant->gfdmember}}</span></p>

        </div>
        <br />

        <div class="image">
            <img style="height: 150px; width: 150px;" src="{{asset('uploads/'.$applicant->image)}}"
                class="img-fluid img-thumbnail" />
        </div>

    </div>

    <br />
    <legend style="text-transform:uppercase">Type Of Disability</legend>
    <hr />
    <div class="contain">


        <div class="info1">

            <p><strong>First Name: </strong><span style="text-transform:uppercase">{{$applicant->firstname}}</span></p>
            <p><strong>Last Name: </strong><span style="text-transform:uppercase">{{$applicant->lastname}}</span></p>
            <p><strong>Gender: </strong><span style="text-transform:uppercase">{{$applicant->gender}}</span></p>
            <p><strong>Date Of Birth: </strong><span
                    style="text-transform:uppercase">{{date('d-m-Y', strtotime($applicant->dob))}}</span></p>

        </div>
        <br />
        {{-- <hr> --}}
    </div>

    <br />
    <legend style="text-transform:uppercase">Contact Details</legend>
    <hr />
    <div class="contain">


        <div class="info1">

            <p><strong>Community: </strong><span style="text-transform:uppercase">{{$applicant->community}}</span></p>
            <p><strong>Applicant House No: </strong><span style="text-transform:uppercase">{{$applicant->houseno}}</span></p>
            <p><strong>Applicant Street Name: </strong><span style="text-transform:uppercase">{{$applicant->streetname}}</span></p>
            <p><strong>Applicant Postal Address: </strong><span style="text-transform:uppercase">{{$applicant->postal_address}}</span></p>
            <p><strong>Applicant Contact No: </strong><span style="text-transform:uppercase">{{$applicant->phoneno}}</span></p>
            <p><strong>Applicant Business Location(If Applicable): </strong><span style="text-transform:uppercase">{{$applicant->business_location}}</span></p>

        </div>
        <br />
        {{-- <hr> --}}
    </div>

    <br />
    <legend>EDUCATION - HIGHEST LEVEL</legend>
    <hr />
    <div class="contain">


        <div class="info1">

            <p><strong>Education: </strong><span style="text-transform:uppercase">{{$applicant->education}}</span></p>
         

        </div>
        <br />
        {{-- <hr> --}}
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>