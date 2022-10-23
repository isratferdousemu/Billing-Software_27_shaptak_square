@extends('admin.index')
@section('content')

<h5 class="text-center"> Bill Generation</h5>

<body style="background-color:#E0E0E0;position:fixed;">
        <form method="POST" action="{{ route('bill_create_1') }}">
        @csrf
      
               
      
      
        <div class="row g-3 align-items-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">From Date</label>
  </div>
  <div class="col-auto">
   <input type="date"  name="date1"   class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
  <label for="inputPassword6" class="col-form-label">To date</label>
  </div>
  <div class="col-auto">
  <input type="date"  name="date2"  class="form-control" aria-describedby="passwordHelpInline">
  </div>

  
  <div class="col-auto">
  <label for="inputPassword6" class="col-form-label">Meter No</label>
  </div>
  <div class="col-auto">
  <input type="number"  name="meter"  class="form-control" aria-describedby="passwordHelpInline">
  </div>
  <div class="col-auto">
  <button  class="invisible" type="submit" value="All_bill" name="action"  class="btn btn-primary">All bill Generate</button>
  </div>
  <div class="col-auto">
  <button class="invisible" type="submit" value="single_bill" name="action"  class="btn btn-primary">Separate bill Generate</button>
  </div>
  <div class="col-auto">
  <button class="invisible" type="submit" value="single_bill" name="action"  class="btn btn-primary">Separate bill Generate</button>
  </div>
  
 
   <div class="col-auto">
  <button type="submit" value="All_bill" name="action"  class="btn btn-primary">All bill </button>
  </div>
  <div class="col-auto">
  <button type="submit" value="single_bill" name="action"  class="btn btn-primary">Separate bill </button>
  </div>
</div>
                   

                    

            
        </form>
</body>
 
 @endsection