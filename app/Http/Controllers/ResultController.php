<?php

namespace App\Http\Controllers;

use App\Title;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Property;

class ResultController extends Controller
{
    public function index(){

        $properties = Property::all();
        $title = Title::findOrFail(1);

        return view('result')->withProperties($properties)->withTitle($title);
    }
}
