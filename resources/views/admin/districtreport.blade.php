@extends('admin.layout.base')
@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">DISTRICT REPORT</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    {{-- <div class="card-block"> --}}
                    <form method="POST" id="districtForm">
                        {{csrf_field()}}
                        <fieldset>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adminlevel">START DATE</label>
                                       <input type="date" required class="form-control" name="startdate"/>                                        
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adminlevel">END DATE</label>
                                       <input type="date" required class="form-control" name="enddate"/>                                        
                                    </div>
                                </div>

                   
                            </div>
                        </fieldset>
                        <div class="row">
                           <div class="col-md-6">
                               <button type="submit"  class="btn btn-primary btn-block">GENERATE REPORT</button>
                           </div>
                        
                        </div>
                    </form>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>



<section id="chartjs-bar-charts">
    <!-- Bar Chart -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">OVERALL APPLICANT BAR CHART</h4>
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
                            <canvas id="bar-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="chartjs-pie-charts">
    <div class="row">
   
        <!-- Simple Pie Chart -->
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                <h4 class="card-title">DISTRICT DISBURSEMENT CHART <span id="dis"></span></h4>
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



    $('#districtForm').submit(function(event){
            event.preventDefault();

            $.ajax({
                url: "{{url('/district-report')}}",
                type: "POST",
                data: new FormData($('#districtForm')[0]), 
                processData: false,
                contentType: false,
                success: function(response){
                    if(response.status == 'success'){
                   
                        //Get the context of the Chart canvas element we want to select
                        var ctx = $("#bar-chart");

                        // Chart Options
                        var chartOptions = {
                            // Elements options apply to all of the options unless overridden in a dataset
                            // In this case, we are setting the border of each horizontal bar to be 2px wide and green
                            elements: {
                                rectangle: {
                                    borderWidth: 2,
                                    borderColor: 'rgb(0, 255, 0)',
                                    borderSkipped: 'left'
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false,
                            responsiveAnimationDuration:500,
                            legend: {
                                position: 'top',
                            },
                            scales: {
                                xAxes: [{
                                    display: true,
                                    gridLines: {
                                        color: "#f3f3f3",
                                        drawTicks: false,
                                    },
                                    scaleLabel: {
                                        display: true,
                                    }
                                }],
                                yAxes: [{
                                    display: true,
                                    gridLines: {
                                        color: "#f3f3f3",
                                        drawTicks: false,
                                    },
                                    scaleLabel: {
                                        display: true,
                                    }
                                }]
                            },
                            title: {
                                display: false,
                                text: 'Chart.js Horizontal Bar Chart'
                            }
                        };

                        // Chart Data
                        var chartData = {
                            labels: response.districts,
                            datasets: [{
                                label: "Approved Applications",
                                data: response.approvedCount,
                                backgroundColor: "#16D39A",
                                hoverBackgroundColor: "rgba(22,211,154,.9)",
                                borderColor: "transparent"
                            }, {
                                label: "Rejected Applications",
                                data: response.rejectedCount,
                                backgroundColor: "#F98E76",
                                hoverBackgroundColor: "rgba(249,142,118,.9)",
                                borderColor: "transparent"
                            },{
                                label: "Disbursed Applications",
                                data: response.disbursed ,
                                backgroundColor: "#3474eb",
                                hoverBackgroundColor: "rgba(52, 116, 235,.9)",
                                borderColor: "transparent"
                            }]
                        };

                        var config = {
                            type: 'horizontalBar',
                            // type: 'verticalBar',


                            // Chart Options
                            options : chartOptions,

                            data : chartData
                        };

                        // Create the chart
                        var lineChart = new Chart(ctx, config);



                        //pie chart
                        var ctx = $("#simple-pie-chart");

                        // Chart Options
                        var chartOptions = {
                            responsive: true,
                            maintainAspectRatio: false,
                            responsiveAnimationDuration:500,
                        };

                        // Chart Data
                        var chartData = {
                            labels: response.districts,
                            datasets: [{
                                label: "Approval PIE Chart",
                                data: response.disbursedAmt,
                                backgroundColor: generateHex(response.districts.length),
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


<script>
    function generateHex(total){
        var hex = [];
        for(var i=0; i<total; i++){
           hex.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
        }
        return hex;

    }
</script>





@stop