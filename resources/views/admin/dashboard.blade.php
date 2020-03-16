@extends('admin.layout.base')
@section('content')
<div class="row">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-content">
            <img class="card-img-top img-fluid" style="height: 60px;object-fit:cover;" src="{{asset('assets/images/carousel/02.jpg')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">HELLO EDWIN,<br/> 
                        @if(Session::has('portal'))
                    <strong class="alert alert-success">{{Session::get('portal')}}</strong>
                    @endif
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">

        

        <div class="col-xl-4 col-lg-4 col-12">
                <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left">
                                       
                                        <span> <h5>TOTAL APPROVALS</h5></span>
                                    <h3 class="info">{{$approvedCount}}</h3>
                                        
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="ft-users info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-12">
            <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body text-left">
                                   
                                    <span> <h5>PENDING APPROVAL</h5></span>
                                <h3 class="danger">{{$unapprovedCount}}</h3>
                                    
                                </div>
                                <div class="media-right media-middle">
                                    <i class="ft-users danger font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
         
        <div class="col-xl-4 col-lg-4 col-12">
                <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body text-left">
                                            <h5>NEW APPLICATIONS</h5>
                                    </div>
                                    <div class="media-right media-middle">
                                        <i class="ft-user-plus success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                {{-- <div class="progress mt-1 mb-0" style="height: 7px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div> --}}
                            <a href="{{url('/new-applicant')}}"  class="btn btn-success btn-block btn-md"> <i class="ft-plus-circle"></i>NEW APPLICATION</a>
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
                    <h4 class="card-title">DISTRICT APPROVAL PIE CHART -  {{$district->name}}</h4>
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

{{-- <section id="chartjs-bar-charts">
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
</section> --}}



@endsection

@section('scripts-below')
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
/*=========================================================================================
    File Name: pie.js
    Description: Chartjs pie chart
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Version: 2.1
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

// Pie chart
// ------------------------------
$(window).on("load", function(){

//Get the context of the Chart canvas element we want to select
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
        data: [<?php echo json_encode($pieApproved);?>, <?php echo json_encode($pieUnApproved);?>, <?php echo json_encode($pieDisApproved); ?>],
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
});
</script>

<script>
    /*=========================================================================================
    File Name: bar.js
    Description: Chartjs bar chart
    ----------------------------------------------------------------------------------------
    Item Name: Stack - Responsive Admin Theme
    Version: 2.1
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/






// // Bar chart
// // ------------------------------
// $(window).on("load", function(){

// //Get the context of the Chart canvas element we want to select
// var ctx = $("#bar-chart");

// // Chart Options
// var chartOptions = {
//     // Elements options apply to all of the options unless overridden in a dataset
//     // In this case, we are setting the border of each horizontal bar to be 2px wide and green
//     elements: {
//         rectangle: {
//             borderWidth: 2,
//             borderColor: 'rgb(0, 255, 0)',
//             borderSkipped: 'left'
//         }
//     },
//     responsive: true,
//     maintainAspectRatio: false,
//     responsiveAnimationDuration:500,
//     legend: {
//         position: 'top',
//     },
//     scales: {
//         xAxes: [{
//             display: true,
//             gridLines: {
//                 color: "#f3f3f3",
//                 drawTicks: false,
//             },
//             scaleLabel: {
//                 display: true,
//             }
//         }],
//         yAxes: [{
//             display: true,
//             gridLines: {
//                 color: "#f3f3f3",
//                 drawTicks: false,
//             },
//             scaleLabel: {
//                 display: true,
//             }
//         }]
//     },
//     title: {
//         display: false,
//         text: 'Chart.js Horizontal Bar Chart'
//     }
// };

// // Chart Data
// var chartData = {
//     labels: <?php echo json_encode($thedistricts); ?>,
//     datasets: [{
//         label: "Approved Applicants",
//         data: <?php echo json_encode($thedistrictsApprouvedCount); ?>,
//         backgroundColor: "#16D39A",
//         hoverBackgroundColor: "rgba(22,211,154,.9)",
//         borderColor: "transparent"
//     }, {
//         label: "Unapproved /Pending Approval Applicants",
//         data: <?php echo json_encode($thedistrictsUnApprovedCount); ?>,
//         backgroundColor: "#F98E76",
//         hoverBackgroundColor: "rgba(249,142,118,.9)",
//         borderColor: "transparent"
//     }]
// };

// var config = {
//     type: 'horizontalBar',
//     // type: 'verticalBar',


//     // Chart Options
//     options : chartOptions,

//     data : chartData
// };

// // Create the chart
// var lineChart = new Chart(ctx, config);
// });
</script>
<!-- END PAGE LEVEL JS-->
@stop