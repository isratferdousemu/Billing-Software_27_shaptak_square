<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class AdexController extends Controller
{
    public function dashboard()
    {
        $now = Carbon::now();
  

   
        $lastMonth=$now->format('F'); 
    
    $month=$now->month;
   
    
    $emu=DB::table('stc_stations_1')->wherenotin('ID',[1,2,3,4,5,6])->get();
    $total=DB::table('arc_pv_history_new')->where('STATION_ID',30)->where('PV_CATEGORY_ID',41)->whereMonth('LOG_DATE_TIME',8)->select('LOG_DATE_TIME','PV_VALUE')->get();
    $total1=DB::table('arc_pv_history_new')->where('STATION_ID',30)->where('PV_CATEGORY_ID',41)->whereMonth('LOG_DATE_TIME',8)->max('PV_VALUE');
    $total2=DB::table('arc_pv_history_new')->where('STATION_ID',30)->where('PV_CATEGORY_ID',41)->where('PV_VALUE','>',167512)->whereMonth('LOG_DATE_TIME',8)->min('PV_VALUE');
    $energy=$total1-$total2;
    $pie=DB::select('SELECT STATION_ID, MAX(PV_VALUE)-MIN(PV_VALUE) as energy FROM arc_pv_history_new Where month(LOG_DATE_TIME)=8 and PV_CATEGORY_ID=41 and STATION_ID<30 GROUP BY STATION_ID');
    return view('admin.dashboard',compact('emu','lastMonth','total','energy','total1','total2','pie'));
    	
    }
    public function power(){
        return view('admin.emu');
    }
    public function level_1()
    {
$meter_1=DB::table('stc_stations_1')
->where('ID','=',1)
->Value('name');
$power_1=DB::table('dyn_pv_register')
->where('PV_ID','=',136)
->Value('PV_Value');
$pf_1=DB::table('dyn_pv_register')
->where('PV_ID','=',138)
->Value('PV_VALUE');
$dpdc_1=DB::table('dyn_pv_register')
->where('PV_ID','=',141)
->Value('PV_VALUE');
$dg_1=DB::table('dyn_pv_register')
->where('PV_ID','=',144)
->Value('PV_VALUE');
$meter_2=DB::table('stc_stations_1')
->where('ID','=',2)
->Value('name');

$power_2=DB::table('dyn_pv_register')
->where('PV_ID','=',236)
->Value('PV_Value');
$pf_2=DB::table('dyn_pv_register')
->where('PV_ID','=',238)
->Value('PV_VALUE');
$dpdc_2=DB::table('dyn_pv_register')
->where('PV_ID','=',241)
->Value('PV_VALUE');
$dg_2=DB::table('dyn_pv_register')
->where('PV_ID','=',244)
->Value('PV_VALUE');
$meter_3=DB::table('stc_stations_1')
->where('ID','=',3)
->Value('name');

$power_3=DB::table('dyn_pv_register')
->where('PV_ID','=',336)
->Value('PV_Value');
$pf_3=DB::table('dyn_pv_register')
->where('PV_ID','=',338)
->Value('PV_VALUE');
$dpdc_3=DB::table('dyn_pv_register')
->where('PV_ID','=',341)
->Value('PV_VALUE');
$dg_3=DB::table('dyn_pv_register')
->where('PV_ID','=',344)
->Value('PV_VALUE');
$meter_4=DB::table('stc_stations_1')
->where('ID','=',4)
->Value('name');
$power_4=DB::table('dyn_pv_register')
->where('PV_ID','=',436)
->Value('PV_Value');
$pf_4=DB::table('dyn_pv_register')
->where('PV_ID','=',438)
->Value('PV_VALUE');
$dpdc_4=DB::table('dyn_pv_register')
->where('PV_ID','=',441)
->Value('PV_VALUE');
$dg_4=DB::table('dyn_pv_register')
->where('PV_ID','=',444)
->Value('PV_VALUE');
$meter_5=DB::table('stc_stations_1')
->where('ID','=',5)
->Value('name');
$power_5=DB::table('dyn_pv_register')
->where('PV_ID','=',536)
->Value('PV_Value');
$pf_5=DB::table('dyn_pv_register')
->where('PV_ID','=',538)
->Value('PV_VALUE');
$dpdc_5=DB::table('dyn_pv_register')
->where('PV_ID','=',541)
->Value('PV_VALUE');
$dg_5=DB::table('dyn_pv_register')
->where('PV_ID','=',544)
->Value('PV_VALUE');
$meter_6=DB::table('stc_stations_1')
->where('ID','=',6)
->Value('name');
$power_6=DB::table('dyn_pv_register')
->where('PV_ID','=',636)
->Value('PV_Value');
$pf_6=DB::table('dyn_pv_register')
->where('PV_ID','=',638)
->Value('PV_VALUE');
$dpdc_6=DB::table('dyn_pv_register')
->where('PV_ID','=',641)
->Value('PV_VALUE');
$dg_6=DB::table('dyn_pv_register')
->where('PV_ID','=',644)
->Value('PV_VALUE');




        return view('admin.level_1',compact('meter_1','power_1','pf_1','dpdc_1','dg_1','meter_2','power_2','pf_2','dpdc_2','dg_2','meter_3','power_3','pf_3','dpdc_3','dg_3','meter_4','power_4','pf_4','dpdc_4','dg_4','meter_5','power_5','pf_5','dpdc_5','dg_5','meter_6','power_6','pf_6','dpdc_6','dg_6'));
    }
public function level_2()
{
$meter_7=DB::table('stc_stations_1')
->where('ID','=',7)
->Value('name');
$power_7=DB::table('dyn_pv_register')
->where('PV_ID','=',736)
->Value('PV_Value');
$pf_7=DB::table('dyn_pv_register')
->where('PV_ID','=',738)
->Value('PV_VALUE');
$dpdc_7=DB::table('dyn_pv_register')
->where('PV_ID','=',741)
->Value('PV_VALUE');
$dg_7=DB::table('dyn_pv_register')
->where('PV_ID','=',744)
->Value('PV_VALUE');
$meter_8=DB::table('stc_stations_1')
->where('ID','=',8)
->Value('name');
$power_8=DB::table('dyn_pv_register')
->where('PV_ID','=',836)
->Value('PV_Value');
$pf_8=DB::table('dyn_pv_register')
->where('PV_ID','=',838)
->Value('PV_VALUE');
$dpdc_8=DB::table('dyn_pv_register')
->where('PV_ID','=',841)
->Value('PV_VALUE');
$dg_8=DB::table('dyn_pv_register')
->where('PV_ID','=',844)
->Value('PV_VALUE');
$meter_10=DB::table('stc_stations_1')
->where('ID','=',10)
->Value('name');
$power_10=DB::table('dyn_pv_register')
->where('PV_ID','=',1036)
->Value('PV_Value');
$pf_10=DB::table('dyn_pv_register')
->where('PV_ID','=',1038)
->Value('PV_VALUE');
$dpdc_10=DB::table('dyn_pv_register')
->where('PV_ID','=',1041)
->Value('PV_VALUE');
$dg_10=DB::table('dyn_pv_register')
->where('PV_ID','=',1044)
->Value('PV_VALUE');
$meter_11=DB::table('stc_stations_1')
->where('ID','=',11)
->Value('name');
;
$power_11=DB::table('dyn_pv_register')
->where('PV_ID','=',1136)
->Value('PV_Value');
$pf_11=DB::table('dyn_pv_register')
->where('PV_ID','=',1138)
->Value('PV_VALUE');
$dpdc_11=DB::table('dyn_pv_register')
->where('PV_ID','=',1141)
->Value('PV_VALUE');
$dg_11=DB::table('dyn_pv_register')
->where('PV_ID','=',1144)
->Value('PV_VALUE');
$meter_13=DB::table('stc_stations_1')
->where('ID','=',13)
->Value('name');
$power_13=DB::table('dyn_pv_register')
->where('PV_ID','=',1336)
->Value('PV_Value');
$pf_13=DB::table('dyn_pv_register')
->where('PV_ID','=',1338)
->Value('PV_VALUE');
$dpdc_13=DB::table('dyn_pv_register')
->where('PV_ID','=',1341)
->Value('PV_VALUE');
$dg_13=DB::table('dyn_pv_register')
->where('PV_ID','=',1344)
->Value('PV_VALUE');
$meter_12=DB::table('stc_stations_1')
->where('ID','=',12)
->Value('name');
$power_12=DB::table('dyn_pv_register')
->where('PV_ID','=',1236)
->Value('PV_Value');
$pf_12=DB::table('dyn_pv_register')
->where('PV_ID','=',1238)
->Value('PV_VALUE');
$dpdc_12=DB::table('dyn_pv_register')
->where('PV_ID','=',1241)
->Value('PV_VALUE');
$dg_12=DB::table('dyn_pv_register')
->where('PV_ID','=',1244)
->Value('PV_VALUE');

$meter_9=DB::table('stc_stations_1')
->where('ID','=',9)
->Value('name');

$power_9=DB::table('dyn_pv_register')
->where('PV_ID','=',936)
->Value('PV_Value');
$pf_9=DB::table('dyn_pv_register')
->where('PV_ID','=',938)
->Value('PV_VALUE');
$dpdc_9=DB::table('dyn_pv_register')
->where('PV_ID','=',941)
->Value('PV_VALUE');
$dg_9=DB::table('dyn_pv_register')
->where('PV_ID','=',944)
->Value('PV_VALUE');




    return view('admin.level_2',compact('meter_7','power_7','pf_7','dpdc_7','dg_7','meter_8','power_8','pf_8','dpdc_8','dg_8','meter_10','power_10','pf_10','dpdc_10','dg_10','meter_11','power_11','pf_11','dpdc_11','dg_11','meter_12','power_12','pf_12','dpdc_12','dg_12','meter_13','power_13','pf_13','dpdc_13','dg_13','meter_9','power_9','pf_9','dpdc_9','dg_9'));
}
  




public function level_3()
{
$meter_14=DB::table('stc_stations_1')
->where('ID','=',14)
->Value('name');


$power_14=DB::table('dyn_pv_register')
->where('PV_ID','=',1436)
->Value('PV_Value');
$pf_14=DB::table('dyn_pv_register')
->where('PV_ID','=',1438)
->Value('PV_VALUE');
$dpdc_14=DB::table('dyn_pv_register')
->where('PV_ID','=',1441)
->Value('PV_VALUE');
$dg_14=DB::table('dyn_pv_register')
->where('PV_ID','=',1444)
->Value('PV_VALUE');
$meter_15=DB::table('stc_stations_1')
->where('ID','=',15)
->Value('name');


$power_15=DB::table('dyn_pv_register')
->where('PV_ID','=',1536)
->Value('PV_Value');
$pf_15=DB::table('dyn_pv_register')
->where('PV_ID','=',1538)
->Value('PV_VALUE');
$dpdc_15=DB::table('dyn_pv_register')
->where('PV_ID','=',1541)
->Value('PV_VALUE');
$dg_15=DB::table('dyn_pv_register')
->where('PV_ID','=',1544)
->Value('PV_VALUE');
$meter_16=DB::table('stc_stations_1')
->where('ID','=',16)
->Value('name');


$power_16=DB::table('dyn_pv_register')
->where('PV_ID','=',1636)
->Value('PV_Value');
$pf_16=DB::table('dyn_pv_register')
->where('PV_ID','=',1638)
->Value('PV_VALUE');
$dpdc_16=DB::table('dyn_pv_register')
->where('PV_ID','=',1641)
->Value('PV_VALUE');
$dg_16=DB::table('dyn_pv_register')
->where('PV_ID','=',1644)
->Value('PV_VALUE');
$meter_17=DB::table('stc_stations_1')
->where('ID','=',17)
->Value('name');

$power_17=DB::table('dyn_pv_register')
->where('PV_ID','=',1736)
->Value('PV_Value');
$pf_17=DB::table('dyn_pv_register')
->where('PV_ID','=',1738)
->Value('PV_VALUE');
$dpdc_17=DB::table('dyn_pv_register')
->where('PV_ID','=',1741)
->Value('PV_VALUE');
$dg_17=DB::table('dyn_pv_register')
->where('PV_ID','=',1744)
->Value('PV_VALUE');
$meter_18=DB::table('stc_stations_1')
->where('ID','=',18)
->Value('name');

$power_18=DB::table('dyn_pv_register')
->where('PV_ID','=',1836)
->Value('PV_Value');
$pf_18=DB::table('dyn_pv_register')
->where('PV_ID','=',1838)
->Value('PV_VALUE');
$dpdc_18=DB::table('dyn_pv_register')
->where('PV_ID','=',1841)
->Value('PV_VALUE');
$dg_18=DB::table('dyn_pv_register')
->where('PV_ID','=',1844)
->Value('PV_VALUE');
$meter_19=DB::table('stc_stations_1')
->where('ID','=',19)
->Value('name');


$power_19=DB::table('dyn_pv_register')
->where('PV_ID','=',1936)
->Value('PV_Value');
$pf_19=DB::table('dyn_pv_register')
->where('PV_ID','=',1938)
->Value('PV_VALUE');
$dpdc_19=DB::table('dyn_pv_register')
->where('PV_ID','=',1941)
->Value('PV_VALUE');
$dg_19=DB::table('dyn_pv_register')
->where('PV_ID','=',1944)
->Value('PV_VALUE');




    return view('admin.level_3',compact('meter_14','power_14','pf_14','dpdc_14','dg_14','meter_15','power_15','pf_15','dpdc_15','dg_15','meter_16','power_16','pf_16','dpdc_16','dg_16','meter_17','power_17','pf_17','dpdc_17','dg_17','meter_18','power_18','pf_18','dpdc_18','dg_18','meter_19','power_19','pf_19','dpdc_19','dg_19'));
}
public function level_4()
{
$meter_20=DB::table('stc_stations_1')
->where('ID','=',20)
->Value('name');


$power_20=DB::table('dyn_pv_register')
->where('PV_ID','=',2036)
->Value('PV_Value');
$pf_20=DB::table('dyn_pv_register')
->where('PV_ID','=',2038)
->Value('PV_VALUE');
$dpdc_20=DB::table('dyn_pv_register')
->where('PV_ID','=',2041)
->Value('PV_VALUE');
$dg_20=DB::table('dyn_pv_register')
->where('PV_ID','=',2044)
->Value('PV_VALUE');
$meter_21=DB::table('stc_stations_1')
->where('ID','=',21)
->Value('name');


$power_21=DB::table('dyn_pv_register')
->where('PV_ID','=',2136)
->Value('PV_Value');
$pf_21=DB::table('dyn_pv_register')
->where('PV_ID','=',2138)
->Value('PV_VALUE');
$dpdc_21=DB::table('dyn_pv_register')
->where('PV_ID','=',241)
->Value('PV_VALUE');
$dg_21=DB::table('dyn_pv_register')
->where('PV_ID','=',2144)
->Value('PV_VALUE');
$meter_22=DB::table('stc_stations_1')
->where('ID','=',22)
->Value('name');

$power_22=DB::table('dyn_pv_register')
->where('PV_ID','=',2236)
->Value('PV_Value');
$pf_22=DB::table('dyn_pv_register')
->where('PV_ID','=',2238)
->Value('PV_VALUE');
$dpdc_22=DB::table('dyn_pv_register')
->where('PV_ID','=',2241)
->Value('PV_VALUE');
$dg_22=DB::table('dyn_pv_register')
->where('PV_ID','=',2244)
->Value('PV_VALUE');
$meter_23=DB::table('stc_stations_1')
->where('ID','=',23)
->Value('name');

$power_23=DB::table('dyn_pv_register')
->where('PV_ID','=',2336)
->Value('PV_Value');
$pf_23=DB::table('dyn_pv_register')
->where('PV_ID','=',2338)
->Value('PV_VALUE');
$dpdc_23=DB::table('dyn_pv_register')
->where('PV_ID','=',2341)
->Value('PV_VALUE');
$dg_23=DB::table('dyn_pv_register')
->where('PV_ID','=',2344)
->Value('PV_VALUE');
$meter_24=DB::table('stc_stations_1')
->where('ID','=',24)
->Value('name');

$power_24=DB::table('dyn_pv_register')
->where('PV_ID','=',2436)
->Value('PV_Value');
$pf_24=DB::table('dyn_pv_register')
->where('PV_ID','=',2438)
->Value('PV_VALUE');
$dpdc_24=DB::table('dyn_pv_register')
->where('PV_ID','=',2441)
->Value('PV_VALUE');
$dg_24=DB::table('dyn_pv_register')
->where('PV_ID','=',2444)
->Value('PV_VALUE');
$meter_25=DB::table('stc_stations_1')
->where('ID','=',25)
->Value('name');


$power_25=DB::table('dyn_pv_register')
->where('PV_ID','=',2536)
->Value('PV_Value');
$pf_25=DB::table('dyn_pv_register')
->where('PV_ID','=',2538)
->Value('PV_VALUE');
$dpdc_25=DB::table('dyn_pv_register')
->where('PV_ID','=',2541)
->Value('PV_VALUE');
$dg_25=DB::table('dyn_pv_register')
->where('PV_ID','=',2544)
->Value('PV_VALUE');




    return view('admin.level_4',compact('meter_20','power_20','pf_20','dpdc_20','dg_20','meter_21','power_21','pf_21','dpdc_21','dg_21','meter_22','power_22','pf_22','dpdc_22','dg_22','meter_23','power_23','pf_23','dpdc_23','dg_23','meter_25','power_25','pf_25','dpdc_25','dg_25','meter_24','power_24','pf_24','dpdc_24','dg_24'));
}
public function level_5()
{
$meter_26=DB::table('stc_stations_1')
->where('ID','=',26)
->Value('name');

$power_26=DB::table('dyn_pv_register')
->where('PV_ID','=',2636)
->Value('PV_Value');
$pf_26=DB::table('dyn_pv_register')
->where('PV_ID','=',2638)
->Value('PV_VALUE');
$dpdc_26=DB::table('dyn_pv_register')
->where('PV_ID','=',2641)
->Value('PV_VALUE');
$dg_26=DB::table('dyn_pv_register')
->where('PV_ID','=',2644)
->Value('PV_VALUE');
$meter_27=DB::table('stc_stations_1')
->where('ID','=',27)
->Value('name');

$power_27=DB::table('dyn_pv_register')
->where('PV_ID','=',2736)
->Value('PV_Value');
$pf_27=DB::table('dyn_pv_register')
->where('PV_ID','=',2738)
->Value('PV_VALUE');
$dpdc_27=DB::table('dyn_pv_register')
->where('PV_ID','=',2741)
->Value('PV_VALUE');
$dg_27=DB::table('dyn_pv_register')
->where('PV_ID','=',2744)
->Value('PV_VALUE');
$meter_28=DB::table('stc_stations_1')
->where('ID','=',28)
->Value('name');

$power_28=DB::table('dyn_pv_register')
->where('PV_ID','=',2836)
->Value('PV_Value');
$pf_28=DB::table('dyn_pv_register')
->where('PV_ID','=',2838)
->Value('PV_VALUE');
$dpdc_28=DB::table('dyn_pv_register')
->where('PV_ID','=',2841)
->Value('PV_VALUE');
$dg_28=DB::table('dyn_pv_register')
->where('PV_ID','=',2844)
->Value('PV_VALUE');
$meter_29=DB::table('stc_stations_1')
->where('ID','=',29)
->Value('name');

$power_29=DB::table('dyn_pv_register')
->where('PV_ID','=',2936)
->Value('PV_Value');
$pf_29=DB::table('dyn_pv_register')
->where('PV_ID','=',2938)
->Value('PV_VALUE');
$dpdc_29=DB::table('dyn_pv_register')
->where('PV_ID','=',2941)
->Value('PV_VALUE');
$dg_29=DB::table('dyn_pv_register')
->where('PV_ID','=',2944)
->Value('PV_VALUE');
$meter_30=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',3005)
->Value('CONFIG_VALUE');
$power_30=DB::table('dyn_pv_register')
->where('PV_ID','=',3036)
->Value('PV_Value');
$pf_30=DB::table('dyn_pv_register')
->where('PV_ID','=',3038)
->Value('PV_VALUE');
$dpdc_30=DB::table('dyn_pv_register')
->where('PV_ID','=',3041)
->Value('PV_VALUE');
$dg_30=DB::table('dyn_pv_register')
->where('PV_ID','=',3044)
->Value('PV_VALUE');
$meter_6=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',605)
->Value('CONFIG_VALUE');





    return view('admin.level_5',compact('meter_26','power_26','pf_26','dpdc_26','dg_26','meter_27','power_27','pf_27','dpdc_27','dg_27','meter_28','power_28','pf_28','dpdc_28','dg_28','meter_29','power_29','pf_29','dpdc_29','dg_29','meter_30','power_30','pf_30','dpdc_30','dg_30'));
}
public function customer_1(Request $request)
    {
        $config_id = $request->input('customer');
        $data=DB::table('stc_stations_1')
        ->where('ID','=',  $config_id)
        ->first();
       
 return view('admin.customer_edit',compact('data','config_id'));
        
    }

    public function customerupdate(Request $request){
        $config_id = $request->input('config_id');
        $config_value = $request->input('config_value');
        $explanation = $request->input('explanation');
    
        $previous = $request->input('previous');
        $service = $request->input('service');
      
        $data=DB::table('stc_stations_1')
        ->where('ID','=',  $config_id)
        ->update(['name'=> $config_value,'previous'=>  $previous,'service'=> $service]);
        
        $now = Carbon::now();
  
        $date = \Carbon\Carbon::now();
   
        $lastMonth=$date->subMonth()->format('F'); 
    
    $month=$now->month;
    $month=   $month-1;
    $year = ['1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','30','24','25','26','27','28','29'];

    $user = [];
  
  
    foreach ($year as $key => $value) {
        echo $user[] = DB::table('dpdcbills')->where('StationId',$value)->value('value');
    }
    $emu=DB::table('stc_stations_1')->get();
   
    return view('admin.dashboard',compact('emu','lastMonth'))->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
    	


}
public function reset(){
    
    $data1=DB::table('resets')
    ->Value('unit');
    $data=DB::table('resets')
    ->Value('service');

    return view('admin.reset',compact('data1','data'));
}
public function resetupdate(Request $request){

    $resets = $request->input('emu');
  $unit = $request->input('unit');
  $data=DB::table('resets')
  ->where('id','=',1)
  ->update(['unit'=>$unit,'service'=>$resets]);

  return redirect()->route('reset')->with('message', 'Updated !');
}
public function bill_create(Request  $request){
    switch ($request->input('action')) {
     
        case 'All_bill':
          $date1 = $request->input('date1');   
          $date2 = $request->input('date2');
          $newDate1 = date('d/m/Y', strtotime(' + 15 days')); 
          $current_month = date('m');
          $time=strtotime($date1);
          $month=date("m",$time);
          if($current_month== $month){
              return redirect ('admin/input_invalid');
          } else{
          $issue=date('d/m/Y');
      
     
          $month3=date("F",$time);


          $year=date("Y",$time);
         
          $unit=DB::table('resets')
          ->value('unit');

          $month2=$month+1;
    
          $year=date("Y",$time);
          if (DB::table('dpdcbills')
          ->where('month','=',$month)
          ->whereNotIn('StationId', [1,6])->count() > 0) {
            
           }
           else{
              $insert=DB::select("INSERT INTO `dpdcbills`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and PV_VALUE > 0 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' AND `STATION_ID` NOT IN (1,2,3,4,5,6) GROUP by STATION_ID");
             
          }  
          if (DB::table('dpdc2s')
          ->where('month','=',$month2)
          ->whereNotIn('StationId', [1,6])->count() > 0) {
            
           }
           else{
              $insert=DB::select("INSERT INTO `dpdc2s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41  and PV_VALUE > 0 and month(LOG_DATE_TIME)='". $month2."' and year(LOG_DATE_TIME)='".$year."' AND `STATION_ID` NOT IN (1,2,3,4,5,6) GROUP by STATION_ID");
              
            
         
          } 
     
              $update=DB::table('dpdcbills')
              ->where('dpdcbills.month','=',$month)
          ->join('dpdc2s as a', 'dpdcbills.unique_id', '=', 'a.unique_id')
          ->update(['dpdcbills.max'=>DB::raw('min1')]);
          $update1=DB::table('dpdcbills')
          ->where('month','=',$month)
          ->update(['value'=>DB::raw('max-min')]);
          $update=DB::table('dpdcbills')
          ->where('month','=',$month)
          ->join('stc_stations_1 as a', 'dpdcbills.StationId', '=', 'a.id')
          ->update(['dpdcbills.prev'=>DB::raw('a.previous')]);
          
          // dg start
       if (DB::table('d_g_s')
          ->where('month','=',$month)
          ->count() > 0) {
            
           }
           else{
              $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'".$month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=44   and month(LOG_DATE_TIME)='".$month."' and year(LOG_DATE_TIME)='".$year."'  GROUP by STATION_ID");
             
          }  
          if (DB::table('d_g2_s')
          ->where('month','=',$month2)
          ->count() > 0) {
            
           }
           else{
              $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'".$month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=44   and month(LOG_DATE_TIME)='".$month2."' and year(LOG_DATE_TIME)='".$year."'  GROUP by STATION_ID");
              
            
         
          } 
         $update=DB::table('dpdcbills')
          ->where('dpdcbills.month','=',$month)
          ->join('dpdc2s as a', 'dpdcbills.unique_id', '=', 'a.unique_id')
          ->update(['dpdcbills.max'=>DB::raw('min1')]);
          $update1=DB::table('dpdcbills')
          ->where('month','=',$month)
          ->update(['value'=>DB::raw('max-min')]);
          $update=DB::table('dpdcbills')
          ->where('month','=',$month)
          ->join('stc_stations_1 as a', 'dpdcbills.StationId', '=', 'a.id')
          ->update(['dpdcbills.prev'=>DB::raw('a.previous')]);

                  
          $update=DB::table('d_g_s')
         ->where('d_g_s.month','=',$month)
          ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
         ->update(['d_g_s.max'=>DB::raw('min1')]);
          
          $update=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['value'=>DB::raw('max-min')]);
        
// service start
             if (DB::table('services')
          ->where('month','=',$month)
         ->count() > 0) {
             
         }
         else{  $insert=DB::select("INSERT INTO `services`( `StationId`,`month` ,`year`, `unique_id`) SELECT ID,'". $month."','".$year."',CONCAT(ID,'". $month."','".$year."')FROM `stc_stations_1` WHERE `ID` NOT IN (1,2,3,4,5,6)");
            }
         $update=DB::table('services')
         ->where('month','=',$month)
         ->join('stc_stations_1 as a', 'services.StationId', '=', 'a.id')
         ->update(['services.value'=>DB::raw('a.service')]);

         $update=DB::table('services')
         ->where('services.month','=',$month)
          ->join('dpdcbills as a', 'services.unique_id', '=', 'a.unique_id')
          ->update(['services.value_2'=>DB::raw('a.value'),'services.prev'=>DB::raw('a.prev'),'services.max_2'=>DB::raw('a.max'),'services.min_2'=>DB::raw('a.min')]);

          $update=DB::table('services')
          ->where('services.month','=',$month)
              ->join('d_g_s as a', 'services.unique_id', '=', 'a.unique_id')
              ->update(['services.value_3'=>DB::raw('a.value')]);
              $unit_11=DB::table('d_g_s')
              ->where('month','=',$month)
              ->sum('value');
              $service_11=DB::table('resets')
              ->value('service');
              $unit_1=DB::table('resets')
              ->value('unit');
              if($unit>0){
           DB::table('services')
              ->where('month','=',$month)
              ->update(['unit_3'=>$service_11/$unit_11,'unit_2'=>$unit_1]);}
              else{
                DB::table('services')
                ->where('month','=',$month)
                ->update(['unit_3'=>0,'unit_2'=>$unit_1]);
              }
              $update=DB::table('services')
              ->where('services.month','=',$month)
              ->update(['total_col_2'=>DB::raw('value_2*unit_2'),'total_col_3'=>DB::raw('value_3*unit_3')]);

           
         
              
            
          
              $update=DB::table('services')
              ->where('services.month','=',$month)
              ->update(['total_col'=>DB::raw('total_col_2+total_col_3+prev+value')]);


           
              $emu=DB::table('services')
              ->where('month','=',$month)
              ->whereNotIn('StationId', [1,6])
              ->join('stc_stations_1', 'services.StationId', '=', 'stc_stations_1.id')
              ->get();
                      return view('admin.bill',compact('emu','month3','issue','newDate1','service','service_11','unit_11')); }     
         break;
    
         case 'shop_bill':
            $date1 = $request->input('date1');   
            $date2 = $request->input('date2');
            $newDate1 = date('d/m/Y', strtotime(' + 15 days')); 
            $current_month = date('m');
            $time=strtotime($date1);
            $month=date("m",$time);
            if($current_month== $month){
                return redirect ('admin/input_invalid');
            } else{
            $issue=date('d/m/Y');
        
       
            $month3=date("F",$time);
  
  
            $year=date("Y",$time);
           
            $unit=DB::table('resets')
            ->value('unit');
  
            $month2=$month+1;
      
            $year=date("Y",$time);
            if (DB::table('dpdcbills')
            ->where('month','=',$month)->count() > 0) {
              
             }
             else{
                $insert=DB::select("INSERT INTO `dpdcbills`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' AND `STATION_ID` NOT IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30) GROUP by STATION_ID");
               
            }  
            if (DB::table('dpdc2s')
            ->where('month','=',$month2)->count() > 0) {
              
             }
             else{
                $insert=DB::select("INSERT INTO `dpdc2s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month2 ."' and year(LOG_DATE_TIME)='".$year."' AND `STATION_ID` NOT IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30) GROUP by STATION_ID");
                
              
           
            } 
       
             $update=DB::table('dpdcbills')
            ->where('dpdcbills.month','=',$month)
            ->join('dpdc2s as a', 'dpdcbills.unique_id', '=', 'a.unique_id')
            ->update(['dpdcbills.max'=>DB::raw('min1')]);
            $update1=DB::table('dpdcbills')
            ->where('month','=',$month)
            ->update(['value'=>DB::raw('max-min')]);
            $update=DB::table('dpdcbills')
            ->where('month','=',$month)
            ->join('stc_stations_1 as a', 'dpdcbills.StationId', '=', 'a.id')
            ->update(['dpdcbills.prev'=>DB::raw('a.previous')]);
            
            // dg start
            if (DB::table('d_g_s')
            ->where('month','=',$month)
            ->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' AND `STATION_ID` NOT IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30) GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('d_g2_s')
            ->where('month','=',$month2)
           ->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month2."' and year(LOG_DATE_TIME)='".$year."' AND `STATION_ID` NOT IN (7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30) GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
            
            $update=DB::table('d_g_s')
            ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
        
            ->update(['d_g_s.max'=>DB::raw('min1')]);
            $update=DB::table('d_g_s')
            ->update(['value'=>DB::raw('max-min')]);
            $update=DB::table('d_g_s')
            ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
        
            ->update(['d_g_s.max'=>DB::raw('min1')]);
            $update=DB::table('d_g_s')
            ->update(['value'=>DB::raw('max-min')]);
           
  
  // service start
               if (DB::table('shop_details')
            ->where('month','=',$month)
           ->count() > 0) {
               
           }
           else{  $insert=DB::select("INSERT INTO `shop_details`( `serial`, `month` ,`year`, `unique_id`,`value`,`value_3`,`value_2`,`unit`,`level`) SELECT ID,'". $month."','".$year."',CONCAT(ID,'". $month."','".$year."'),service_fee,DG,DPDC,sq_unit,level_1 FROM `shops`");
        }
        
          $dpdc_1=DB::table('dpdcbills')
          ->where('month',$month)
          ->where('year',$year)
          ->where('StationId',1)
          ->value('value');
          $dpdc_2=DB::table('dpdcbills')
          ->where('month',$month)
          ->where('year',$year)
          ->where('StationId',2)
          ->value('value');
          $dpdc_3=DB::table('dpdcbills')
          ->where('month',$month)
          ->where('year',$year)
          ->where('StationId',3)
          ->value('value');
          if($dpdc_1<0){
           $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->where('level',1)
          ->update(['value_4'=> 0]);}
          else{

          $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->where('level',1)
          ->update(['value_4'=> $dpdc_1]);
           }
         if($dpdc_2<0){
           $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->where('level',2)
          ->update(['value_4'=> 0]);}
          else{

          $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->where('level',2)
          ->update(['value_4'=> $dpdc_2]);
           }
        if($dpdc_3<0){
           $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->where('level',3)
          ->update(['value_4'=> 0]);}
          else{

          $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->where('level',3)
          ->update(['value_4'=> $dpdc_3]);
           }


                 
           $emu=DB::table('shop_details')
          ->where('month',$month)
          ->where('year',$year)
          ->update(['value_4'=>DB::Raw('value_4*unit')]);
       
 
  //change
  $service=DB::table('resets')

  ->value('service');
  $unit_1=DB::table('resets')
  ->value('unit');
  if($unit>0){
DB::table('shop_details')
  ->where('month','=',$month)
  ->update(['unit_2'=>$unit_1]);}
  else{
    DB::table('shop_details')
    ->where('month','=',$month)
    ->update(['unit_3'=>0,'unit_2'=>$unit_1]);
  }
  
             
           
                
      
  $service_11=0;
  $unit_11=0;
             
                $emu=DB::table('shop_details')
                ->where('month','=',$month)
                ->join('shops', 'shop_details.serial', '=', 'shops.ID')
                ->get();
                return view('admin.bill_shop',compact('emu','month3','issue','newDate1','service','service_11','unit_11'));
            }     
                break;
    
           
        }
}

public function input(){
    $emu=0;
    return view('admin.input',compact('emu'));
}
public function input_invalid(){
    $emu=1;
    return view('admin.input',compact('emu'));
}
public function shop_detail(){

    $shops=DB::table('shops')
->get();
return view('admin.shop_detail',compact('shops'));
}
public function shop_edit($id){

    $shops=DB::table('shops')
    ->where('ID',$id)
->value('name');
$dg=DB::table('shops')
->where('ID',$id)
->value('DG');
$service=DB::table('shops')
->where('ID',$id)
->value('service_fee');
$dpdc=DB::table('shops')
->where('ID',$id)
->value('DPDC');
return view('admin.shop_edit',compact('shops','dg','service','id','dpdc'));
}
public function shopupdate(Request $request){
    $id = $request->input('id');
    
    $name = $request->input('name');

    $dg = $request->input('dg');
    $service = $request->input('service');
    $dpdc = $request->input('dpdc');
    $data=DB::table('shops')
    ->where('ID','=',  $id)
    ->update(['name'=> $name,'DG'=> $dg,'service_fee'=> $service,'DPDC'=>$dpdc]);
    $shops=DB::table('shops')
    ->get();
    return view('admin.shop_detail',compact('shops'));

}}