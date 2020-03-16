<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 
    <style>
        body {
            /* position: fixed; */
            width: 100%;
            height: 100%;
            /* z-index: 99999; */
            background: url('{{asset('assets/images/approved.jpg')}}') center center no-repeat;
            /* pointer-events: none; */
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
    <title>Applicant PDF</title>
</head>

<body>

    {{-- <div class="container"> --}}
    {{-- <div class="row">
                <img class="mx-auto d-block" src="{{asset('assets/images/logo.jpeg')}}" />
    <br />
    </div> --}}
    {{-- <div class="row"> --}}

     {{-- <div class="imagehead col-md-offset-3">
            <img  style="height: 100px; width: 110px;" src="{{asset('assets/images/ghana.png')}}"/>
     </div>
     <br/> --}}

    
    <div class="heading">
       
        <h4 align="center" style="text-transform:uppercase;">{{$applicant->district}} ASSEMBLY</h4>
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


        <div class="info1"
            <?php
                $disabilities = json_decode($applicant->disabilitytype);
                ?>
            @foreach($disabilities as $key=>$d)
            <p><strong>{{$key}}: </strong><span style="text-transform:uppercase">{{$d}}</span></p>
            @endforeach

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

    <br />
    <legend style="text-transform:uppercase">SOCIAL INSTITUTION</legend>
    <hr />
    <div class="contain">


        <div class="info1">
            <p><strong>Applicant Occupation: </strong><span style="text-transform:uppercase">{{$applicant->occupation}}</span></p>
            <p><strong>Years in Business: </strong><span style="text-transform:uppercase">{{$applicant->yearsinbsuiness}}</span></p>
            <p><strong>Number Of Dependants: </strong><span style="text-transform:uppercase">{{$applicant->dependants}}</span></p>
        </div>
        <br />
        {{-- <hr> --}}
    </div>

    
    <br />
    <legend style="text-transform:uppercase">AREAS APPLICANT INTENT TO USE FUND</legend>
    <hr />
    <div class="contain">


        <div class="info1"
            <?php
                $objectives = json_decode($applicant->objective);
                ?>
            @foreach($objectives as $key=>$ob)
            <p><strong>#-{{$key+1}}: </strong><span style="text-transform:uppercase">{{$ob}}</span></p>
            @endforeach

        </div>
        <br />
        {{-- <hr> --}}
    </div>

    <br />
    <legend style="text-transform:uppercase">TOTAL AMOUNT</legend>
    <hr />
    <div class="contain">


        <div class="info1">
            <p><strong>Total Amount Requested: </strong><span style="text-transform:uppercase">{{$applicant->total_amount}}</span></p>
            
        </div>
        <br />
        {{-- <hr> --}}
    </div>

    <div class="table-responsive">
        <table id="recent-orders" class="table table-bordered table-hover mb-0 ps-container ps-theme-default">
            <thead>
                <tr>
                    <th>ITEM</th>
                    <th>QUANTITY</th>
                    <th>UNIT COST</th>
                    <th>TOTAL EST. COST</th>
                </tr>
            </thead>

            <?php 
               $total = 0;
               $breakdowns = json_decode($applicant->breakdown);
            ?>
            <tbody>
                @foreach($breakdowns as $a)
                <?php $total += (int)$a->totalcost?>
                <tr>
                <td class="text-truncate">{{$a->item}}</td>
                <td class="text-truncate">{{$a->qty}}</td>
                <td class="text-truncate">GHC {{$a->unitcost}}</td>
                <td class="text-truncate">GHC {{$a->totalcost}}</td>
                
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

    <br />
    <legend>APPROVAL OFFICERS</legend>
    <hr />
    <div class="testcon" >
        @if($admins[0] == null)
        <p><strong>Official #1:
            {{-- <button class="" type="submit">
                <i class="fas fa-check-circle"></i>
            </button>  --}}
            </strong><span style="text-transform:uppercase">NOT APPROVED</span></p>
        @else
        <p><strong>Official #1:
            {{-- <button class="" style="background-color: green;" type="submit">
                <i class="fas fa-check-circle"></i>
            </button> --}}
        </strong><span style="text-transform:uppercase">
            {{$admins[0]->name}}</span></p>
       
        @endif
           
            {{-- <p><strong>Official #2: </strong><span style="text-transform:uppercase">{{$admins[1] != null?$admins[1]->name:'NOT APPROVED'}}</span></p>
            <p><strong>Official #3: </strong><span style="text-transform:uppercase">{{$admins[2] != null?$admins[2]->name:'NOT APPROVED'}}</span></p> --}}
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