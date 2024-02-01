<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $data = Category::all();
        $info = Service::orderBy('created_at' , 'desc')->get();
        // $info = DB::table('services')->select(*, )
        return view('home', ['data'=>$data , 'service'=>$info]);
    }
    
    public function store(){
        $name = request()->name;
        $description = request()->description;
        $Category = request()->Category;
        $user =  request()->id ; 
        $price =  request()->price ; 
        $insert = new Service ;
        $insert->name = $name ; 
        $insert->description = $description ; 
        $insert->category_id = $Category ; 
        $insert->user_id = $user ; 
        $insert->price = $price ; 
        $insert->save();
        $data = Category::all();
        $info = Service::orderBy('created_at' , 'desc')->get();
        return view('home', ['data'=>$data , 'service'=>$info]);
    }
    public function destroy($id){

        $row = Service::find($id);
        if($row){
            $row->delete();
        }
        $data = Category::all();
        $info = Service::orderBy('created_at' , 'desc')->get();
        return view('home', ['data'=>$data , 'service'=>$info]);
    }
    public function edit($id){
        $data = Category::all();
        $info = Service::find($id);
        return view('edit', ['data'=>$data , 'service'=>$info]);
    }
    
    public function update($id){
        $name = request()->name;
        $description = request()->description;
        $Category = request()->Category;
        $user =  request()->id ; 
        $price =  request()->price ; 
        $insert = new Service ;
        $insert->name = $name ; 
        $insert->description = $description ; 
        $insert->category_id = $Category ; 
        $insert->user_id = $user ; 
        $insert->price = $price ; 
        $insert->save();
        $data = Category::all();
        $info = Service::orderBy('created_at' , 'desc')->get();
        return view('home', ['data'=>$data , 'service'=>$info]);
    }
}
