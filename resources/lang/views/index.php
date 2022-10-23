<html>
 <head>
  <title>SCADA Overview</title>
  <style>
	body { background-color: #99D9EA; }

	input[type=text]
	{
	  width: 100px;
	  padding: 12px 20px;
	  margin: 8px 0;
	  box-sizing: border-box;
	  border: 2px solid black;
	  border-radius: 4px;
	}

	ul
	{
	  list-style-type: none;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  background-color: #79B9CA;
	}

	li
	{
	  float: left;
	}

	li a
	{
	  display: block;
	  color: white;
	  text-align: center;
	  padding: 4px 6px;
	  text-decoration: none;
	}

	li a:hover
	{
	  background-color: #39798A;
	}
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
	.buttonPV      {background-color: #99D9EA; padding: 5px 8px; width: 75px; height: 20px; color: black;}
	.buttonUnit    {background-color: #606060; padding: 5px 8px; width: 50px; height: 20px;}

  </style>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=0.4">
 </head>

 <body>



<script>

var myVar = setInterval(myTimer, 500);
var gC=0;
var blnLoaded=0;

function myTimer()
{
	gC++;
	if((gC>0) && (blnLoaded==0))
	{
		showOverView();
		blnLoaded = 1;
	}
	if((gC%20)==0)
		location.reload()
} 

function showOverView()
{
	document.getElementById("Total_Gen").innerHTML = "Total Generation: " + gblkWs[0] + " kW";
	document.getElementById("Total_Imp").innerHTML = "Total Import: " + gblkWs[1] + " kW";
	document.getElementById("Total_Con").innerHTML = "Total Consumption: " + gblkWs[2] + " kW";

	for(i=0;i<27;i++)
	{
		document.getElementById("Station_"+i+"_PV_Name").innerHTML = gblNames[i];
		document.getElementById("Station_"+i+"_PV_31").innerHTML = gblPV[i][0].toFixed(2);
		document.getElementById("Station_"+i+"_PV_33").innerHTML = gblPV[i][1].toFixed(2);
		document.getElementById("Station_"+i+"_PV_34").innerHTML = gblPV[i][2].toFixed(2);
		document.getElementById("Station_"+i+"_PV_36").innerHTML = gblPV[i][3].toFixed(2);
		document.getElementById("Station_"+i+"_PV_38").innerHTML = gblPV[i][4].toFixed(3);
		document.getElementById("Station_"+i+"_PV_41").innerHTML = gblPV[i][5].toFixed(2);
	}
}

function ShowDetails(iStation)
{
 window.location.href="getElectricalData.php?StationId="+(iStation);
}

</script>

<script>
<?php
$conn = new mysqli('localhost', 'root', 'Admin@123', 'ems');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = 'SELECT ID, LOCATION_NAME FROM stc_stations Order by ID';
$sql = 'SELECT t2.CONFIG_VALUE, t1.CONFIG_VALUE as LOCATION_NAME from stc_configuration_register t1 inner join stc_configuration_register t2 on t1.STATION_ID = t2.STATION_ID where t1.CONFIG_CATEGORY_ID = 1 and t2.CONFIG_CATEGORY_ID=3 order by t2.CONFIG_VALUE';
$result = $conn->query($sql);
$strBuff0='let gblNames = ["';

if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc())
	{
		$strBuff0 = $strBuff0 .  $row[LOCATION_NAME].'","';
	}
	$strBuff0 = $strBuff0 . '"];'."\n";
}
echo $strBuff0;

$sql0 = 'SELECT stc_configuration_register.CONFIG_VALUE, format(sum(pv_value),3) as kW from dyn_pv_register inner join stc_configuration_register on dyn_pv_register.STATION_ID = stc_configuration_register.STATION_ID where dyn_pv_register.PV_CATEGORY_ID = 36 and stc_configuration_register.CONFIG_CATEGORY_ID = 2 group by stc_configuration_register.CONFIG_VALUE';
$result0 = $conn->query($sql0);
$strBuff00='let gblkWs = ["';

if ($result0->num_rows > 0) 
{
    while($row = $result0->fetch_assoc())
	{
		$strBuff00 = $strBuff00 .  $row[kW].'","';
	}
	$strBuff00 = $strBuff00 . '"];'."\n";
}
echo $strBuff00;


//$sql1 = 'SELECT (STATION_ID-2) as STserial, PV_CATEGORY_ID, PV_VALUE FROM dyn_pv_register Where PV_category_ID in (31, 33, 34, 36, 38, 41) Order by STATION_ID, PV_CATEGORY_ID';
$sql1 = 'SELECT t2.CONFIG_VALUE, (cast(t2.CONFIG_VALUE as signed) -1) as STserial, t1.PV_CATEGORY_ID, t1.PV_VALUE FROM dyn_pv_register t1 inner join stc_configuration_register t2 on t1.STATION_ID = t2.STATION_ID Where t2.CONFIG_CATEGORY_ID=3 and t1.PV_category_ID in (31, 33, 34, 36, 38, 41) Order by STserial, PV_CATEGORY_ID';
$result1 = $conn->query($sql1);
$prevStation="-1";
$strBuff="\nlet gblPV = [\n";

if ($result1->num_rows > 0) 
{
    while($row = $result1->fetch_assoc())
	{
		if(($row[STserial]!=$prevStation) && ($prevStation!='-1'))
			$strBuff = $strBuff .  '],'."\n".'[';
		else if(($row[STserial]!=$prevStation) && ($prevStation=='-1'))
			$strBuff = $strBuff .  '[';
		$strBuff = $strBuff .  $row[PV_VALUE].',';
		$prevStation=$row[STserial];
	}
	$strBuff = $strBuff .  ']'."\n".'];'."\n";
}
echo $strBuff;
?>




</script>

<center> 
<div style="position:relative;">

 	<table style="padding: 0 !important; border: none !important;" width=1800 height=1000 >
		<tr height=25>
			<td style="border: 0px; font-size:24; text-align:center; color:#40808F;" bgcolor="#99D9EA" colspan=8 width=100%>Beacon Pharmaceuticals Central PCC SCADA</td>
		</tr>
		<tr height=20>
			<td colspan=8 width=100%>
				<ul>
					<li><a href="index.php">Home</a></li>
					<!--<li><a class="active" href="showpumphouse.php?StationId=<?php echo $iStationId;?>">Meters</a></li>-->
					<li><a href="ShowReports.php?StationId=<?php echo $iStationId;?>&date=<?php echo date('Y-m')?>">Report</a></li>
				</ul>
			</td>
		</tr>

		<tr height=200>
			<td colspan=8 width=100%>

<?php
echo '<table width="100%"  cellspacing=5 cellpadding=5 >';
echo '<tr>';

for($i=0; $i<8; $i++)
{
	echo '<td width="17%" height="175">';
	
	echo '<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">';
	echo '	<tr height=25>';
	echo '		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div id="Station_'.$i.'_PV_Name">&nbsp;</div></button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Frequency</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_31">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">Hz</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Voltage</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_33">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">V</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Current</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_34">&nbsp;</div></button></td>';
	echo '		<td width=40  align=left><button class="button buttonUnit">A</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Power</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_36">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">kW</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_38">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">&nbsp;</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Energy</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_41">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">Wh</button></td>';
	echo '	</tr>';
	echo '	<tr height=15>';
	echo '		<td width=170 align=center colspan=3> <button onclick="ShowDetails('.$i.')" class="button buttonPop" >Meter Details</button></td>';				
	echo '	</tr>';	
	echo '</table>';

	echo '</td>';
}
echo '</tr>';
echo '</table>';
?>
		</td></tr>

		<tr height=25>
			<td style="border: 0px; font-size:24; text-align:left; color:#40808F;" bgcolor="#99D9EA" colspan=8 width=100%><h2><div id="Total_Gen">&nbsp;</div></h2></td>
		</tr>

		<tr height=200>
			<td colspan=8 width=100%>		
<?php
echo '<table width="100%"  cellspacing=5 cellpadding=5 >';
echo '<tr>';
for($i=8; $i<11; $i++)
{
	echo '<td width="12%" height="175">'; 	
	
	echo '<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">';
	echo '	<tr height=25>';
	echo '		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div id="Station_'.$i.'_PV_Name">&nbsp;</div></button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Frequency</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_31">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">Hz</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Voltage</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_33">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">V</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Current</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_34">&nbsp;</div></button></td>';
	echo '		<td width=40  align=left><button class="button buttonUnit">A</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Power</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_36">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">kW</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_38">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">&nbsp;</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Energy</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_41">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">Wh</button></td>';
	echo '	</tr>';
	echo '	<tr height=15>';
	echo '		<td width=170 align=center colspan=3> <button onclick="ShowDetails('.$i.')" class="button buttonPop" >Meter Details</button></td>';				
	echo '	</tr>';	
	echo '</table>';

	echo '</td>';
}

for($iDummy=0; $iDummy<5; $iDummy++)
{
	echo '<td width="17%" height="175">&nbsp;</td>'; 	
}

echo '</tr>';
echo '</table>';
?>
		</td></tr>
		<tr height=25>
			<td style="border: 0px; font-size:24; text-align:left; color:#40808F;" bgcolor="#99D9EA" colspan=8 width=100%><h2><div id="Total_Imp">&nbsp;</div></h2></td>
		</tr>

		<tr height=200>
			<td colspan=8 width=100%>		
<?php
echo '<table width="100%"  cellspacing=5 cellpadding=5 >';
for($i=11; $i<27; $i++)
{
	if(($i % 8) == 3)
	{
		echo '<tr>';
	}
	echo '<td width="17%" height="175">'; 	//<div id="__Station_Box_'.$i.'">&nbsp;</div>';
	
	echo '<table style="padding: 0 !important; border: none !important;  background-color: #E0E0E0; " width="100%">';
	echo '	<tr height=25>';
	echo '		<td width=170 align=center colspan=3> <button class="button buttonPV" style="width: 150; color: black; font-size: 11px;"><div id="Station_'.$i.'_PV_Name">&nbsp;</div></button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Frequency</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_31">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">Hz</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Voltage</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_33">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">V</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Current</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_34">&nbsp;</div></button></td>';
	echo '		<td width=40  align=left><button class="button buttonUnit">A</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Power</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_36">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">kW</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Power Factor</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_38">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">&nbsp;</button></td>';
	echo '	</tr>';	
	echo '	<tr height=15>';
	echo '		<td width=80 align=right><button class="button buttonCaption">Energy</button></td>';
	echo '		<td width=50 align=center><button class="button buttonPV"><div id="Station_'.$i.'_PV_41">&nbsp;</div></button></td>';
	echo '		<td width=40 align=left><button class="button buttonUnit">Wh</button></td>';
	echo '	</tr>';
	echo '	<tr height=15>';
	echo '		<td width=170 align=center colspan=3> <button onclick="ShowDetails('.$i.')" class="button buttonPop" >Meter Details</button></td>';				
	echo '	</tr>';	
	echo '</table>';

	echo '</td>';
	if(($i % 8) == 2)
	{
		echo '</tr>';
	}
}
echo '</table>';

$conn->close();

?>
		</td></tr>

		<tr height=25>
			<td style="border: 0px; font-size:24; text-align:left; color:#40808F;" bgcolor="#99D9EA" colspan=8 width=100%><h2><div id="Total_Con">&nbsp;</div></h2></td>
		</tr>
		
	</table>
		</center>
	</body> 
</html>


