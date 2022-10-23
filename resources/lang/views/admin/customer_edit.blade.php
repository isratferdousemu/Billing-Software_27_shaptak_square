@extends('admin.index')
@section('content')

<h5 class="text-center"> Edit Customer Information</h5>
<body style="background-color:#E0E0E0;position:absolute;">
        <form method="POST" action="{{ route('customerupdate') }}">
        @csrf
      
               
      
        <input type="hidden"  name="config_id" value="{{ $config_id }}"  >
        <div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Customer Name</label>
  </div>
  <div class="col-auto">
   <input type="text"  name="config_value" value="{{ $data->CONFIG_VALUE}}"  class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
  <label for="inputPassword6" class="col-form-label">Unit</label>
  </div>
  <div class="col-auto">
  <input type="text"  name="explanation" value="{{ $data->EXPLANATION}}"  class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
  <button type="submit" class="btn btn-primary">Update</button>
  </div>
</div>
                   

                    

            
        </form>
</body>
 
 @endsection