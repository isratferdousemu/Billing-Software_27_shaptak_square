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
<div class="text-center" style="color:#0096FF">Level-1</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 1</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_1}}</div></button></td>
	
	
        <form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="105">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_1}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_1}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_1*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_1*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">DG Runtime</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >0</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Hour</button></td>
		</tr>
	
	
	</table>

	</td>

</tr>
</table>
<!-- col end -->
</div>

<div class="col">
<div class="text-center" style="color:#0096FF">Level-2</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 3</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_3}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="305">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_3}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_3}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_3*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_3*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">DG Runtime</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >0</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Hour</button></td>
		</tr>
		<tr height=15>
	
	</table>

	</td>

</tr>
</table>

<!-- col end -->
</div >	


<div class="col">
<div class="text-center" style="color:#0096FF">Level-3</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 5</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_5}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="505">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_5}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_5}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_5*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_5*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">DG Runtime</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >0</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Hour</button></td>
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 2</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_2}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="205">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_2}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_2}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_2*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_2*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>

		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">DG Runtime</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >0</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Hour</button></td>
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 4</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_4}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="405">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_4}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_4}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_4*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_4*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">DG Runtime</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >0</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Hour</button></td>
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 6</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_6}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="605">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_6}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_6}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_6*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_6*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">DG Runtime</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >0</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Hour</button></td>
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

		</center>
	</body> 
</html>



@endsection