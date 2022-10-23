@extends('admin.index') 
 @section('content')

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- bar chart -->
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <!-- org chart -->

 <div class="container-fluid px-4">
                        <h1 class="mt-4">27 Shaptak Square</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Level 1-3</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="level_1">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Level 4-6</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="level_2">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Level 7-9</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="level_3">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Level 10-12</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="level_4">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                 
                      
              
            
                           
     
 
 
    
                             
                     
                         
</br>
</br>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Customer Overview
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <th>Meter</th>
                                            <th>Flat</th>
                              
                                            <th>Customer Name</th>
                                   
                                            <th>Service fee</th>
                                            <th>Pre vious Due</th>
                                          
                                         
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Meter No</th>
                                            <th>Flat</th>
                              
                                            <th>Customer Name</th>
                                            <th>Address</th> 
                                            <th>Service Charge</th>
                                            <th>Previous Dues for DPDC</th>
                                            <th>Previous Dues for DG</th>
                                            <th>Previous Dues for Service Charge</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($emu as $dept)
        <tr>
        <td>{{ $dept->CODE }}</td>
        
        
        
        <td>{{ $dept->flat}}</td>
          <td>{{ $dept->name}}</td>
     
          <td>{{ $dept->service}}</td>
         
 
          <td>{{ $dept->previous}}</td>


  </tr>
      
@endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
@endsection
