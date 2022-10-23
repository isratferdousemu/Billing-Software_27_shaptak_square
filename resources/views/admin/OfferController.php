<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sys_document_type;
use App\Models\Dyn_execution;
use App\Models\Sys_business_vertical;
use App\Models\Sys_location_type;
use App\Models\Stc_new_client;
use App\Models\Stc_new_address;
use App\Models\Dyn_lead;
use App\Models\Stc_contact_person;
use App\Models\Lnk_location_list;
use App\Models\Lnk_contact_list;
use App\Models\Sys_new_type;
use App\Models\Sys_new_state;
use App\Models\Stc_human_resouce;
use App\Models\Dyn_lead_change;
use App\Models\Dyn_attachment;

use Illuminate\Support\Facades\Input;
use DB;


use Carbon\Carbon;

Use Redirect;


class OfferController extends Controller
{
  
      public function subCat(Request $request)
    {
         
        $parent_id = $request->cat_id;
         
        $subcategories = Stc_Client::where('id',$parent_id)
                              ->with('stc_addresses')
                              ->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

public function document_type(){
 
    return view('document_type');
  
}
public function store_document_type(Request $request) {

    // Form validation
  

    //  Store data in database
    Sys_document_type ::create($request->all());

    // 
    return back()->with('message', ' New Contact Added');
}
public function dyn_leads (){
    $units=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients', 'stc_new_clients.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')

    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','stc_new_clients.Name as Client','a.Name as SalesPerson')
 
    ->get();
    $date=date('d F, Y l  H:i:s A',strtotime('+6 hours'));
    $sum=Dyn_lead::sum('value');

 return view('admin.dyn_leads',compact('units','date','sum'));
}
public function dyn_leads_detail($state){
    $units=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')
    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
    ->where('dyn_leads.id',"=",$state)
    ->get();
 
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
   
   $state_name=Dyn_lead::where('id',$state)
   ->value('State');
  
   $dyn=Dyn_execution::where('id',$state)->get();
    // get previous user id
    $previous_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate')->where('dyn_leads.State', $state_name)->where('dyn_leads.id', '<', $state)->max('dyn_leads.id');
    $next_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate')->where('dyn_leads.State', $state_name)->where('dyn_leads.id', '>', $state)->min('dyn_leads.id');
    $previous=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')

    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
 
    ->where('dyn_leads.id',"=",$previous_1)
    ->get();
    
    $next=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')
    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
 
    ->where('dyn_leads.id',"=",$next_1)
    ->get();
    $log=Dyn_lead_change::where('LeadId',"=",$state)
    ->whereIN('ChangedColumn',['1'])
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column')
    ->get();

    $log_2=Dyn_lead_change::where('LeadId',"=",$state)
    ->where('ChangedColumn',2)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('stc_new_clients as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('stc_new_clients as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_3=Dyn_lead_change::where('LeadId',"=",$state)
    ->where('ChangedColumn',3)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('sys_new_types as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('sys_new_types as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_4=Dyn_lead_change::where('LeadId',"=",$state)
    ->where('ChangedColumn',4)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('sys_new_states as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('sys_new_states as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_5=Dyn_lead_change::where('LeadId',"=",$state)
    ->where('ChangedColumn',5)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('stc_human_resouces as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('stc_human_resouces as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_6=Dyn_lead_change::where('LeadId',"=",$state)
    ->where('ChangedColumn',"=",8)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column')
    ->get();
    $document=Dyn_attachment::where('LeadId',$state)
    ->join('sys_document_types as a', 'a.id', '=', 'dyn_attachments.DocumentType')
    ->join('admins as b', 'b.id', '=', 'dyn_attachments.SalesPerson')

    ->get();
    
        return view('admin.dyn_leads_detail',compact('units','date','previous','next','log','log_2','log_3','log_4','log_5','document','log_6','dyn'));
    

}
public function area_chart(){
$sales = Dyn_execution::get();
$result[] = ['Year','PO Amount','Turnover Amount','CashflowPosition','Gross Margin'];
foreach ($sales as $key => $value) {
    $year = Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('Y');
    $result[++$key] = [$year, (int)$value->PO_Amount, (int)$value->TurnOver_Amount,(int)$value->CashFlowPositiont,(int)$value->GrossMargin];
}
  
return view('admin.area_chart')
    ->with('sales',json_encode($result));
}
public function client_info(){
    $business=Sys_business_vertical::all();
    $location_type=Sys_location_type::all();
    $emu=Stc_new_client::join('sys_business_verticals', 'stc_new_clients.VerticalId', '=', 'sys_business_verticals.id')
    ->select('sys_business_verticals.Name as vertical','stc_new_clients.*')
    ->orderby('stc_new_clients.id')
    ->get();
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    return view('admin.Client_info',compact('date','business','location_type','emu'));
}
public function store_client(Request $request){

  Stc_new_client ::create($request->all());
Stc_new_address ::create($request->all());
$LocationType=$request->input('LocationType');
$Name=$request->input('Name');
 $VerticalId=$request->input('VerticalId');
 $WebSite=$request->input('WebSite');

$House_Line=$request->input('House_Line');

$Street_Line=$request->input('Street_Line');

$Area_Line=$request->input('Area_Line');
$PersonName=$request->input('PersonName');
$Phone_Cell=$request->input('Phone_Cell');
$Phone_Cell2=$request->input('Phone_Cell2');
$Phone_Cell3=$request->input('Phone_Cell3');
$Phone_Extension=$request->input('Phone_Extension');
$Designation=$request->input('Designation');

$Email=$request->input('Email');

$update=Stc_new_client::where('Name','=',$Name)
->where('VerticalId','=',$VerticalId)
->where('WebSite','=',$WebSite)
->value('id');
$id=Stc_new_address::where('House_Line','=',$House_Line)
->where('Street_Line','=',$Street_Line)
->where('Area_Line','=',$Area_Line)
->value('id');


$insert=Lnk_location_list::insert(['ClientId'=>$update,'LocationType'=>$LocationType,'AddressId'=>$id]);
$insert=Stc_contact_person::insert(['PersonName'=>$PersonName,'Designation'=>$Designation,'Phone_Cell'=>$Phone_Cell,'Phone_Cell2'=>$Phone_Cell2,'Phone_Cell3'=>$Phone_Cell3,'Phone_Extension'=>$Phone_Extension,'Email'=>$Email]);
$ContactPersonId=Stc_contact_person::where('PersonName','=',$PersonName)
->where('Designation','=',$Designation)
->where('Phone_Cell','=',$Phone_Cell)
->where('Email','=',$Email)
->value('id');
$insert=Lnk_contact_list::insert(['ClientId'=>$update,'ContactPersonId'=>$ContactPersonId]);
    return back()->with('message', ' New Client Added');

}
public function leads()
{
   $human=Stc_human_resouce::all();
    $clients=Stc_new_client::all();
    $types=Sys_new_type::all();
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    return view('admin.leads',compact('date','clients','types','human'));
   

}
public function lead_store(Request $request){
    $mytime = Carbon::now()->format('Y-m-d ');
    $values = array(
        'Name' => $request->input('Name'),
        'Type' => $request->input('Type'),
        'State' => $request->input('State'),
        'value' => $request->input('value'),
        'StateStartDate' => $mytime,
        'Client' => $request->input('Client'),
        'SalesPerson' => $request->input('SalesPerson')
  
     
   
    );
    Dyn_lead::create($values);
    return back()->with('message', ' New lead Added');
}
public function edit_dyn_lead($state,$day,$include,$id){
    $state=Sys_new_state::all();
    $human=Stc_human_resouce::all();
    $clients=Stc_new_client::all();
    $types=Sys_new_type::all();
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    $data=Dyn_lead::find($id);
   return view('admin.edit_leads',compact('date','data','clients','types','human','state'));

}
public function edit_dyn_lead_with($id){
    $state=Sys_new_state::all();
    $human=Stc_human_resouce::all();
    $clients=Stc_new_client::all();
    $types=Sys_new_type::all();
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    $data=Dyn_lead::find($id);
   return view('admin.edit_leads',compact('date','data','clients','types','human','state'));

}
public function edit_dyn_lead_with_1($state,$day,$include,$from,$to,$id){
    $state=Sys_new_state::all();
    $human=Stc_human_resouce::all();
    $clients=Stc_new_client::all();
    $types=Sys_new_type::all();
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    $data=Dyn_lead::find($id);
   return view('admin.edit_leads',compact('date','data','clients','types','human','state'));

}
public function lead_update(Request $request){


    $mytime =date('Y-m-d H:i:s',strtotime('+6 hours'));
    $mytime_1 =date('Y-m-d');
    $id=$request->input('id');
    $state=$request->input('id');
    $Client=$request->input('Client');
    $State=$request->input('State');
    $Name=$request->input('Name');
    $Type=$request->input('Type');
    $value=$request->input('value');
    $SalesPerson=$request->input('SalesPerson');

    $Authority=$request->input('Authority');
    $emu=Dyn_lead::where('id', $id)
    ->get();

    foreach($emu as $user)
{
    if($user->Name != $Name)
    {
        $update= Dyn_lead::where('id', $id)
        ->update(['Name'=>$Name]);
        $values = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>1,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->Name,
            'NewValue' =>$Name
        
         
       
        );
        Dyn_lead_change::create($values);
      
    }
    if($user->value != $value)
    {
        $update= Dyn_lead::where('id', $id)
        ->update(['value'=>$value]);
        $values = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>8,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->value,
            'NewValue' =>$value
        
         
       
        );
        Dyn_lead_change::create($values);
      
    }
    if($user->Client != $Client)
    {
        $update= Dyn_lead::where('id', $id)
        ->update(['Client'=>$Client]);
        $values = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>2,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->Client,
            'NewValue' =>$Client
        
         
       
        );
        Dyn_lead_change::create($values);
      
    }
    if($user->Type != $Type)
    {
        $update= Dyn_lead::where('id', $id)
        ->update(['Type'=>$Type]);
        $values = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>3,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->Type,
            'NewValue' =>$Type
        
         
       
        );
        Dyn_lead_change::create($values);
      
    }
    if($user->State != $State)
    {
        $update= Dyn_lead::where('id', $id)
        ->update(['State'=>$State,'StateStartDate'=>
        $mytime]);
        $values = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>4,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->State,
            'NewValue' =>$State
        
         
       
        );
        Dyn_lead_change::create($values);
        $values_1 = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>7,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->StateStartDate,
            'NewValue' =>$mytime_1
        
         
       
        );
        Dyn_lead_change::create($values_1);
      
    }
    if($user->SalesPerson != $SalesPerson)
    {
        $update= Dyn_lead::where('id', $id)
        ->update(['SalesPerson'=>$SalesPerson]);
        $values = array(
            'LeadId' =>$id,
            'ChangeDate' => $mytime,
            'ChangedColumn' =>5,
            'SalesPerson' => $Authority,
            'OldValue' =>$user->SalesPerson,
            'NewValue' =>$SalesPerson
        
       
       
        );
        Dyn_lead_change::create($values);
      
    }
   
   

    
   
   
    }
    
    return redirect()->route('dyn_leads_detail',$state);
}


 public function attachment($State,$day,$include,$id){
   $attach= Sys_document_type::all();
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    return View('admin.attachment',compact('date','attach','id'));

    
 } 
 public function attachment_with_1($State,$day,$include,$from,$to,$id){
    $attach= Sys_document_type::all();
     $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
     return View('admin.attachment',compact('date','attach','id'));
 
     
  } 
 public function attachment_with($id){
    $attach= Sys_document_type::all();
     $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
     return View('admin.attachment',compact('date','attach','id'));
 
     
  } 

 public function store_attachment(Request $request){

$mytime =date('Y-m-d H:i:s',strtotime('+6 hours'));
 $imagename="";
 $path="";
 $imgsizes ="";
 $filename ="";
 if($request->Document){
 $imagename= time().'.'.$request->Document->getClientOriginalExtension();
 $path=$request->Document->move(public_path('Documents'),$imagename);
 $filename = $request->Document->getClientOriginalName();
 $imgsizes = $path->getSize();
 }

 $Authority=$request->input('Authority');
 $state=$request->input('id');
 $Add= new Dyn_attachment();
 $Add->LeadId=$request->id;
 $Add->DocumentType=$request->DocumentType;
 $Add->Document=$imagename;
 $Add->DocumentSize=$imgsizes;
 $Add->DocumentName=$filename;
 $Add->SalesPerson= $Authority;
 $Add->AttachmentDate=$mytime ;
 
 $Add->save();
 return redirect()->route('dyn_leads_detail',$state);
}
public function emu_log(){
    return view('admin.emu_log');
}
public function dashboard(){
       
    	$from= trim(' ');
          
    	$to = trim(' ');
    
    $units=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->whereNotIn('dyn_leads.Type',[8,8])
    ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*90))
    ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_leads.value) as sum'),'sys_new_states.id',DB::raw('sys_new_states.Name as State'))
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
     ->get();
     $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
     $include=2;
     $pieChart = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
     ->whereNotIn('dyn_leads.Type',[8,8])
     ->select(DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_leads.value) as sum'),'sys_new_states.id',DB::raw('sys_new_states.Name as State'))     
     ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*90))
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
      ->get();
     $grand_total=Dyn_lead::where("StateStartDate",">",date("Y-m-d",time()-3600*24*90))
     ->whereNotIn('dyn_leads.Type',[8,8])
     ->count('dyn_leads.id');
     $grand_summary=Dyn_lead::where("StateStartDate",">",date("Y-m-d",time()-3600*24*90))
     ->whereNotIn('dyn_leads.Type',[8,8])
     ->sum('dyn_leads.value');
     $days=90;
 return view('admin.dashboard',compact('units','include','pieChart','date','grand_total','grand_summary','days','from','to'));

}
public function state ($state,$days,$include){

if($include==1){

  
   

            $units= Dyn_lead::join('stc_new_clients', 'stc_new_clients.id', '=', 'dyn_leads.Client')
            ->join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
            ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
            ->where('sys_new_states.id',"=",$state)
            ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))

            ->select('dyn_leads.*','sys_new_types.Name as T_Name','sys_new_states.Name as S_Name','stc_new_clients.Name as C_Name')
        
            ->orderby('dyn_leads.StateStartDate','ASC')
            ->get();
            $date=date('d F, Y l  H:i:s A',strtotime('+6 hours'));
            $sum=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
            ->where('sys_new_states.id',"=",$state)
            ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
            ->sum('dyn_leads.value');
            $total=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
            ->where('sys_new_states.id',"=",$state)
            ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
            ->count('dyn_leads.State');
           return view('admin.states_all',compact('units','state','date','sum','total'));

        

}
else{


        $units= Dyn_lead::join('stc_new_clients', 'stc_new_clients.id', '=', 'dyn_leads.Client')
        ->join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
        ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
        ->where('sys_new_states.id',"=",$state)
        ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
        ->whereNotIn('dyn_leads.Type',[8,8])
        ->select('dyn_leads.*','sys_new_types.Name as T_Name','sys_new_states.Name as S_Name','stc_new_clients.Name as C_Name')
       
        ->orderby('dyn_leads.StateStartDate','ASC')
        ->get();
        $date=date('d F, Y l  H:i:s A',strtotime('+6 hours'));
        $sum=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
        ->where('sys_new_states.id',"=",$state)
        ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
        ->whereNotIn('dyn_leads.Type',[8,8])
        ->sum('dyn_leads.value');
        $total=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
        ->where('sys_new_states.id',"=",$state)
        ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
        ->whereNotIn('dyn_leads.Type',[8,8])
        ->count('dyn_leads.State');
         return view('admin.states_all',compact('units','state','date','sum','total'));

   

        

}
    
}
public function state_all($state,$days,$include,$from,$to){

if($include=1){
    $units= Dyn_lead::join('stc_new_clients', 'stc_new_clients.id', '=', 'dyn_leads.Client')
    ->join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->where('sys_new_states.id',"=",$state)
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
 

    ->select('dyn_leads.*','sys_new_types.Name as T_Name','sys_new_states.Name as S_Name','stc_new_clients.Name as C_Name')
   
    ->orderby('dyn_leads.StateStartDate','ASC')
    ->get();
    $date=date('d F, Y l  H:i:s A',strtotime('+6 hours'));
    $sum=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->where('sys_new_states.id',"=",$state)
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
    
    ->sum('dyn_leads.value');
    $total=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->where('sys_new_states.id',"=",$state)
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
  
    ->count('dyn_leads.State');
 return view('admin.states_all',compact('units','state','date','sum','total'));

}  
else{
    $units= Dyn_lead::join('stc_new_clients', 'stc_new_clients.id', '=', 'dyn_leads.Client')
    ->join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->where('sys_new_states.id',"=",$state)
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
    ->whereNotIn('dyn_leads.Type',[8,8])

    ->select('dyn_leads.*','sys_new_types.Name as T_Name','sys_new_states.Name as S_Name','stc_new_clients.Name as C_Name')
   
    ->orderby('dyn_leads.StateStartDate','ASC')
    ->get();
    $date=date('d F, Y l  H:i:s A',strtotime('+6 hours'));
    $sum=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->where('sys_new_states.id',"=",$state)
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
    ->whereNotIn('dyn_leads.Type',[8,8])
    ->sum('dyn_leads.value');
    $total=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->where('sys_new_states.id',"=",$state)
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
    ->whereNotIn('dyn_leads.Type',[8,8])
    ->count('dyn_leads.State');
 return view('admin.states_all',compact('units','state','date','sum','total'));  
}
}


public function dyn_leads_detail_state($state,$day,$include,$from,$to,$id){
    $units=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')
    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
    ->where('dyn_leads.id',"=",$id)
    ->get();
 
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
   
    $dyn=Dyn_execution::where('id',$id)->get();


    // get previous user id
    if($include==1){
        $previous_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->whereBetween('dyn_leads.StateStartDate',[$from, $to])->where('dyn_leads.id', '<', $id)->where('sys_new_states.id', $state)->max('dyn_leads.id');
        $next_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->whereBetween('dyn_leads.StateStartDate',[$from, $to])->where('dyn_leads.id', '>', $id)->where('sys_new_states.id', $state)->min('dyn_leads.id');
    }
    else{
        $previous_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->whereBetween('dyn_leads.StateStartDate',[$from, $to])->whereNotIn('dyn_leads.Type',[8,8])->where('dyn_leads.id', '<', $id)->where('sys_new_states.id', $state)->max('dyn_leads.id');
        $next_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->whereBetween('dyn_leads.StateStartDate',[$from, $to])->whereNotIn('dyn_leads.Type',[8,8])->where('dyn_leads.id', '>', $id)->where('sys_new_states.id', $state)->min('dyn_leads.id');
    }
    $previous=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')

    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
 
    ->where('dyn_leads.id',"=",$previous_1)
    ->get();
    
    $next=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')
    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
 
    ->where('dyn_leads.id',"=",$next_1)
    ->get();
    $log=Dyn_lead_change::where('LeadId',"=",$id)
    ->whereIN('ChangedColumn',['1'])
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column')
    ->get();

    $log_2=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',2)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('stc_new_clients as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('stc_new_clients as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_3=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',3)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('sys_new_types as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('sys_new_types as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_4=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',4)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('sys_new_states as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('sys_new_states as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_5=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',5)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('stc_human_resouces as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('stc_human_resouces as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_6=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',"=",8)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column')
    ->get();
    $document=Dyn_attachment::where('LeadId',$id)
    ->join('sys_document_types as a', 'a.id', '=', 'dyn_attachments.DocumentType')
    ->join('admins as b', 'b.id', '=', 'dyn_attachments.SalesPerson')

    ->get();
    
        return view('admin.dyn_leads_detail',compact('units','date','previous','next','log','log_2','log_3','log_4','log_5','document','log_6','dyn'));
    

}
public function dyn_leads_detail_state_all($state,$day,$include,$id){
    $units=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')
    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
    ->where('dyn_leads.id',"=",$id)
    ->get();
 
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
   
    $dyn=Dyn_execution::where('id',$id)->get();

    // get previous user id
    if($include==1){
        $previous_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$day))->where('dyn_leads.id', '<', $id)->where('sys_new_states.id', $state) ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$day))->max('dyn_leads.id');
        $next_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$day))->where('dyn_leads.id', '>', $id)->where('sys_new_states.id', $state) ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$day))->min('dyn_leads.id');
    }
    else{
        $previous_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$day))->whereNotIn('dyn_leads.Type',[8,8])->where('dyn_leads.id', '<', $id)->where('sys_new_states.id', $state) ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*90))->max('dyn_leads.id');
        $next_1 = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')->orderby('dyn_leads.StateStartDate','ASC')->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$day))->whereNotIn('dyn_leads.Type',[8,8])->where('dyn_leads.id', '>', $id)->where('sys_new_states.id', $state) ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*90))->min('dyn_leads.id');
    }
   
    $previous=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')

    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
 
    ->where('dyn_leads.id',"=",$previous_1)
    ->get();
    
    $next=Dyn_lead::join('sys_new_types', 'sys_new_types.id', '=', 'dyn_leads.Type')
    ->join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    ->join('stc_new_clients as c', 'c.id', '=', 'dyn_leads.Client')
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_leads.SalesPerson')
    ->join('lnk_location_lists as b', 'b.ClientId', '=', 'c.id')
    ->join('stc_new_addresses as s', 's.id', '=', 'b.AddressId')
    ->join('lnk_contact_lists as l', 'l.ClientId', '=', 'c.id')
    ->join('stc_contact_people as p', 'p.id', '=', 'l.ContactPersonId')
  
    ->select('dyn_leads.*','sys_new_states.Name as State','sys_new_types.Name as Type','c.Name as Client','a.Name as SalesPerson','s.House_Line as House','s.Area_Line as Area','s.Street_Line as Street','s.District','s.Post_Code','s.Country','s.LandLine','s.Fax','p.PersonName','p.Designation','p.Phone_Cell','p.Email')
 
    ->where('dyn_leads.id',"=",$next_1)
    ->get();
    $log=Dyn_lead_change::where('LeadId',"=",$id)
    ->whereIN('ChangedColumn',['1'])
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column')
    ->get();

    $log_2=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',2)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('stc_new_clients as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('stc_new_clients as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_3=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',3)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('sys_new_types as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('sys_new_types as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_4=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',4)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('sys_new_states as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('sys_new_states as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_5=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',5)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->join('stc_human_resouces as o', 'o.id', '=', 'dyn_lead_changes.OldValue')
    ->join('stc_human_resouces as n', 'n.id', '=', 'dyn_lead_changes.NewValue')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column','o.Name as Old','n.Name as New')
    ->get();
    $log_6=Dyn_lead_change::where('LeadId',"=",$id)
    ->where('ChangedColumn',"=",8)
    ->join('stc_human_resouces as a', 'a.id', '=', 'dyn_lead_changes.SalesPerson')
    ->join('sys_leads_columns as b', 'b.id', '=', 'dyn_lead_changes.ChangedColumn')
    ->select('dyn_lead_changes.*','a.Name as User','b.Name as Column')
    ->get();
    $document=Dyn_attachment::where('LeadId',$id)
    ->join('sys_document_types as a', 'a.id', '=', 'dyn_attachments.DocumentType')
    ->join('admins as b', 'b.id', '=', 'dyn_attachments.SalesPerson')

    ->get();
    
        return view('admin.dyn_leads_detail',compact('units','date','previous','next','log','log_2','log_3','log_4','log_5','document','log_6','dyn'));
    

}
public function include_strategic(Request $request){
    $from=$request->input('from');
    $to=$request->input('to');
    $days=$request->input('days');
    $include=$request->input('strategic');
    $search=$request->input('action');
   if (empty($from && $to)){
       
         if($include==1){
         
         $units=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    
        ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
     
       
        ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State'),'sys_new_states.id')
         ->groupBy('sys_new_states.id','sys_new_states.Name')
         ->orderby('sys_new_states.display_serial')
         ->get();
             $include=1;
            
          
             $pieChart = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
             ->select(\DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State')) 
             ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
             ->groupBy('sys_new_states.id','sys_new_states.Name')
              ->orderBy('sys_new_states.display_serial')
              ->get();
              $grand_total=Dyn_lead::where("StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
         
              ->count('dyn_leads.id');
              $grand_summary=Dyn_lead::where("StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
         
              ->sum('dyn_leads.value');
           
             $date=date('d F, Y l  H:i A',strtotime('+6 hours'));

      
             return view('admin.dashboard',compact('units','include','pieChart','date','grand_total','grand_summary','days','from','to'));
         }
         else {
            $units=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
            ->whereNotIn('dyn_leads.Type',[8,8])
            ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
            ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State'),'sys_new_states.id')
             ->groupBy('sys_new_states.id','sys_new_states.Name')
             ->orderby('sys_new_states.display_serial')
             ->get();
                 $include=2;
                
              
                 $pieChart = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
                 ->whereNotIn('dyn_leads.Type',[8,8])
                 ->select(\DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State') )
                 ->where("dyn_leads.StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
                 ->groupBy('sys_new_states.id','sys_new_states.Name')
                  ->orderBy('sys_new_states.display_serial')
                  ->get();
                  $grand_total=Dyn_lead::where("StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
                  ->whereNotIn('dyn_leads.Type',[8,8])
             
                  ->count('dyn_leads.id');
                  $grand_summary=Dyn_lead::where("StateStartDate",">",date("Y-m-d",time()-3600*24*$days))
                  ->whereNotIn('dyn_leads.Type',[8,8])
             
                  ->sum('dyn_leads.value');
               
                 $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
          
                 return view('admin.dashboard',compact('units','include','pieChart','date','grand_total','grand_summary','days','from','to'));
    
         }
   
     }
   
else{
    if($include==1){
    $units=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    
    ->whereBetween('dyn_leads.StateStartDate',[$from, $to])

    ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State'),'sys_new_states.id')
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
     ->get();
         
        
      
         $pieChart = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
         ->select(\DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State')) 
         ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
         ->groupBy('sys_new_states.id','sys_new_states.Name')
          ->orderBy('sys_new_states.display_serial')
          ->get();
          $grand_total=Dyn_lead::whereBetween('dyn_leads.StateStartDate',[$from, $to])
     
          ->count('dyn_leads.id');
          $grand_summary=Dyn_lead::whereBetween('dyn_leads.StateStartDate',[$from, $to])
     
          ->sum('dyn_leads.value');
       
         $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
         $include=1;
         $days=0;
  
         return view('admin.dashboard',compact('units','include','pieChart','date','grand_total','grand_summary','days','from','to'));
        }
         else{
            $units=Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
    
            ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
            ->whereNotIn('dyn_leads.Type',[8,8])
        
            ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State'),'sys_new_states.id')
             ->groupBy('sys_new_states.id','sys_new_states.Name')
             ->orderby('sys_new_states.display_serial')
             ->get();
                 
                
              
                 $pieChart = Dyn_lead::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_leads.State')
                 ->select(\DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_leads.value) as sum'),DB::raw('sys_new_states.Name as State') )
                 ->whereBetween('dyn_leads.StateStartDate',[$from, $to])
                 ->whereNotIn('dyn_leads.Type',[8,8])
                 ->groupBy('sys_new_states.id','sys_new_states.Name')
                  ->orderBy('sys_new_states.display_serial')
                  ->get();
                  $grand_total=Dyn_lead::whereBetween('dyn_leads.StateStartDate',[$from, $to])
                  ->whereNotIn('dyn_leads.Type',[8,8])
                  ->count('dyn_leads.id');
                  $grand_summary=Dyn_lead::whereBetween('dyn_leads.StateStartDate',[$from, $to])
                  ->whereNotIn('dyn_leads.Type',[8,8])
                  ->sum('dyn_leads.value');
               
                 $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
                 $include=2;
                 $days=0;
                 return view('admin.dashboard',compact('units','include','pieChart','date','grand_total','grand_summary','days','from','to'));

         }
   
}
}
 public function execution(Request $request){
    $execute=Sys_new_state::wherebetween('id',[200,210])
    ->get();
    $human=Stc_human_resouce::all();
    
    $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
    $id=$request->input('id');

    return view('admin.execution',compact('id','date','execute','human'));
 }
 
 public function store_execution(Request $request){
    
    $mytime = Carbon::now()->format('Y-m-d');
    $values = array(
        'id' => $request->input('id'),
        'ExecutionTeam' => $request->input('ExecutionTeam'),
        'ProjectManager' => $request->input('ProjectManager'),
        'Execution_state' => $request->input('Execution_state'),
        'ProjectStartDate' => $mytime,
        'TargetEndDate' => $request->input('TargetEndDate'),
        'ActualHandoverDate' => $request->input('ActualHandoverDate'),

        'PO_Date' => $request->input('PO_Date'),
        'PO_Amount' => $request->input('PO_Amount'),
        'TurnOver_Amount' => $request->input('TurnOver_Amount'),
        'CashFlowPosition' => $request->input('CashFlowPosition'),
        'GrossMargin' => $request->input('GrossMargin'),
        'TurnedOver' => $request->input('TurnedOver'),
  
     
   
    );
    Dyn_execution::create($values);
    $units=Dyn_execution::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_executions.Execution_state')
    ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_executions.PO_Amount) as sum'),'sys_new_states.id',DB::raw('sys_new_states.Name as State'))
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
     ->get();
     $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
     $pieChart = Dyn_execution::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_executions.Execution_state')
     ->select(DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_executions.PO_Amount) as sum'),'sys_new_states.id',DB::raw('sys_new_states.Name as State'))     
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
      ->get();
     $grand_total=Dyn_execution::count('id');
     $grand_summary=Dyn_execution::sum('PO_Amount');
    return view('admin.execution_all',compact('units','date','pieChart','grand_total','grand_summary'));
}
public function execution_all(){
    $days=90;
    $from=('');
                        
    $to=('');
    $units=Dyn_execution::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_executions.Execution_state')
    ->select(DB::raw('count(sys_new_states.id) as total'),DB::raw('sum(dyn_executions.PO_Amount) as sum'),'sys_new_states.id',DB::raw('sys_new_states.Name as State'))
     ->where("ProjectStartDate",">",date("Y-m-d",time()-3600*24*$days))
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
     ->get();
     $date=date('d F, Y l  H:i A',strtotime('+6 hours'));
     $pieChart = Dyn_execution::join('sys_new_states', 'sys_new_states.id', '=', 'dyn_executions.Execution_state')
     ->select(DB::raw("COUNT(sys_new_states.id) as count"),DB::raw('sum(dyn_executions.PO_Amount) as sum'),'sys_new_states.id',DB::raw('sys_new_states.Name as State'))  
     ->where("ProjectStartDate",">",date("Y-m-d",time()-3600*24*$days))   
     ->groupBy('sys_new_states.id','sys_new_states.Name')
     ->orderby('sys_new_states.display_serial')
      ->get();
     $grand_total=Dyn_execution::where("ProjectStartDate",">",date("Y-m-d",time()-3600*24*$days))->count('id');
     $grand_summary=Dyn_execution::where("ProjectStartDate",">",date("Y-m-d",time()-3600*24*$days))->sum('PO_Amount');
    return view('admin.execution_all',compact('units','date','pieChart','grand_total','grand_summary','days','from','to'));

}
    
 }
