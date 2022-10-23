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
<div style="position:fixed;">

 	<!-- row 1 -->

<div class="row">
	<div class="text-center" style="color:#0096FF">Mother Meter</div>
<div class="col">

<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >Phase A</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Voltage L-N</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$vln_a}}</div></button></td>
	
                     
<td width=40 align=left><button class="button buttonUnit">Volt</button></td>
              
     
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Voltage L-L</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$vll_a}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">Volt</button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Current</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$ia}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">Amp</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Real Power</button></td>
			<td width=50 align=center><button class="button buttonPV">{{$pa}}<div ></div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Kw</button></td>
	</tr>	
	<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Apparent Power</button></td>
			<td width=50 align=center><button class="button buttonPV">{{$sa}}<div ></div></button></td>
			<td width=40 align=left><button class="button buttonUnit">KVA</button></td>
	</tr>
	<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Reactive Power</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$rea}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">KVAr</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Line Frequency</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$lf}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">HZ</button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$pf_a}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit"></button></td>
		</tr>
	
	
	
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
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >Phase B</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Voltage L-N</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$vln_b}}</div></button></td>
	
                     
<td width=40 align=left><button class="button buttonUnit">Volt</button></td>
              
     
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Voltage L-L</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$vll_b}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">Volt</button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Current</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$ib}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">Amp</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Real Power</button></td>
			<td width=50 align=center><button class="button buttonPV">{{$pb}}<div ></div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Kw</button></td>
	</tr>	
	<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Apparent Power</button></td>
			<td width=50 align=center><button class="button buttonPV">{{$sb}}<div ></div></button></td>
			<td width=40 align=left><button class="button buttonUnit">KVA</button></td>
	</tr>
	<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Reactive Power</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$reb}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">KVAr</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Line Frequency</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$lf}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">HZ</button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$pf_b}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit"></button></td>
		</tr>
	
	</table>

	</td>

</tr>
</table>
<!-- col end -->
</div >	


<div class="col">

<table width="100%"  cellspacing=5 cellpadding=5 >
<tr>

	<td width="17%" height="175">
	
	<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">
		<tr height=25>
		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div >Phase C</div></button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Voltage L-N</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$vln_c}}</div></button></td>
	
                     
<td width=40 align=left><button class="button buttonUnit">Volt</button></td>
              
     
	</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Voltage L-L</button></td>
		<td width=50 align=center><button class="button buttonPV"><div >{{$vll_c}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">Volt</button></td>
	</tr>
		
	
		
			
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption"> Current</button></td>
	<td width=50 align=center><button class="button buttonPV"><div>{{$ic}}</div></button></td>
		<td width=40 align=left><button class="button buttonUnit">Amp</button></td>
	</tr>
		<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Real Power</button></td>
			<td width=50 align=center><button class="button buttonPV">{{$pc}}<div ></div></button></td>
			<td width=40 align=left><button class="button buttonUnit">Kw</button></td>
	</tr>	
	<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Apparent Power</button></td>
			<td width=50 align=center><button class="button buttonPV">{{$sc}}<div ></div></button></td>
			<td width=40 align=left><button class="button buttonUnit">KVA</button></td>
	</tr>
	<tr height=15>
	<td width=80 align=right><button class="button buttonCaption">Reactive Power</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$rec}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">KVAr</button></td>
	</tr>	
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Line Frequency</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$lf}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit">HZ</button></td>
		</tr>
		<tr height=15>
			<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>
			<td width=50 align=center><button class="button buttonPV"><div >{{$pf_c}}</div></button></td>
			<td width=40 align=left><button class="button buttonUnit"></button></td>
		</tr>
	
	
	
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

	<!-- col end -->
</div>
<div class="col">


	<!-- col end -->
</div>
<div class="col">

	<!-- col end -->
</div>
	<!-- row end -->
</div>

		</center>
	</body> 
</html>



@endsection