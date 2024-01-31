<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $data = Category::all();
        $info = Service::orderBy('created_at' , 'desc')->get();
        return view('service', ['data'=>$data , 'service'=>$info]);
    }
}
