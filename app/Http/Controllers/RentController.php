<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Estate;
use App\User;
use App\Area;
use App\Type;
use Session;

class RentController extends Controller
{
    public function index(){

        $estates = Estate::where('type', 'أيجار')->paginate(10);

        return view('rent')->withEstates($estates);
    }
}
