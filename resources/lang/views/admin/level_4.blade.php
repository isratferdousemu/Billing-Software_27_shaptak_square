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
<div class="text-center" style="color:#0096FF">Level-10</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 20</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_20}}</div></button></td>
	
	
        <form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="2005">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_20}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_20}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_20*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_20*1000}}</div></button></td>
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
<div class="text-center" style="color:#0096FF">Level-11</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 22</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_22}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="2205">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_22}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_22}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_22*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_22*1000}}</div></button></td>
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
<div class="text-center" style="color:#0096FF">Level-12</div>
<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 24</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_24}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="2405">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_24}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_24}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_24*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_24*1000}}</div></button></td>
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 21</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_21}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="2105">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_21}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_21}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_21*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_21*1000}}</div></button></td>
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 23</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_23}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="2305">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_23}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_23}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_23*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_23*1000}}</div></button></td>
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >&nbsp;Meter 25</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Customer Name</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$meter_25}}</div></button></td>
		<form method="POST" action="customer_1">
        @csrf      
<input type="hidden"  name="customer" value="2505">
                     
<td width=40 align=left><button class="buttonemu">Update</button></td>
              
            
        </form>
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$pf_25}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit"></button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Total Power</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$power_25}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">kW</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Energy DPDC</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dpdc_25*1000}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Wh</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Energy DG</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$dg_25*1000}}</div></button></td>
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