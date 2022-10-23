@extends('admin.index')
@section('content')
<main>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;

  margin-left: 80px;

  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.container {
 
  font-size: 24px;
  margin-top: 100px;
  margin-left: 420px;
  margin-right: 100px;
  width: 350px;
  height: 200px;

}
p {
  /* Center horizontally*/
  text-align: center;
}
</style>
<h5 class="text-center"> Bill Generation</h5>

<body style="background-color:#E0E0E0;position:fixed;">
        <form method="POST" action="{{ route('bill_create') }}">
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
  <input type="date" data-date-format="DD MMMM YYYY"  name="date2"  class="form-control" aria-describedby="passwordHelpInline">
  </div>

  
  
 
   <div class="col-auto">
  <button type="submit" value="All_bill" id="showDiv" name="action"  class="btn btn-primary">Bill for Commercial Area </button>
  </div>

  <div class="col-auto">
  <button type="submit" value="shop_bill" id="showDiv_1" name="action"  class="btn btn-primary">Bill for Shops </button>
  </div>
  
</div>
                   


                    

            
        </form>
        <DIV ID="SectionName" STYLE="display:none" class="container">
						<p>Please Wait... Bill is Generating</p>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="loader center"></div>
					</DIV>
<script>
  document.getElementById('showDiv').onclick=function(){
  // Remove any element-specific value, falling back to stylesheets
  document.getElementById('SectionName').style.display='';
  document.getElementById('emu').style.display='none';
};
  </script>
  <script>
  document.getElementById('showDiv_1').onclick=function(){
  // Remove any element-specific value, falling back to stylesheets
  document.getElementById('SectionName').style.display='';
  document.getElementById('emu').style.display='none';
};
  </script>
  </br>
  </br>
  </br>
  <div class="alert alert-danger {{$emu == '0' ? 'invisible' : ''}}" id="emu" >
        <strong>Can't Generate Current Month Bill</strong> 
    </div>  

</body>
 <main>
 @endsection