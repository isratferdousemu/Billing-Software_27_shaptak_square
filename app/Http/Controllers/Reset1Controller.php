<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Reset1Controller extends Controller
{
    public function bill_create(Request  $request){
          switch ($request->input('action')) {
           
              case 'All_bill':
                $date1 = $request->input('date1');   
                $date2 = $request->input('date2');
                $newDate1 = date('Y-m-d', strtotime(' + 15 days')); 
                $issue=date('Y-m-d');
                $time=strtotime($date1);
                $month=date("m",$time);
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
                    $insert=DB::select("INSERT INTO `dpdcbills`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ");
                   
                }  
                if (DB::table('dpdc2s')
                ->where('month','=',$month2)->count() > 0) {
                  
                 }
                 else{
                    $insert=DB::select("INSERT INTO `dpdc2s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month2 ."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID");
                    
                  
               
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
                    $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
                }  
                if (DB::table('d_g2_s')
                ->where('month','=',$month2)
               ->count() > 0) {
                
                }
                else{
                    $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month2."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
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
                $update=DB::table('d_g_s')
                ->where('month','=',$month)
                ->join('stc_stations_1 as a', 'd_g_s.StationId', '=', 'a.id')
                ->update(['d_g_s.demand'=>"0",'d_g_s.prev'=>DB::raw('a.vat')]);
// service start
                   if (DB::table('services')
                ->where('month','=',$month)
               ->count() > 0) {
                   
               }
               else{  $insert=DB::select("INSERT INTO `services`( `StationId`,`month` ,`year`, `unique_id`) SELECT ID,'". $month."','".$year."',CONCAT(ID,'". $month."','".$year."')FROM `stc_stations_1`");}
               $update=DB::table('services')
               ->where('month','=',$month)
               ->join('stc_stations_1 as a', 'services.StationId', '=', 'a.id')
               ->update(['services.value'=>DB::raw('a.service'),'services.prev'=>DB::raw('a.incremental')]);

               $update=DB::table('services')
               ->where('services.month','=',$month)
                ->join('dpdcbills as a', 'services.unique_id', '=', 'a.unique_id')
                ->update(['services.value_2'=>DB::raw('a.value'),'services.prev_2'=>DB::raw('a.prev'),'services.max_2'=>DB::raw('a.max'),'services.min_2'=>DB::raw('a.min')]);

                $update=DB::table('services')
                ->where('services.month','=',$month)
                    ->join('d_g_s as a', 'services.unique_id', '=', 'a.unique_id')
                    ->update(['services.value_3'=>DB::raw('a.value'),'services.prev_3'=>DB::raw('a.prev'),'services.max_3'=>DB::raw('a.max'),'services.min_3'=>DB::raw('a.min')]);
                    $unit=DB::table('d_g_s')
                    ->where('month','=',$month)
                  ->sum('value');
                    $service=DB::table('resets')
                    ->value('service');
                    $unit_1=DB::table('resets')
                    ->value('unit');
                    $hello=DB::table('services')
                    ->where('month','=',$month)
                    ->update(['unit_3'=>$service/$unit,'unit_2'=>$unit_1]);
                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->update(['total_col_2'=>DB::raw('value_2*unit_2'),'total_col_3'=>DB::raw('value_3*unit_3')]);

                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->update(['current_dues'=>DB::raw('value+total_col_2+total_col_3')]);
                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->update(['vat_col'=>DB::raw('current_dues*5/100')]);
                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->update(['unit'=>DB::raw('prev+prev_2+prev_3')]);
                    
                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->where('unit','>',0)
                    ->update(['late'=>DB::raw('((current_dues+vat_col+prev+prev_2+prev_3)*10)/100')]);

                
                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->update(['total_col'=>DB::raw('current_dues+vat_col+prev+prev_2+prev_3')]);

                    $update=DB::table('services')
                    ->where('services.month','=',$month)
                    ->update(['total2_col'=>DB::raw('current_dues+vat_col+prev+prev_2+prev_3+late')]);
                    $emu=DB::table('services')
                    ->where('month','=',$month)
                    ->join('stc_stations_1', 'services.StationId', '=', 'stc_stations_1.id')
                    ->get();
                            return view('admin.dpdc',compact('emu','month3','issue','newDate1'));      
               break;
          
               case 'single_bill':
                $unit=DB::table('resets')
                ->value('unit');
                $issue=date('Y-m-d');
                $meter = $request->input('meter');  
                $date1 = $request->input('date1');   
                $date2 = $request->input('date2');
                $newDate1 = date('Y-m-d', strtotime(' + 15 days')); 
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
                    $insert=DB::select("INSERT INTO `dpdcbills`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME))) FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'and  STATION_ID='". $meter."' and STATION_ID<30 GROUP by STATION_ID ,LOG_DATE_TIME");
                }  
                if (DB::table('dpdc2s')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)->count() > 0) {
                  
                 }
                 else{
                    $insert=DB::select("INSERT INTO `dpdc2s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,max(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' and  STATION_ID='". $meter."'  and STATION_ID<30 GROUP by STATION_ID ,LOG_DATE_TIME");
                } 
                 
              
                    $update=DB::table('dpdcbills')
                ->where('dpdcbills.month','=',$month)
                ->where('dpdcbills.StationId','=',$meter)
                ->join('dpdc2s as a', 'dpdcbills.unique_id', '=', 'a.unique_id')
                ->update(['dpdcbills.max'=>DB::raw('min1')]);
                $update=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->join('stc_stations_1 as a', 'dpdcbills.StationId', '=', 'a.id')
                ->update(['dpdcbills.demand'=>DB::raw('a.demand_charge'),'dpdcbills.prev'=>DB::raw('a.previous')]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['unit'=>$unit]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['value'=>DB::raw('max-min')]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['total_col'=>DB::raw('value*unit')]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['current'=>DB::raw('total_col+demand')]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['vat_col'=>DB::raw('(current*5)/100')]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['total1_col'=>DB::raw('current+prev+vat_col')]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->where('prev','>',0)
                ->update(['late'=>DB::raw('(total1_col*5)/100')]);
              
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->where('prev','=',0)
                ->update(['late'=>0]);
                $update1=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->update(['total2_col'=>DB::raw('total1_col+late')]);
                $emu=DB::table('dpdcbills')
                ->where('month','=',$month)
                ->where('StationId','=',$meter)
                ->join('stc_stations_1', 'dpdcbills.StationId', '=', 'stc_stations_1.id')
                ->get();
          
            return view('admin.dpdc',compact('emu','unit','month3','issue','newDate1'));
                      break;
          
                 
              }
        
            }  
            
public function bill_create_1(Request  $request){
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
            if (DB::table('d_g_s')
            ->where('month','=',$month)
            ->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('d_g2_s')
            ->where('month','=',$month)
           ->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=41 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."'GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
            
            $update=DB::table('d_g_s')
            ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
        
            ->update(['d_g_s.max'=>DB::raw('min1')]);
            $update=DB::table('d_g_s')
            ->update(['value'=>DB::raw('max-min')]);
            $update=DB::table('d_g_s')
            ->where('month','=',$month)
            ->join('stc_stations_1 as a', 'd_g_s.StationId', '=', 'a.id')
            ->update(['d_g_s.demand'=>"0",'d_g_s.prev'=>DB::raw('a.vat')]);
           
            $unit=DB::table('d_g_s')
            ->where('month','=',$month)
          ->sum('value');
          if($unit==0){
             $unit=1; 
          }
          $service=DB::table('resets')
          ->value('service');
          $hello=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['unit'=>$service/$unit]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['total_col'=>DB::raw('value*unit')]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['current'=>DB::raw('total_col+demand')]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['vat_col'=>DB::raw('(current*5)/100')]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['total1_col'=>DB::raw('current+prev+vat_col')]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->where('prev','>',0)
          ->update(['late'=>DB::raw('(total1_col*5)/100')]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->where('prev','=',0)
          ->update(['late'=>0]);
          $update1=DB::table('d_g_s')
          ->where('month','=',$month)
          ->update(['total2_col'=>DB::raw('total1_col+late')]);
          $emu=DB::table('d_g_s')
          ->join('stc_stations_1', 'd_g_s.StationId', '=', 'stc_stations_1.id')
          ->where('month','=',$month)
          ->get();
            $issue=date('Y-m-d'); 
        return view('admin.dg',compact('emu','unit','month3','issue','newDate1','service','unit'));
  
  break;
  case 'single_bill':
        
            $meter = $request->input('meter');  
            $date1 = $request->input('date1');   
            $date2 = $request->input('date2');
            $newDate1 = date('Y-m-d', strtotime(' + 15 days')); 
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
                $insert=DB::select("INSERT INTO `d_g_s`( `StationId`,`month` ,`year`, `min`,time1,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME))) FROM `arc_pv_history_new` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' and  STATION_ID='". $meter."' GROUP by STATION_ID ,LOG_DATE_TIME");
            }  
            if (DB::table('d_g2_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)->count() > 0) {
            
            }
            else{
                $insert=DB::select("INSERT INTO `d_g2_s`( `StationId`,`month` ,`year`, `min1`,time2,unique_id) SELECT STATION_ID,month(min(LOG_DATE_TIME)),year(min(LOG_DATE_TIME)),PV_VALUE,min(LOG_DATE_TIME),CONCAT(STATION_ID,'". $month."','".$year."') FROM `arc_pv_history_new` WHERE PV_Category_ID=44 and month(LOG_DATE_TIME)='". $month."' and year(LOG_DATE_TIME)='".$year."' and  STATION_ID='". $meter."' GROUP by STATION_ID ,LOG_DATE_TIME");
            } 
            
            $update=DB::table('d_g_s')
            ->where('d_g_s.StationId','=',$meter)
            ->join('d_g2_s as a', 'd_g_s.unique_id', '=', 'a.unique_id')
        
            ->update(['d_g_s.max'=>DB::raw('min1')]);
            $update=DB::table('d_g_s')
            ->update(['value'=>DB::raw('max-min')]);
            $update=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->join('stc_stations_1 as a', 'd_g_s.StationId', '=', 'a.id')
            ->update(['d_g_s.demand'=>"0",'d_g_s.prev'=>DB::raw('a.vat')]);

            $unit=DB::table('d_g_s')
            ->sum('value');
            if($unit==0){
               $unit=1; 
            }
            $service=DB::table('resets')
            ->value('service');
            $hello=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->update(['unit'=>$service/$unit]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->update(['total_col'=>DB::raw('value*unit')]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->update(['current'=>DB::raw('total_col+demand')]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->update(['vat_col'=>DB::raw('(current*5)/100')]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->update(['total1_col'=>DB::raw('current+prev+vat_col')]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->where('prev','>',0)
            ->update(['late'=>DB::raw('(total1_col*5)/100')]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->where('prev','=',0)
            ->update(['late'=>0]);
            $update1=DB::table('d_g_s')
            ->where('month','=',$month)
            ->where('StationId','=',$meter)
            ->update(['total2_col'=>DB::raw('total1_col+late')]);


            $issue=date('Y-m-d'); 
            $emu=DB::table('d_g_s')
            ->where('d_g_s.StationId','=',$meter)
            ->join('stc_stations_1', 'd_g_s.StationId', '=', 'stc_stations_1.id')
            ->where('month','=',$month)
            ->get();
        return view('admin.dg',compact('emu','unit','month3','issue','newDate1','service','unit'));
  
  break; 
}

}  
public function service(){
return view('admin.input_3');
}  
public function service_charge(Request $request){
    $date1 = $request->input('date1');   
    $date2 = $request->input('date2');
    
    $time=strtotime($date1);
    $month=date("m",$time);
    $year=date("Y",$time);
    $month3=date("F",$time);
    $issue=date('Y-m-d'); 
    $newDate1 = date('Y-m-d', strtotime(' + 15 days')); 
    if (DB::table('services')
            ->where('month','=',$month)
           ->count() > 0) {
               
           }
           else{  $insert=DB::select("INSERT INTO `services`( `StationId`,`month` ,`year`, `unique_id`) SELECT ID,'". $month."','".$year."',CONCAT(ID,'". $month."','".$year."')FROM `stc_stations_1`");}
           $update=DB::table('services')
           ->where('month','=',$month)
           ->join('stc_stations_1 as a', 'services.StationId', '=', 'a.id')
           ->update(['services.value'=>DB::raw('a.service'),'services.prev'=>DB::raw('a.incremental')]);
             $update1=DB::table('services')
            ->where('month','=',$month)
            ->where('prev','>',0)
            ->update(['late'=>DB::raw('(value*5)/100')]);
            $update1=DB::table('services')
            ->where('month','=',$month)
        
            ->where('prev','=',0)
            ->update(['late'=>0]);
            $update1=DB::table('services')
            ->where('month','=',$month)
           
            ->update(['total2_col'=>DB::raw('value+prev+late')]);
    $emu=DB::table('services')
    ->join('stc_stations_1', 'services.StationId', '=', 'stc_stations_1.id')
    ->get();
    return view('admin.service',compact('emu','issue','newDate1','month3'));
    
    }   

}
