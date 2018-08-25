<?php

namespace App\Http\Controllers\Area;

use App\Area;
use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::all();
        $types = Type::all();

        return view('admin.areas.index')->withAreas($areas)->withTypes($types);
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
            'name' => 'required|max:100',
            'block' => 'required|integer|max:100',
            'type_id' => 'required|integer'
        ]);

        $area = new Area();
        $area->name = $request->name;
        $area->block = $request->block;
        $area->type_id = $request->type_id;

        // Shows .toaster message
        if ($area->save()) {
            Session::flash('success', '!تمت أضافة المنطقه بنجاح');
            //Redirect to another page
		    return redirect()->route('areas.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة المنطقه الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::findOrFail($id);
        $types = Type::all();

        return view('admin.areas.edit')->withArea($area)->withTypes($types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Areas  $areas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $area = Area::findOrFail($id);
        $this->validate($request, [
            'name' => 'sometimes|max:100',
            'block' => 'sometimes|integer|max:100',
            'type_id' => 'sometimes|integer'
        ]);


        //dd($type);
        if ($request->has('name'))
        {
            $area->name = $request->name;
        }
        if ($request->has('block'))
        {
            $area->block = $request->block;
        }
        if ($request->has('type_id'))
        {
            $area->type_id = $request->type_id;
        }

        //dd($type);

        // Shows .toaster message
        if($area->save()){

            Session::flash('success', 'تم تعديل النوع بنجاح !');
            //Redirect to another page
		    return redirect()->route('areas.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل النوع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('areas.show', $area->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        
        // Shows .toaster message
        if($area->delete()){

            Session::flash('success', 'تم حذف المنطقه بنجاح !');
            //Redirect to another page
		    return redirect()->route('areas.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف المنطقه الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('areas.index');
    }
}
