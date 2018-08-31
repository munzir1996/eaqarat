<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Market;

class StockController extends Controller
{
    public function index(){

        $markets = Market::all();

        return view('stock')->withMarkets($markets);
    }
}
