@extends('admin.layout.base')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">GENERATE QUARTERLY REPORT</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <div class="card-block"> --}}
                    <form method="POST" id="quarterlyForm">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="adminlevel">START DATE</label>
                                       <input type="date" required class="form-control" name="startdate"/>                                        
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="adminlevel">END DATE</label>
                                       <input type="date" required class="form-control" name="enddate"/>                                        
                                    </div>
                                </div>

                                {{-- <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="adminlevel">YEAR</label>
                                        <select required name="year" id="year" class="select2 form-control block"
                                            style="width: 100%">
                                            <option value="" selected="" disabled="">Select Year</option>

                                            

                                        </select>
                                    </div>
                                </div> --}}


                                @role('Super Admin')
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="adminlevel">DISTRICT</label>
                                        <select required name="district" class="select2 form-control block"
                                            style="width: 100%">
                                            <option value="" selected="" disabled="">Select District</option>

                                            @foreach($districts as $d)
                                            <option value="{{$d->id}}">{{$d->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @else
                             
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="adminlevel">DISTRICT</label>
                                        <select required name="district" class="select2 form-control block"
                                            style="width: 100%">
                                            <option value="" selected="" disabled="">Select District</option>

                                            @foreach($districts as $d)
                                            <option {{$district->name !=$d->name?'disabled="disabled"':''}} {{$district->name ==$d->name?'selected="selected"':''}} value="{{$d->id}}">{{$d->name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                @endrole
                            </div>
                        </fieldset>
                        <div class="row">
                           <div class="col-md-4">
                               <button type="submit"  class="btn btn-primary btn-block">GENERATE REPORT</button>
                           </div>
                           {{-- <div class="col-md-4">
                            <button type="button"  class="btn btn-warning btn-block">EXPORT IN EXCEL</button>
                        </div> --}}
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>



<section id="chartjs-pie-charts">
    <div class="row">
    <?php $district = App\District::where('id',Auth::guard('admin')->user()->district_id)->first(); ?>

        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">DISTRICT APPROVAL PIE CHART <span id="dis"></span></h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                        <div class="height-400">
                            <canvas id="simple-pie-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@if(isset($applicants))
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">SEARCH RESULTS</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                @if(count($applicants)>0)
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>

                                <th>PHONE NO</th>
                                <th>APPROVAL STATUS</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applicants as $a)
                            <tr>
                                <td class="text-truncate">TEERE0{{$a->id}}</td>
                                <td class="text-truncate">{{$a->firstname.' '.$a->lastname}}</td>
                                {{-- <td class="text-truncate">{{$a->}}</td> --}}

                                <td class="text-truncate">{{$a->phoneno}}</td>

                                <td class="text-truncate">
                                    @if($a->approved ==1)
                                    <button class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i>
                                        APPROVED</button>
                                    @else
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fa fa-remove"></i>
                                        NOT APPROVED</button>
                                    @endif
                                </td>
                                <td class="text-truncate">
                                    {{-- <a href="{{url('/applicant-details/teere00'.$a->id)}}" class="btn
                                    btn-success">VIEW DETAILS</a> --}}
                                    <a href="{{url('/applicant-details/teere00'.$a->id)}}" class="btn btn-success">VIEW
                                        DETAILS</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <p class="alert alert-danger">No Records Found.</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endif

@stop

@section('scripts-below')
<script>
    var startyear =2020;
    var endyear = 2050
    for(var i=0; i<(2050-2020); i++){
        $('#year').append($('<option/>', { 
                                value: startyear+i,
                                text : startyear+i
                            }));
    }
           
</script>



<script src="{{asset('assets/vendors/js/charts/chart.min.js')}}"></script>
{{-- <script src="{{asset('assets/js/scripts/charts/chartjs/pie-doughnut/pie.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/scripts/charts/chartjs/pie-doughnut/pie-simple.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/scripts/charts/chartjs/bar/bar.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/scripts/charts/chartjs/bar/bar-stacked.js')}}"></script>
<script src="{{asset('assets/js/scripts/charts/chartjs/bar/bar-multi-axis.js')}}"></script>
<script src="{{asset('assets/js/scripts/charts/chartjs/bar/column.js')}}"></script>
<script src="{{asset('assets/js/scripts/charts/chartjs/bar/column-stacked.js')}}"></script>
<script src="{{asset('assets/js/scripts/charts/chartjs/bar/column-multi-axis.js')}}"></script> --}}

<script>



    $('#quarterlyForm').submit(function(event){
            event.preventDefault();

            $.ajax({
                url: "{{url('/quarterly-report')}}",
                type: "POST",
                data: new FormData($('#quarterlyForm')[0]), 
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.status == 'success'){
                        $('#dis').text(response.district.name);
                        var ctx = $("#simple-pie-chart");

                        // Chart Options
                        var chartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            responsiveAnimationDuration:500,
                        };

                        // Chart Data
                        var chartData = {
                            labels: ["Approved", "Pending Approval", "Disapproved"],
                            datasets: [{
                                label: "Approval PIE Chart",
                                data: [response.approved, response.pending, response.disapproved],
                                backgroundColor: ['#00A5A8', '#626E82', '#FF7D4D','#FF4558', '#16D39A'],
                            }]
                        };

                        var config = {
                            type: 'pie',

                            // Chart Options
                            options : chartOptions,

                            data : chartData
                        };

                        // Create the chart
                        var pieSimpleChart = new Chart(ctx, config);
                    }else{
                            alert('Oops Something went wrong. Please try again')
                    }
                },
                error: function(error){
                     console.log(error)
                }
            })
    });

// Pie chart
// ------------------------------
$(window).on("load", function(){

//Get the context of the Chart canvas element we want to select

});


</script>





@stop