<?php

namespace App\Http\Controllers;

use App\Models\Fabric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->can('tailor')) {
            return redirect('/orders');
        }
        $fabrics = Fabric::all();
        return view('home',compact('fabrics'));
    }
}
