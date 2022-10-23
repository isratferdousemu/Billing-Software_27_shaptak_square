<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>BILL</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        @media print {
    a:after {
        content:" (" attr(href) ") ";
        color: $primary;
    }
}
        .emu {

margin-left: 2cm;
margin-right: 2cm;
font-size:14px;
margin-top: 2cm;
margin-bottom: 2cm;
font-family: Maiandra GD,Maiandra GD;
}
.emu2{
    border-top: 2px solid  black;
  border-bottom: 2px solid black;
  border-left: 2px solid black;
  border-right: 2px solid black;
  border-top: double;
  border-bottom: double;
  border-left: double;
  border-right: double;
}
.emu3{
    margin-left: 4.8cm;

    border-top: 2px solid  black;
  border-bottom: 2px solid black;
  border-left: 2px solid black;
  border-right: 2px solid black;
  border-top: double;
  border-bottom: double;
  border-left: double;
  border-right: double;
}
.emu4{
    margin-left: 0.001cm;
margin-right: 0.001cm;
  border-bottom: 1px solid black;
}
.emu6{
    margin-left: 0.001cm;
margin-right: 0.001cm;

}
.emu5{
   
  border-top: 2px solid black;
}
@media print {
  #printPageButton {
    display: none;
  }
  #printPageButton {
    display: none;
  }
}
@page {
    size: A4;
  margin: 0;

}
@media print {
  .emu {page-break-after: always;}
} 
        </style>
</head>
<button id="printPageButton" onclick="history.back()"> Back</button>
<button id="printPageButton" onClick="window.print();">Print</button>
<body>
@foreach ($emu as $dept)



<div class="emu">

<img  src="images/logo.png" alt="logo" width="160" height="50"/> 
<img style="float:right" src="images/logo_shsq_asso.png" alt="logo" width="250" height="50"/>
</br>
</br>
</br>

<div class="emu2">
<center><b style="font-size:20px;">BILLS & SERVICE CHARGES </br> (Customer's Copy)</b> </center>
<!-- emu2 end -->
</div> 
</br>
</br>
<div class="emu2">
<div class="row" >

<div class="col">
   <b> Billing Month  </b>
 
</div>
<div class="col">
<b> : </b>
     
</div>


<div class="col">
    
     
</div>
<div class="col">
<b>
{{$month3}}-2022 </b>  
</div>
<div class="col">
    
     
</div>
    <!-- row end -->
</div>
  <!-- new row -->
  <div class="row" >

<div class="col">
   <b> Issue Date  </b>
 
</div>
<div class="col">
<b> : </b>
     
</div>


<div class="col">
    
     
</div>
<div class="col">
<b>
{{$issue}}</b>  
</div>
<div class="col">
    
     
</div>
    <!--new row end -->
</div>
  <!-- new row -->
  <div class="row" >

<div class="col">
   <b> Due Date of Payment  </b>
 
</div>
<div class="col">
<b> : </b>
     
</div>


<div class="col">
    
     
</div>
<div class="col">
<b>
{{$newDate1}}</b>  
</div>
<div class="col">
    
     
</div>
    <!--new row end -->
</div>
    <!-- emu2 end -->
</div>
</br>
</br>
<div class="emu2">
<div class="row" >

<div class="col">
    Name  
 
</div>
<div class="col"> : 
     
</div>


<div class="col">
    
     
</div>
<div class="col">

{{$dept->name}}
</div>
<div class="col">
    
     
</div>
    <!-- row end -->
</div>
  <!-- new row -->
  <div class="row" >

<div class="col">
    Shop/Suite Number 
 
</div>
<div class="col">
<b> : </b>
     
</div>


<div class="col">
    
     
</div>
<div class="col">
{{$dept->flat}}
</div>
<div class="col">
    
     
</div>
    <!--new row end -->
</div>
  <!-- new row -->
  <div class="row" >

<div class="col">
    Meter Number  
 
</div>
<div class="col">
: 
     
</div>


<div class="col">
    
     
</div>
<div class="col">

{{$dept->CODE}}
</div>
<div class="col">
    
     
</div>
    <!--new row end -->
</div>
    <!-- emu2 end -->
    </div>
    
    </br>


</br>
<div class="emu2">

<div class="row" >

<div class="col">
    Meter Condition
 
</div>
<div class="col"> : 

</div>


<div class="col">
    
Normal  
</div>

<div class="col">
Previous reading DPDC

</div>
<div class="col">
{{ $dept->min_3 }}
     
</div>
    <!-- row end -->
</div>
  <!-- new row -->
  <div class="row" >

<div class="col">
DPDC Total Bill(Tk.) 
 
</div>
<div class="col">
<b> : </b>
     
</div>


<div class="col">
    @php echo round($dept->total_col_2) @endphp
</div>
<div class="col">
Present reading DPDC

</div>
<div class="col">
    
{{ $dept->max_3 }}
</div>
    <!--new row end -->
</div>
  <!-- new row -->
  <div class="row" >

<div class="col">
DG Total Cost(Tk.) 
 
</div>
<div class="col">
: 
     
</div>


<div class="col">
@php echo round($dept->total_col_3) @endphp
 
</div>
<div class="col">
Consumed Unit(KWH)
</div>
<div class="col">
    
    00000 
</div>
    <!--new row end -->
</div>
    <!-- emu2 end -->
    </div>
</br>

</br>
    <!-- emu 3 start --> 
    <div class="emu3">
<div class="row emu4">
  
    <div class="col">
    DPDC Charge
     
    </div>
    <div  style="text-align:right"class="col">
    @php echo round($dept->total_col_2) @endphp
    
    </div>
    <!-- row end -->
</div>
<div class="row emu4">
  
    <div class="col">
    DG Charge- Individual
    </div>
    <div  style="text-align:right"class="col">
    @php echo round($dept->total_col_3) @endphp

    </div>
    <!-- row end -->
</div>

<div class="row emu4">
  
    <div class="col">
   Service Charge
    </div>
    <div  style="text-align:right"class="col">
    @php echo round($dept->value) @endphp

    </div>
    <!-- row end -->
</div>
<div class="row emu4">
  
    <div class="col">
Previous Due
    </div>
    <div  style="text-align:right"class="col">
    @php echo round($dept->prev) @endphp

    </div>
    <!-- row end -->
</div>
<div class="row emu4">
  
    <div class="col">
 Total Bill(within due date)
    </div>
    <div  style="text-align:right"class="col">
    @php echo round($dept->total_col) @endphp

    </div>
    <!-- row end -->
</div>
<div class="row emu4">
  
    <div class="col">
Late Payment Charge
    </div>
    <div  style="text-align:right"class="col">
    @php echo round(($dept->total_col*5)/100) @endphp

    </div>
    <!-- row end -->
</div>
<div class="row emu6">
  
    <div class="col">
    Total(if payment after due date)
    </div>
    <div  style="text-align:right"class="col">
    @php echo round((( $dept->total_col*5)/100)+    ($dept->total_col)) @endphp

    </div>
    <!-- row end -->
    </div>
      <!-- emu 3 end -->

</div>

<br>
<br>
<br>
<br>


<div class="row ">
  
    <div  class="col  ">
<span class="emu5"> Prepared By</span>
    </div>
    <div  style="text-align:center" class="col ">
    <span class="emu5">   Facility manager</span>
    </div>
    

    <div  style="text-align:right"class="col ">
    <span class="emu5">   Authorized signature</span>
    </div>
    <!-- row end -->
    </div>
  

<!-- emu end -->
</div>




@endforeach


</body>
</html>