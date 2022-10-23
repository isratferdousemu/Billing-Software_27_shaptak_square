@extends('admin.index') 
 @section('content')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<div class="container d-flex justify-content-center">
    Welcome, {{ auth()->guard('admin')->user()->name }} <br>

</div>



@endsection
