<?php

namespace App\Http\Controllers;

use Auth;
use App\Estate;
use App\Area;
use App\Type;
use App\Comment;
use App\Rate;
use Session;
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
    
    public function search(Request $request){

        $this->validate($request, [
            'area_id' => 'required',
            'type_id' => 'required',
        ]);

        $area_id = $request->area_id;
        $type_id = $request->type_id;

        $estates = Estate::where('area_id', $area_id)->where('type_id', $type_id)->paginate(10);

        //dd($estates);
        if(!empty($estates)){
            //Redirect to another page
            return view('search')->withEstates($estates);
        }else{
            Session::flash('error', 'لم يتم العثور'); 
        }
    }

    public function detail($id){

        $estate = Estate::findOrFail($id);
        $type = $estate->type()->pluck('name');
        $comments = Comment::where('estate_id', $id)->get();
        $rates = Rate::all();

        return view('details')->withEstate($estate)->withType($type)->withComments($comments)->withRates($rates);
    }

    public function comment(Request $request){

        $this->validate($request, [
            'rate_id' => 'required',
            'comment' => 'required',
        ]);

        $comment = new Comment();

        $comment->user_id = Auth::user()->id;
        $comment->rate_id = $request->rate_id;
        $comment->estate_id = $request->estate_id;
        $comment->comment = $request->comment;

        if ($comment->save()) {
            Session::flash('success', '!تمت أضافة التعليق بنجاح');
            //Redirect to another page
        return redirect()->route('detail.comment', $request->estate_id);
        }

        Session::flash('error', 'حصل خطااثناء اضافة التعليق الرجاء اعادة المحاولة');
        //Redirect to another page
        return redirect()->route('detail.comment', $request->estate_id);
    }

}
