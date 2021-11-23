<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

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
        return view('admin.index');
    }

    public function index_dashboard()
    {

        if (auth()->user()->role === 1){
            return view('admin.index');
        } else if(auth()->user()->role === 2){
            return view('dash.index');
        } else if (auth()->user()->role === 3){
            $servicios = Servicio::get();
            return view('dash.dashboard_3',compact('servicios'));
    }
       
    }
}
