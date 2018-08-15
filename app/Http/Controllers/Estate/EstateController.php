<?php

namespace App\Http\Controllers\Estate;

use App\Estate;
use App\User;
use App\Area;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Purifier; 
use Image;
use Storage;


class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estates = Estate::all();
        $areas = Area::all();
        $users = User::all();
        $types = Type::all();

        return view('admin.estates.index')->withEstates($estates)
                                            ->withAreas($areas)
                                            ->withUsers($users)
                                            ->withTypes($types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'area_id' => 'required|max:100',
            'user_id' => 'required|max:100',
            'price' => 'required|integer',
            'image' => 'required|image',
            'description' => 'required',
            'type' => 'required',
            'type_id' => 'required',
        ]);

        $estate = new Estate();
        $estate->area_id = $request->area_id;
        $estate->user_id = $request->user_id;
        $estate->price = $request->price;
        $estate->status = Estate::AVALIABLE;
        $estate->description = $request->description;
        $estate->type = $request->type;
        $estate->type_id = $request->type_id;
    
        //Save our image
        $image = $request->file('image');
        //dd($image);
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('image/' . $filename);
        Image::make($image)->resize(800, 400)->save($location);
        $estate->image = $filename;
		
        if ($estate->save()) {
            Session::flash('success', '!تمت أضافة العقار بنجاح');
            //Redirect to another page
		    return redirect()->route('estates.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة العقار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('estates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estate = Estate::findOrFail($id);

        return view('admin.estates.show')->withEstate($estate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estate = Estate::findOrFail($id);
        $areas = Area::all();
        $users = User::all();
        $types = Type::all();

        return view('admin.estates.edit')->withEstate($estate)
                                        ->withAreas($areas)
                                        ->withUsers($users)
                                        ->withTypes($types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estate = Estate::findOrFail($id);
     
        //dd($estate);
        $this->validate($request, [
            'area_id' => 'sometimes|max:100',
            'user_id' => 'sometimes|max:100',
            'price' => 'sometimes|integer',
            'image' => 'sometimes|image',
            'description' => 'sometimes',
            'type' => 'sometimes',
            'type_id' => 'sometimes',
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

            //Delete the database
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

        if ($request->has('type_id'))
        {
            $estate->type_id = $request->type_id;
        }

        if ($request->has('status'))
        {
            $estate->status = $request->status;
        }

        //dd($estate);

        if($estate->save()){

            Session::flash('success', 'تم تعديل العقار بنجاح !');
            //Redirect to another page
		    return redirect()->route('estates.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل العقار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('estates.show', $estate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estate = Estate::findOrFail($id);
        
        File::delete('image/'.$estate->image);
        if($estate->delete()){

            Session::flash('success', 'تم حذف العقار بنجاح !');
            //Redirect to another page
		    return redirect()->route('estates.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف العقار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('estates.index');
    }
    
}
