@extends('admin.index')
@section('content')
<div class="text-center">Meter_1 </div>
Customer Name:{{$meter1}}</br>
Total Power:{{$power}}</br>
Power Factor::{{$pf}}</br>
Energy DPDC:{{$energy_1}}</br>
Energy ::{{$energy_2}}</br>

@endsection