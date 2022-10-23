<button id="printPageButton" onclick="history.back()"> Back</button>
<button id="printPageButton" onClick="window.print();">Print</button>

<style>
	img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
 body
    {

        margin: 0mm 15mm 10mm 0mm /* margin you want for the content */
    }
.border {
  border-top: 1px solid black;
  width:150px;
  display:inline-block;margin-right:350px;
}
.border1 {
  border-top: 1px solid black;
  width:150px;

  display:inline-block;
}

	</style>
@foreach ($emu as $dept)
	<div id="page-wrap">
</br>
</br>
</br>
</br>
		<h3 class="a">GENERATOR BILL</h3>
		<div class="a">(Customer's Copy)</div>
		<div class="a">Flat   {{ $dept->flat }}</div>
		
		<div id="identity">
		
      27 Shaptak Square</br>

Bill Number: {{ $dept->unique_id }}</br>
Zone/Block:{{ $dept->flat}}
            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/logo.jpg" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

     Name and Address: {{ $dept->name }}</br>
		{{ $dept->address }}
<div class="a">Meter Condition:Normal</div><div class="c">    C.T:Ratio:100/5
</br> Unit Rate:{{number_format($service/$unit,2)}}
</div>
		
	
		
		<table id="items">
		
		  <tr class="item-row">
		      <td>Billing Month:{{$month3}}</td>
		      <td colspan="3"style="text-align:center">Issue Date:{{$issue}}</td>
			  
		      <td colspan="1" style="text-align:right">Due Date:{{$newDate1}}</td>
	
		      
		  </tr >
		  <tr class="item-row">
		      <td  colspan="2">Previous Month Reading in KWH: {{ $dept->min }}</td>
			  <td colspan="3" style="text-align:right">Current Month's Reading in KWH:{{ $dept->max }}</td>
			
		      
	
		      
		  </tr>
		
		
		  <tr class="item-row">
		  <td>Common/Check Meter Use:</td>
			  <td>Unit:{{ $dept->value }}</td>
			  <td></td>
		
		      <td colspan="2">Amount(Taka):{{number_format($dept->value*$service/$unit,2) }}</td>
		  </tr>
		  
		  <tr>
		    <td colspan="2">Energy Charge(Peak and off Peak):</td>
			<td colspan="3">0</td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total Energy Charge</td>
		      <td class="total-value"><div id="subtotal">{{ number_format($dept->value*$service/$unit,2) }}</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Demand Charge</td>
		      <td class="total-value">0</td>
		  </tr>
		  <tr>
		  <td colspan="2" class="blank">  


<img  src="images/logo.jpg" alt="logo" />
</td>
		 
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value">{{ number_format($dept->value*$service/$unit,2) }}</td>
		  </tr>
		  <tr>
		  <td colspan="2" class="blank"> </td>
<td colspan="2" class="total-line">Previous due(With Late Payment Charge)</td>
@if($dept->vat>0)
<td class="total-value">{{number_format( ($dept->vat)+(($dept->value*$service/$unit)*5)/100,2) }}</td>
	  
	  @else
		<td class="total-value">{{number_format( ($dept->vat)+0,2) }}</td> 
	  
	  @endif
		  </tr>
		 
		
	
		  <tr>
		  <td colspan="2" class="blank"> </td>
<td colspan="2" class="total-line">Late Payment Charge</td>
@if($dept->vat>0)
<td class="total-value">{{number_format((($dept->value*$service/$unit)*5)/100 ,2)}}</td>
		  

@else
	<td class="total-value">0</td>

@endif
</tr>
		 
		
	
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total if paid after due date </td>
			  @if($dept->vat>0)
		      <td class="total-value balance">{{number_format(($dept->value*$service/$unit) +($dept->vat)+(($dept->value*$service/$unit)*5)/100,2) }}</td>
			  @else
				<td class="total-value balance">{{number_format(($dept->value*$service/$unit),2) }}</td>  
			  
			  @endif  
		  </tr>
		
		</table>
			</br>
</br>

@php
echo"In Word:";echo NumConvert::word( round( ($dept->value*$service/$unit) +($dept->vat)+(($dept->value*$service/$unit)*5)/100));

@endphp
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>



<div class="border">Technical Department </div><div class="border1">Accounts Department </div>


<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>





	
	</div>


        


      



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>DPDC BILL</title>
	
	<link rel='stylesheet' type='text/css' href='css/style1.css' />

	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	<style>
		.a {
  text-align: center;
}
.b {
  text-align: justify;
}
@media print {
  #printPageButton {
    display: none;
  }
  #printPageButton {
    display: none;
  }
  footer {page-break-after: always;}
}
@page {
    size: auto;

    
margin:0;

}
div.c {
  text-align: right;
} 	</style>

</head>

<body>


</html>@endforeach
