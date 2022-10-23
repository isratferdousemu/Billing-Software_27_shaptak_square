<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Redirect;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
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
$meter_2=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',205)
->Value('CONFIG_VALUE');
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
$meter_3=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',305)
->Value('CONFIG_VALUE');
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
$meter_4=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',405)
->Value('CONFIG_VALUE');
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
$meter_5=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',505)
->Value('CONFIG_VALUE');
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
$meter_6=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',605)
->Value('CONFIG_VALUE');
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
    public function customer_1(Request $request)
    {
        $config_id = $request->input('customer');
        $data=DB::table('stc_configuration_register')
        ->where('CONFIG_ID','=',  $config_id)
        ->first();
       
 return view('admin.customer_edit',compact('data','config_id'));
        
    }
    public function customerupdate(Request $request){
        $config_id = $request->input('config_id');
        $config_value = $request->input('config_value');
        $explanation = $request->input('explanation');
        $data=DB::table('stc_configuration_register')
        ->where('CONFIG_ID','=',  $config_id)
        ->update(['CONFIG_VALUE'=> $config_value,'EXPLANATION'=>$explanation]);
        
        return view('admin.dashboard');

}
public function level_2()
{
$meter_7=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',705)
->Value('CONFIG_VALUE');
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
$meter_8=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',805)
->Value('CONFIG_VALUE');
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
$meter_10=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1005)
->Value('CONFIG_VALUE');
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
$meter_11=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1105)
->Value('CONFIG_VALUE');
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
$meter_13=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1305)
->Value('CONFIG_VALUE');
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
$meter_12=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1205)
->Value('CONFIG_VALUE');
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

$meter_9=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',905)
->Value('CONFIG_VALUE');
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
$meter_14=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1405)
->Value('CONFIG_VALUE');
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
$meter_15=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1505)
->Value('CONFIG_VALUE');
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
$meter_16=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1605)
->Value('CONFIG_VALUE');
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
$meter_17=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1705)
->Value('CONFIG_VALUE');
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
$meter_18=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1805)
->Value('CONFIG_VALUE');
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
$meter_19=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',1905)
->Value('CONFIG_VALUE');
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
$meter_20=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2005)
->Value('CONFIG_VALUE');
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
$meter_21=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2105)
->Value('CONFIG_VALUE');
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
$meter_22=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2205)
->Value('CONFIG_VALUE');
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
$meter_23=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2305)
->Value('CONFIG_VALUE');
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
$meter_24=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2405)
->Value('CONFIG_VALUE');
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
$meter_25=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2505)
->Value('CONFIG_VALUE');
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
$meter_26=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2605)
->Value('CONFIG_VALUE');
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
$meter_27=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2705)
->Value('CONFIG_VALUE');
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
$meter_28=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2805)
->Value('CONFIG_VALUE');
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
$meter_29=DB::table('stc_configuration_register')
->where('CONFIG_ID','=',2905)
->Value('CONFIG_VALUE');
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
public function dpdc(){
    return view('admin.dpdc');
}
public function dg(){
    return view('admin.dg');
}

public function reset(){
    $data=DB::table('resets')
    ->Value('service');
    $data1=DB::table('resets')
    ->Value('unit');
    return view('admin.reset',compact('data','data1'));
}
public function resetupdate(Request $request){

    $service = $request->input('service');
    $unit = $request->input('unit');
    $data=DB::table('resets')
    ->where('id','=',1)
    ->update(['service'=>$service,'unit'=>$unit]);
 
    return redirect()->route('reset')->with('message', 'Update !');
}
public function mother()
{

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



    return view('admin.mother',compact('meter_30','power_30','pf_30','dpdc_30','dg_30'));
}
}