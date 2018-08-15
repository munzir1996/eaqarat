<?php

namespace App\Http\Controllers\Property;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Purifier; 
use Storage;
use Illuminate\Support\Facades\Input;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();

        return view('admin.properties.index')->withProperties($properties);
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
            'name' => 'required',
            'hire_date' => 'required|integer',
            'age' => 'required|integer',
            'salary_pdf' => 'required',
            'offical_pdf' => 'required',
        ]);

        $property = new Property();
        $property->name = $request->name;
        $property->hire_date = $request->hire_date;
        $property->age = $request->age;
    
        //Save our salary_pdf
        $salary_pdf = Input::file('salary_pdf');
        //dd($);
        $filename = time() . '.' . $salary_pdf->getClientOriginalExtension();
        $location = public_path('file/' . $filename);
        $property->salary_pdf = $filename;

        //Save our salary_pdf
        $offical_pdf = Input::file('offical_pdf');
        $filename = time() . '.' . $offical_pdf->getClientOriginalExtension();
        $location = public_path('file/' . $filename);
        $property->offical_pdf = $filename;
        
        //dd($property);
        if ($property->save()) {
            Session::flash('success', '!تمت أضافة العقار بنجاح');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة العقار الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::findOrFail($id);

        return view('admin.properties.show')->withProperty($property);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        
        if($property->delete()){

            Session::flash('success', 'تم حذف التمليك بنجاح !');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.index');
    }
}
