<title>Service Charge {{$month3}}</title>
<button id="printPageButton" onclick="history.back()"> Back</button>
<button id="printPageButton" onClick="window.print();">Print</button>





<style>
  #inline{width:100%;height:auto;display:flex;} 
.one,.two{}
	img {
  display: block;
  margin-left: auto;
  margin-right: auto;
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

		<h3 class="a">SERVICE CHARGE</h3>
		<div class="a">(Customer's Copy)</div>
		<div class= "a">Flat   {{ $dept->flat }}</div>
		
		<div id="identity">
		
      27 Shaptak Square</br>

Bill Number:2022{{ $dept->ID }}</br>
Zone/Block:{{ $dept->flat }}
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
              <img id="image" src="images/logo.jpeg" alt="logo" width="150" height="80" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

     Name and Address: {{ $dept->name }}</br>
		{{ $dept->address }}
<div class="c">    Account Type:General
</br> Category(%):Domastic
</div>
		
	
		
		<table id="items">
		
		 
		<tr class="item-row">
		  <td >Billing Month: {{$month3}} </td>
			  <td  colspan="2" >Issue Date:{{$issue}}</td>
		
		
		      <td  colspan="2"style="text-align:right">Due Date:{{$newDate1}}</td>
		  </tr>
		  
		
		  <tr class="item-row">
		  <td >Consumption</td>
			  <td  colspan="2" style="text-align:center">Particulars</td>
		
		
		      <td colspan="2"style="text-align:right">Amount(Taka):{{$dept->value }}</td>
		  </tr>
		  
		  <tr>
		    <td colspan="2">Energy Charge(Peak and off Peak):</td>
			<td colspan="3">0</td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Service Charge</td>
		      <td class="total-value"><div id="subtotal">{{ $dept->value }}</div></td>
		  </tr>
		 
		  <tr>
		  <td colspan="2" class="blank">  


<img  src="images/logo.jpeg" alt="logo" width="150" height="80"/>
</td>
		 
		      
<td colspan="2" class="total-line">Previous due(With Late Payment Charge)</td>

<td class="total-value">{{ $dept->prev+$dept->late}} </td>


</tr>
		 
		
	
		  <tr>
		  <td colspan="2" class="blank"></td>
<td colspan="2" class="total-line">Late Payment Charge</td>

<td class="total-value">{{ $dept->late}}</td>

		  </tr>
		 
		
	
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total if paid after due date </td>
        
			 

		      <td class="total-value balance"> {{ $dept->total2_col}}</td>
			
			
		  </tr>
		
		</table>
			</br>
</br>
<div id="inline"> 
<div class="one"></div><div  class="two"id="emu"></div></div>
@php

echo"In Word:";echo NumConvert::word( round($dept->total2_col));
@endphp


<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
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
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>


	</div>


        


      


@endforeach

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


</html>