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

class SaleController extends Controller
{
    public function index (){

        $areas = Area::all();
        $types = Type::all();
        $estates = Estate::where('type', 'بيع')->paginate(10);

        return view('sale')->withEstates($estates)->withTypes($areas)->withAreas($types);
    }

    public function search (Request $request){

        $areas = Area::all();
        $types = Type::all();

        $this->validate($request, [
            'area_id' => 'required',
            'type_id' => 'required',
        ]);

        $area_id = $request->area_id;
        $type_id = $request->type_id;

        $estates = Estate::where('type', 'بيع')->where('area_id', $area_id)->where('type_id', $type_id)->paginate(10);

        //dd($estates);
        if(!empty($estates)){
            //Redirect to another page
            return view('sale')->withEstates($estates)->withAreas($areas)->withTypes($types);
        }else{
            Session::flash('error', 'لم يتم العثور'); 
        }
    }
}
