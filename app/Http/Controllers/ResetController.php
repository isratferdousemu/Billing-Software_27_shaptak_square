<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ResetController extends Controller
{
    
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


$vln_a=DB::table('dyn_pv_register')
->where('PV_ID','=',3004)
->Value('PV_Value');
$vll_a=DB::table('dyn_pv_register')
->where('PV_ID','=',3007)
->Value('PV_VALUE');
$ia=DB::table('dyn_pv_register')
->where('PV_ID','=',3010)
->Value('PV_VALUE');
$sa=DB::table('dyn_pv_register')
->where('PV_ID','=',3013)
->Value('PV_VALUE');
$pa=DB::table('dyn_pv_register')
->where('PV_ID','=',3016)
->Value('PV_VALUE');
$pf_a=DB::table('dyn_pv_register')
->where('PV_ID','=',3022)
->Value('PV_VALUE');
$lf=DB::table('dyn_pv_register')
->where('PV_ID','=',3031)
->Value('PV_VALUE');
$rea=DB::table('dyn_pv_register')
->where('PV_ID','=',3019)
->Value('PV_VALUE');

$vln_c=DB::table('dyn_pv_register')
->where('PV_ID','=',3006)
->Value('PV_Value');
$vll_c=DB::table('dyn_pv_register')
->where('PV_ID','=',3009)
->Value('PV_VALUE');
$ic=DB::table('dyn_pv_register')
->where('PV_ID','=',3012)
->Value('PV_VALUE');
$sc=DB::table('dyn_pv_register')
->where('PV_ID','=',3015)
->Value('PV_VALUE');
$pc=DB::table('dyn_pv_register')
->where('PV_ID','=',3018)
->Value('PV_VALUE');
$pf_c=DB::table('dyn_pv_register')
->where('PV_ID','=',3024)
->Value('PV_VALUE');
$lf=DB::table('dyn_pv_register')
->where('PV_ID','=',3031)
->Value('PV_VALUE');
$rec=DB::table('dyn_pv_register')
->where('PV_ID','=',3021)
->Value('PV_VALUE');
$vln_b=DB::table('dyn_pv_register')
->where('PV_ID','=',3005)
->Value('PV_Value');
$vll_b=DB::table('dyn_pv_register')
->where('PV_ID','=',3008)
->Value('PV_VALUE');
$ib=DB::table('dyn_pv_register')
->where('PV_ID','=',3011)
->Value('PV_VALUE');
$sb=DB::table('dyn_pv_register')
->where('PV_ID','=',3014)
->Value('PV_VALUE');
$pb=DB::table('dyn_pv_register')
->where('PV_ID','=',3017)
->Value('PV_VALUE');
$pf_b=DB::table('dyn_pv_register')
->where('PV_ID','=',3023)
->Value('PV_VALUE');
$lf=DB::table('dyn_pv_register')
->where('PV_ID','=',3031)
->Value('PV_VALUE');
$reb=DB::table('dyn_pv_register')
->where('PV_ID','=',3020)
->Value('PV_VALUE');




    return view('admin.mother',compact('vln_a','vll_a','ia','sa','pa','pf_a','lf','rea','vln_b','vll_b','ib','sb','pb','pf_b','lf','reb','vln_c','vll_c','ic','sc','pc','pf_c','lf','rec'));
}
public function input(){
    return view('admin.input');
}
public function input_1(){
    return view('admin.input_1');
}
public function bill_create(Request  $request){
    switch ($request->input('action')) {
        case 'All_bill':
            $date1 = $request->input('date1');   
            $date2 = $request->input('date2');
            $newDate1 = date('Y-m-d', strtotime(' + 15 days')); 
          
            $time=strtotime($date1);
            $month=date("m",$time);
            $month3=date("F",$time);
           
          

            $month2=$month+1;
            $year=date("Y",$time);
            if (DB::table('dpdcbills')
            ->where('month','=',$month)->count() > 0) {
              
             }
             else{
                $insert=DB::select("INSERT INTO `dpdcbills`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME))) FROM `dyn_pv_register` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('dpdc2s')
            ->where('month','=',$month)->count() > 0) {
              
             }
             else{
                $insert=DB::select("INSERT INTO `dpdc2s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `dyn_pv_register` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
             
            $update=DB::table('dpdcbills')
            ->join('dpdc2s as a', 'dpdcbills.unique_id', '=', 'a.unique_id')
           
            ->update(['dpdcbills.max'=>DB::raw('min1')]);
            $update=DB::table('dpdcbills')
            ->update(['value'=>DB::raw('max-min')]);
            $emu=DB::table('dpdcbills')
            ->join('stc_stations_1', 'dpdcbills.StationId', '=', 'stc_stations_1.id')
            ->where('month','=',$month)
            ->get();
            $unit=DB::table('resets')
            ->value('unit');
            $issue=date('Y-m-d'); 
        return view('admin.dpdc',compact('emu','unit','month3','issue','newDate1'));
    
           break;
      
           case 'single_bill':
              
            $meter = $request->input('meter');  
            $date1 = $request->input('date1');   
            $date2 = $request->input('date2');
            $newDate = date('Y-m-d', strtotime($date1. ' + 1 months')); 
            $newDate1 = date('l jS \of F Y', strtotime($date1. ' + 30days')); 
            $time=strtotime($date1);
            $month=date("m",$time);
            $month3=date("F",$time);
        
            $month2=$month+1;
            $year=date("Y",$time);
            if (DB::table('dpdcbills')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->count() > 0) {
              
             }
             else{
                $insert=DB::select("INSERT INTO `dpdcbills`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME))) FROM `dyn_pv_register` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'and  STATION_ID='". $meter."'  GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('dpdc2s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)->count() > 0) {
              
             }
             else{
                $insert=DB::select("INSERT INTO `dpdc2s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `dyn_pv_register` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' and  STATION_ID='". $meter."'GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
             
            $update=DB::table('dpdcbills')
            ->where('dpdcbills.StationId','=',$meter)
            ->join('dpdc2s as a', 'dpdcbills.unique_id', '=', 'a.unique_id')
           
            ->update(['dpdcbills.max'=>DB::raw('min1')]);
            $update=DB::table('dpdcbills')
            ->where('StationId','=',$meter)
            ->update(['value'=>DB::raw('max-min')]);
            $emu=DB::table('dpdcbills')
            ->where('StationId','=',$meter)
            ->join('stc_stations_1', 'dpdcbills.StationId', '=', 'stc_stations_1.id')
            ->where('month','=',$month)
            ->get();
            $unit=DB::table('resets')
            ->value('unit');
            $issue=date('Y-m-d'); 
        return view('admin.dpdc',compact('emu','unit','month3','issue','newDate1'));
                  break;
      
             
          }
    
  
   
}

public function bill_create_1(Request  $request){
    switch ($request->input('action')) {
        case 'All_bill':
            $date1 = $request->input('date1');   
            $date2 = $request->input('date2');
            $newDate = date('Y-m-d', strtotime($date1. ' + 1 months')); 
            $newDate1 = date('l jS \of F Y', strtotime($date1. ' + 30days')); 
            $time=strtotime($date1);
            $month=date("m",$time);
            $month3=date("F",$time);

            $month2=$month+1;
            $year=date("Y",$time);
            if (DB::table('d_g_s')
            ->where('month','=',$month)
            ->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME))) FROM `dyn_pv_register` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('d_g2_s')
            ->where('month','=',$month)
           ->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `dyn_pv_register` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
            
            $update=DB::table('d_g_s')
            ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
        
            ->update(['d_g_s.max'=>DB::raw('min1')]);
            $update=DB::table('d_g_s')
            ->update(['value'=>DB::raw('max-min')]);
            $emu=DB::table('d_g_s')
            ->join('stc_stations_1', 'd_g_s.StationId', '=', 'stc_stations_1.id')
            ->where('month','=',$month)
            ->get();
            $unit=DB::table('resets')
            ->value('unit');
            $issue=date('Y-m-d'); 
        return view('admin.dg',compact('emu','unit','month3','issue','newDate1'));
  
  break;
  case 'single_bill':
        
            $meter = $request->input('meter');  
            $date1 = $request->input('date1');   
            $date2 = $request->input('date2');
            $newDate = date('Y-m-d', strtotime($date1. ' + 1 months')); 
            $newDate1 = date('l jS \of F Y', strtotime($date1. ' + 30days')); 
            $time=strtotime($date1);
            $month=date("m",$time);
            $month3=date("F",$time);

            $month2=$month+1;
            $year=date("Y",$time);
            if (DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME))) FROM `dyn_pv_register` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' and  STATION_ID='". $meter."' GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('d_g2_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `dyn_pv_register` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' and  STATION_ID='". $meter."' GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
            
            $update=DB::table('d_g_s')
            ->where('d_g_s.StationId','=',$meter)
            ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
        
            ->update(['d_g_s.max'=>DB::raw('min1')]);
            $update=DB::table('d_g_s')
            ->update(['value'=>DB::raw('max-min')]);
            $emu=DB::table('d_g_s')
            ->where('d_g_s.StationId','=',$meter)
            ->join('stc_stations_1', 'd_g_s.StationId', '=', 'stc_stations_1.id')
            ->where('month','=',$month)
            ->get();
            $unit=DB::table('resets')
            ->value('unit');
            $issue=date('Y-m-d'); 
        return view('admin.dg',compact('emu','unit','month3','issue','newDate1'));
  break; 
}

}

       
}
