@extends('admin.index')
@section('content')


<h5 class="text-center"> Edit Customer Information</h5></br>
<h6 class="text-center"> Meter No.{{ $config_id }}</h6></br>



<body style="background-color:#E0E0E0;position:fixed;">
        <form method="POST" action="{{ route('customerupdate') }}">
        @csrf
      
                 
        <div class="row g-3 align-items-center">

<div class="col-auto">
<label for="inputPassword6" class="col-form-label">Customer Name</label>
</div>
<div class="col-auto">
<input type="text"  name="config_value" value="{{ $data->name}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<label for="inputPassword6" class="col-form-label">Previous Dues for DPDC</label>
</div>
<div class="col-auto" class="form-control" aria-describedby="passwordHelpInline">
<input type="text"  name="previous" value="{{ $data->previous}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<label for="inputPassword6" class="col-form-label">Service fee</label>
</div>
<div class="col-auto">
<input type="text"  name="service" value="{{ $data->service}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
        <input type="hidden"  name="config_id" value="{{ $config_id }}"  >
       
 







 
  

                   

                    

            
        </form>
 
      
       
      
      
 
       
</body>
 
 @endsection