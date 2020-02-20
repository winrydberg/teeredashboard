@extends('admin.layout.base')
@section('styles-below')
<link rel="stylesheet" type="text/css" href="{{asset('assets/vendors/css/extensions/sweetalert.css')}}">
@endsection
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
                    <h4 class="card-title">SEND SMS</h4>
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
                         <div class="col-md-8">
                                <form class="form form-horizontal" method="POST" action="{{url('/packer/addproduct')}}" id="addproductform">
                                    {{csrf_field()}}
                                    <div class="form-body">
                                           
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="farmname">Amount Released</label>
                                            <div class="col-md-9">
                                                <input type="number" id="farmname" class="form-control" name="amount">
                                            </div>
                                        </div>
        
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="farmlocation">Date Released</label>
                                                <div class="col-md-9">
                                                    <input type="date" id="farmlocation" class="form-control" name="date">
                                                </div>
                                        </div>
        
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="farmlocation">Receipient Bank Account</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="farmlocation" class="form-control" name="productvariety">
                                                </div>
                                        </div>
        
                                        <div class="form-group row">
                                                <label class="col-md-3 label-control" for="farmlocation">Scan Copy of Receipt</label>
                                                <div class="col-md-9">
                                                    <input type="file" id="farmlocation" class="form-control" name="scancopy">
                                                </div>
                                        </div>
        
                                      
                                                                    
                                        
                                    </div>
        
                                    <div class="form-actions center">
                                        <button type="reset" class="btn btn-warning mr-1">
                                            <i class="ft-x"></i> Cancel
                                        </button>
                                        <button type="submit" class="btn btn-primary submit">
                                            <i class="fa fa-check-square-o"></i> Save Info
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
  
@endsection