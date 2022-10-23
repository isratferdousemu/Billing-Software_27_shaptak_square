@extends('admin.index')
@section('content')


<style>
    hr.new1 {
  border-top: 2px solid black;

}
.emu {

  margin-left: 2cm;
  margin-right: 2cm;
  font-size:12px;
  border-top: 2px solid black;
  border-bottom: 2px solid black;
}
.font {
   font-size: 12px;

}

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  margin-left: 2cm;
  margin-right: 2cm;
}
.newspaper {
  column-count: 2;
  column-gap: 30px;
  column-rule: 1px solid lightblue;
  margin-left: 5cm;
  margin-right: 2cm;
  text-align:left;
  font-family: Cambria;
}
.break {
         /* Theoretically FF 20+ */
         page-break-inside: avoid;           /* Theoretically FF 20+ */
    break-inside: avoid-column;         /* Chrome, Safari, IE 11 */
    display:table;  
  }    /* Chrome, Safari, IE 11 */
 

/* The Close Button */

.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  c
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
}


/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */
.close {
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.close_1
{
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close_1:hover,
.close_1:focus
 {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.close_2
{
  color: white;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close_2:hover,
.close_2:focus
 {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
  padding: 2px 16px;
  background-color: #808080;
  color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
  padding: 2px 16px;
  background-color: #808080;
  color: white;

  
}
.fontsize {
  font-size: 13px;
}</style>
<main>


@include('admin.include')
<br>
   
<div class="newspaper">
     
   
<div class="break">

@foreach($units as $unit)
<div >
<div onclick="location.href='edit/{{$unit->id}}';" style="cursor: pointer;" class="bottomLinks">
<b style="font-size:20px;">{{$unit->Type}}</b><br>
<b style="font-size:28px;">{{$unit->Name}}</b><br>
<b style="font-size:15px;">{{$unit->State}}</b>&nbsp;&nbsp;<b style="font-size:15px;">BDT &nbsp;@php echo number_format($unit->PO_Amount, 2, '.', ',') @endphp  </b><br>
<b style="font-size:15px;">SalesPerson&nbsp;{{$unit->SalesPerson}}</b><br><br>

</div>
</br>
<b style="font-size:22px;">{{$unit->Client}}</b><br>
<p  style=
        "line-height:17px">
{{$unit->House}}<br>
{{$unit->Area}}{{$unit->Street}}
@if(is_null($unit->Street))

@else
<br>

@endif
{{$unit->District}}
@if(is_null($unit->Post_Code))
@else -
@endif
{{$unit->Post_Code}},&nbsp;{{$unit->Country}}<br>
</br>

{{$unit->PersonName}}</br>
{{$unit->Designation}}
@if(is_null($unit->Designation))
@else
</br>
@endif

{{$unit->Phone_Cell}}
@if(is_null($unit->Phone_Cell))
@else
</br>
@endif
{{$unit->Email}}</p>
<form method="GET" action="/admin/transaction">
@csrf
<i class="fa fa-edit " onclick="location.href='edit/{{$unit->id}}';" style="cursor: pointer"></i>&nbsp;&nbsp;<i class="fa fa-paperclip " onclick="location.href='attachment/{{$unit->id}}';" style="cursor: pointer"></i>&nbsp;&nbsp;

<input type="submit" name="action" Value="Enter a transaction">
 
<input type="hidden" name="id" value="{{$unit->id}}"/>
    
    <form>



     
    @switch($dyn)
    @case(0)
    &nbsp;&nbsp; No Transactions
        @break

 
    @case(1)
    &nbsp;&nbsp;Already  Adedd {{$dyn}} Transaction <input type="submit" name="action" Value="view">
    @break
    @default
  
  &nbsp;&nbsp; Already  Adedd {{$dyn}} Transactions  <input type="submit" name="action" Value="view">
    @break
   @endswitch
</br></br>

        <label for="chkPassport" class = "checkbox-inline">
<input type="checkbox" name="colorCheckbox" value="red" checked />
    History
</label>
<label for="chkPassport" class = "checkbox-inline" >
<input   type='checkbox' name="s"  value= "1"  />
    Actions
</label>
<label for="chkPassport" class = "checkbox-inline">
<input   type='checkbox' name="strategic"  value= "1"  />
    Messages
</label>
<label for="chkPassport" class = "checkbox-inline">
<input  type="checkbox" name="colorCheckbox" value="green" checked />
    Attachments</label>
    </form> 
<div class="fontsize"><!-- font size div start -->
<div  class="red box"><b>History:</b></br>
@endforeach

@foreach($log as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->ChangeDate))@endphp&nbsp;&nbsp;&nbsp;&nbsp;{{$unit->User}} changed  {{$unit->Column}} from "{{$unit->OldValue}}" to "{{$unit->NewValue}}" </br>
@endforeach
@foreach($log_2 as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->ChangeDate))@endphp&nbsp;&nbsp;&nbsp;&nbsp;{{$unit->User}} changed  {{$unit->Column}} from  "{{$unit->Old}}" to "{{$unit->New}}" </br>
@endforeach
@foreach($log_3 as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->ChangeDate))@endphp&nbsp;&nbsp;&nbsp;&nbsp;{{$unit->User}} changed  {{$unit->Column}} from  "{{$unit->Old}}" to "{{$unit->New}}" </br>
@endforeach
@foreach($log_4 as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->ChangeDate))@endphp&nbsp;&nbsp;&nbsp;&nbsp;{{$unit->User}} changed  {{$unit->Column}} from "{{$unit->Old}}" to "{{$unit->New}}" </br>
@endforeach
@foreach($log_5 as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->ChangeDate))@endphp&nbsp;&nbsp;&nbsp;&nbsp;{{$unit->User}} changed  {{$unit->Column}} from  "{{$unit->Old}}" to "{{$unit->New}}" </br>
@endforeach
@foreach($log_6 as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->ChangeDate))@endphp&nbsp;&nbsp;&nbsp;&nbsp;{{$unit->User}} changed  {{$unit->Column}} from  "@php echo number_format($unit->OldValue, 2, '.', ',') @endphp " to "@php echo number_format($unit->NewValue, 2, '.', ',') @endphp " </br>
@endforeach
</div>
<!-- redbox check end -->
<div  class="green box">
<b>Attachments:</b></br>
@foreach($document as $unit)
@php echo date('Y-m-d H:i', strtotime($unit->AttachmentDate))@endphp &nbsp;&nbsp; {{$unit->name}}&nbsp; attached a&nbsp;{{$unit->Name}}  tittled <a href="{{ URL::asset('/Documents/'.$unit->Document) }}">{{$unit->DocumentName}}</a> ( @php echo ceil($unit->DocumentSize/1024) @endphp KB)</br>
@endforeach


</div>
</div>
<!-- green check end -->
<!-- font size div end -->
 
    
</br>



</div>
</div>
<div class="break">
@if(count($previous) < 1)
    <div class="alert alert-dark">
        <strong>Begining of the List</strong> 
    </div>  
</br> 
</br>
</br>
</br>
</br>
</br>
                                  
@else
@foreach($previous as $previous_1)

<div onclick="location.href='{{$previous_1->id}}';" style="cursor: pointer;" class="bottomLinks">


<b style="font-size:12px;">{{$previous_1->Type}}</b><br>
<b style="font-size:20px;">{{$previous_1->Name}}</b><br>

<b style="font-size:12px;line-height:12px">{{$previous_1->State}}</b>&nbsp;&nbsp;<b style="font-size:12px;">BDT &nbsp;@php echo number_format($previous_1->PO_Amount, 2, '.', ',') @endphp  </b><br>
<b style="font-size:12px;">SalesPerson&nbsp;{{$previous_1->SalesPerson}}</b><br><br>
<b style="font-size:18px;">{{$previous_1->Client}}</b><br>
<div style="font-size:10px;"  >


{{$previous_1->House}}<br>
{{$previous_1->Area}}{{$previous_1->Street}}
@if(is_null($previous_1->Street) && ($previous_1->Area))
@else
<br>
@endif

{{$previous_1->District}}
@if(is_null($previous_1->Post_Code))
@else -
@endif
{{$previous_1->Post_Code}},&nbsp;{{$previous_1->Country}}<br>
</br>
{{$previous_1->PersonName}}</br>

{{$previous_1->Designation}}
@if(is_null($previous_1->Designation))
@else
</br>
@endif
{{$previous_1->Phone_Cell}}
@if(is_null($previous_1->Phone_Cell))
@else
</br>
@endif
{{$previous_1->Email}}</br>

<!-- font end -->
 </div>

 <!-- click able end -->
</div>
@endforeach
@endif
 
<br>
@if(count($next) < 1)
    <div class="alert alert-dark">
        <strong>End of the List</strong> 
    </div>  
                                  
@else
@foreach($next as $next_1)
<div onclick="location.href='{{$next_1->id}}';" style="cursor: pointer;" class="bottomLinks">

<b style="font-size:12px;">{{$next_1->Type}}</b><br>
<b style="font-size:20px;">{{$next_1->Name}}</b><br>

<b style="font-size:12px;">{{$next_1->State}}</b>&nbsp;&nbsp;<b style="font-size:12px;">BDT &nbsp;@php echo number_format($next_1->PO_Amount, 2, '.', ',') @endphp  </b><br>
<b style="font-size:12px;line-height:12px">SalesPerson&nbsp;{{$next_1->SalesPerson}}</b><br><br>
<b style="font-size:18px;">{{$next_1->Client}}</b><br>
<div style="font-size:10px;"  >
{{$next_1->House}}<br>
{{$next_1->Area}}{{$next_1->Street}}
@if(is_null($next_1->Street))
@else
<br>
@endif

{{$next_1->District}}

@if(is_null($next_1->Post_Code))
@else -
@endif
{{$next_1->Post_Code}},&nbsp; {{$next_1->Country}}<br>
</br>
{{$next_1->PersonName}}</br>

{{$next_1->Designation}}
@if(is_null($next_1->Designation))
@else
</br>
@endif
{{$next_1->Phone_Cell}}
@if(is_null($next_1->Phone_Cell))
@else
</br>
@endif

{{$next_1->Email}}</br>
@endforeach
<!--  font end --></div>
 <!-- clikable end --></div>
 @endif
 <!--  break end --></div>
 <!--  news paper end --></div>


 <center><button class="bg-secondary"  onclick="myFunction()">Home</button>
 <button class="bg-secondary"  onclick="window.history.back()">Go Back</button>
</center>
<script>
function myFunction() {
  location.href ="{{URL::to('admin/dashboard')}}";
}
</script>
<script>
</script>

</main>

<script src ="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});

<script>
   if ( window.history.replaceState ) {
	window.history.replaceState( null, null, window.location.href );
   }
</script>
@endsection