@extends('admin.index')
@section('content')

<div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Shop Overview
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                        <tr>
                                     
                                     <th>Flat</th>
                       
                                     <th> Name</th>
                                    
                              
                                
                                     <th>Meter No</th>
                                  
                                     <th>Service Charge</th>
                                     <th>DG Charge in BDT</th>
                                     <th>DPDC Unit</th>
                                     <th>Action</th> 
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                     
                                            <th>Flat</th>
                              
                                            <th> Name</th>
                                           
                                     
                                       
                                            <th>Meter No</th>
                                         
                                            <th>Service Charge</th>
                                            <th>DG in BDT</th>
                                            <th>DPDC Unit</th>
                                            <th>Action</th> 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach ($shops as $dept)
        <tr>
        
        
        
        
        <td>{{ $dept->meter}}</td>
          <td>{{ $dept->name}}</td>
         
          <td>{{ $dept->shop_no}}</td>
         
 
          <td>{{ $dept->service_fee}}</td>
          <td>{{ $dept->DG}}</td>
          <td>{{ $dept->DPDC}}</td>
          <td> 

<a class="btn btn-success btn-sm rounded-0 list-inline-item" type="button" data-toggle="tooltip" title="Edit" href = "shop/{{ $dept->ID }}"><i class="fa fa-edit"></i></a>


</td>

  </tr>
      
@endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endsection