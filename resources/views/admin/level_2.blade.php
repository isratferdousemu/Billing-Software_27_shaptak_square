@extends('admin.index')
@section('content')

<head>
<style>





<html>
 <head>

  <style>


	

	

	.active
	{
	  background-color: #39798A;
	}

	.button {
	  border: none;
	  color: white;
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 10px;
	  margin: 2px 1px;
	  cursor: pointer;
	  border-radius: 8px;
	  box-shadow: 0 10px 20px 0 rgba(0,0,0,0.2), 0 10px 20px 0 rgba(0,0,0,0.19);
	}
	.buttonPop     {background-color: #A0C0A0; padding: 5px 8px; width: 120px; height: 20px; font-size: 10px;}
	
	.buttonCaption {background-color: #0F0F0F; padding: 5px 8px; width: 90px; height: 20px;}
	.buttonPV      {background-color: #99D9EA; padding: 5px 8px; width: 150px; height: 20px; color: black;}
	.buttonUnit    {background-color: #606060; padding: 5px 8px; width: 50px; height: 20px;}
	.buttonemu    {background-color: #606060; padding: 5px 8px; width: 50px; height: 20px;   border-radius: 8px; font-size: 10px; text-align: center; color:white;}
  </style>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="30">
 </head>

 <body style="background-color:#E0E0E0;">

<center> 
<div style="position:absolute;">

 	<!-- row 1 -->
<div class="row">
	
<div class="col">
<div class="text-center" style="color:#0096FF">Level-4</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 540430027357</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_7}}</div></button></td>
	
	
        <form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="7">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_7}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_7}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_7*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_7*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
	
		
	
	</table>

	</td>

</tr>
</table>
<!-- col end -->
</div>

<div class="col">
<div class="text-center" style="color:#0096FF">Level-5</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 540430026832</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_10}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="10">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_10}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_10}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_10*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_10*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
			<tr height=15>
	
	</table>

	</td>

</tr>
</table>

<!-- col end -->
</div >	


<div class="col">
<div class="text-center" style="color:#0096FF">Level-6</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 540430027676</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_12}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="12">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_12}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_12}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_12*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_12*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
	
		<tr height=15>
	
	</table>

	</td>

</tr>
</table>
	<!-- col end -->
</div>

<!-- row end -->
</div >	
<div class="row">
<div class="col">
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 540430027680</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_8}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="8">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_8}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_8}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_8*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_8*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>

				<tr height=15>
	
	</table>

	</td>

</tr>
</table>
	<!-- col end -->
   
</div>
<div class="col">
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 540430027675</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_11}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="11">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_11}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_11}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_11*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_11*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
				<tr height=15>
	
	</table>

	</td>

</tr>
</table>
	<!-- col end -->
</div>
<div class="col">
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 540430027686</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_13}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="13">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_13}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_13}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_13*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_13*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
			<tr height=15>
	
	</table>

	</td>

</tr>
</table>
	<!-- col end -->
</div>
	<!-- row end -->
</div>
<!-- row start -->
<div class="row">
<div class="col">
<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp; Meter 540430027348</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_9}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="9">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_9}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_9}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_9*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_9*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
			<tr height=15>
	
	</table>
</div>
<div class="col">
</div>
<div class="col">
</div>
</div>
<!-- row end -->

		</center>
	</body> 
</html>



@endsection