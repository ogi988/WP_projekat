<?php

namespace App\Http\Controllers;
use App\Shipment;
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
        $this->middleware('auth')->except(['welcome', 'track']);;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function track(Request $request)
    {
        $shipment = Shipment::where('shipment_number',$request->track)->get();
        return view('track')->with('shipments',$shipment);

    }
}
