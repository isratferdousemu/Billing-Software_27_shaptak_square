@extends('admin.index')
@section('content')
<center>

<h5 class="text-center"> Edit Service Charge & Unit rate</h5>
<body style="background-color:#E0E0E0;position:absolute;">
        <form method="POST" action="{{ route('resetupdate') }}">
        @csrf
      
       
      
      
       
        <div class="row g-3 align-items-center">

  <div class="col-auto">
  <label for="inputPassword6" class="col-form-label">DPDC Unit Rate</label>
  </div>
  <div class="col-auto">
  <input type="text"  name="unit" value="{{ $data1}}"  class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
  <label  class="col-form-label">DG Total Cost</label>
  </div>
  <div class="col-auto">
  <input type="text"  name="emu" value="{{ $data}}"  class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
  <button type="submit" class="btn btn-primary">Update</button>
  </div>
</div>
                   

                    

            
        </form>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    </center>
@endif
</body>
@endsection