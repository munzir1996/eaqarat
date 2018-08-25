<?php

namespace App\Http\Controllers;

use App\Area;
use App\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     * public function __construct()
     *  {
     *   $this->middleware('auth');
     *   }
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $types = Type::all();

        return view('welcome')->withAreas($areas)->withTypes($types);
    }

    public function about()
    {
        return view('about');
    }
}
