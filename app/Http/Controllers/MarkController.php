<?php
namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;

class MarkController extends Controller
{
     public function dashboard()
    {
        return view('admin.dashboard');
    }
}
