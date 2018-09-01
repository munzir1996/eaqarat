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
use Purifier; 
use Image;
use Storage;
use File;

class EaqarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        $types = Type::all();
        return view('eaqars.create')->withAreas($areas)->withTypes($types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $areas = Area::all();
        $types = Type::all();
       
        $this->validate($request, [
            'area_id' => 'required',
            'type_id' => 'required',
            'price' => 'required|integer',
            'image' => 'required|image',
            'description' => 'required',
            'type' => 'required',
        ]);

        $estate = new Estate();
        $estate->area_id = $request->area_id;
        $estate->user_id = Auth::user()->id;
        $estate->type_id = $request->type_id;
        $estate->price = $request->price;
        $estate->status = Estate::AVALIABLE;
        $estate->description = $request->description;
        $estate->type = $request->type;
    
        //Save image
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('image/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);
        $estate->image = $filename;

        //dd($estate);
        // Shows .toaster message
        if ($estate->save()) {
            Session::flash('success', '!تمت أضافة العقار بنجاح');
            //Redirect to another page
        return redirect()->route('eaqars.create')->withAreas($areas)->withTypes($types);
        }

        Session::flash('error', 'حصل خطااثناء اضافة العقار الرجاء اعادة المحاولة');
        //Redirect to another page
        return redirect()->route('eaqars.create')->withAreas($areas)->withTypes($types);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estates = Estate::where('user_id', $id)->paginate(10);
        //dd($estates);
        //$user = User::findOrFail($id);

        return view('eaqars.show')->withEstates($estates);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estate = Estate::findOrFail($id);
        $areas = Area::all();
        $users = User::all();
        $types = Type::all();

        return view('eaqars.edit')->withEstate($estate)
                                        ->withAreas($areas)
                                        ->withUsers($users)
                                        ->withTypes($types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estate = Estate::findOrFail($id);
     
        //dd($estate);
        $this->validate($request, [
            'area_id' => 'sometimes|max:100',
            'user_id' => 'sometimes|max:100',
            'user_id' => 'sometimes',
            'price' => 'sometimes|integer',
            'image' => 'sometimes|image',
            'description' => 'sometimes',
            'type' => 'sometimes',
            'status' => 'sometimes',
        ]);


        //dd($estate);
        if ($request->has('area_id'))
        {
            $estate->area_id = $request->area_id;
        }
        if ($request->has('user_id'))
        {
            $estate->user_id = $request->user_id;
        }

        if ($request->has('type_id'))
        {
            $estate->type_id = $request->type_id;
        }
        
        if ($request->has('price'))
        {
            $estate->price = $request->price;
        }

        if ($request->has('image'))
        {
            //Save our image
            $image = $request->file('image');
            //dd($image);
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('image/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            //Old Path
            $oldFilename = $estate->image;

            //New Path
            $estate->image = $filename;

            //Delete the image
            File::delete('image/'.$oldFilename);
        }

        if ($request->has('description'))
        {
            $estate->description = $request->description;
        }

        if ($request->has('type'))
        {
            $estate->type = $request->type;
        }

        if ($request->has('status'))
        {
            $estate->status = $request->status;
        }


        // Shows .toaster message
        if($estate->save()){

            Session::flash('success', 'تم تعديل العقار بنجاح !');
            //Redirect to another page
		    return redirect()->route('home');
        }

        Session::flash('error', 'حصل خطااثناء تعديل العقار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estate = Estate::findOrFail($id);
        
        //Delete image
        File::delete('image/'.$estate->image);

        // Shows .toaster message
        if($estate->delete()){

            Session::flash('success', 'تم حذف العقار بنجاح !');
            //Redirect to another page
		    return redirect()->route('home');
        }

        Session::flash('error', 'حصل خطااثناء حذف العقار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('home');
    }

    public function rent($id){

        $estates = Estate::where('user_id', $id)->where('type', 'أيجار')->paginate(10);
        //dd($estates);
        //$user = User::findOrFail($id);

        return view('eaqars.rent')->withEstates($estates);
    }
    public function sale($id){

        $estates = Estate::where('user_id', $id)->where('type', 'بيع')->paginate(10);
        //dd($estates);
        //$user = User::findOrFail($id);

        return view('eaqars.sale')->withEstates($estates);
    }
}
