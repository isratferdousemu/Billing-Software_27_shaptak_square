@extends('admin.index')
@section('content')


<h5 class="text-center"> Edit Shop Information</h5></br>




<body style="background-color:#E0E0E0;position:fixed;">
        <form method="POST" action="{{ route('shopupdate') }}">
        @csrf
        <input type="hidden"  name="id" value="{{ $id }}"  >
                 
        <div class="row g-3 align-items-center">

<div class="col-auto">
<label for="inputPassword6" class="col-form-label"> Name</label>
</div>
<div class="col-auto">
<input type="text"  name="name" value="{{ $shops}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<label for="inputPassword6" class="col-form-label">DG Charge</label>
</div>
<div class="col-auto" class="form-control" aria-describedby="passwordHelpInline">
<input type="text"  name="dg" value="{{ $dg}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<label for="inputPassword6" class="col-form-label">Service fee</label>
</div>
<div class="col-auto">
<input type="text"  name="service" value="{{ $service}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<label for="inputPassword6" class="col-form-label">DPDC Unit</label>
</div>
<div class="col-auto">
<input type="text"  name="dpdc" value="{{ $dpdc}}"  class="form-control" aria-describedby="passwordHelpInline">
</div>
<div class="col-auto">
<button type="submit" class="btn btn-primary">Update</button>
</div>
</div>
        
       
 







 
  

                   

                    

            
        </form>
 
      
       
      
      
 
       
</body>
 
 @endsection