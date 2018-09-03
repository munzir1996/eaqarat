<?php

namespace App\Http\Controllers\Property;

use App\Title;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Purifier; 
use Storage;
use Illuminate\Support\Facades\Input;
use File;

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
        $title = Title::findOrFail(1);

        return view('admin.properties.index')->withProperties($properties)->withTitle($title);
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
    
        //Save salary_pdf
        $salary_pdf = $request->file('salary_pdf');
        $filename = time() . '.' . $salary_pdf->getClientOriginalExtension();
        $location = public_path('file/' . $filename);
        $salary_pdf->move(public_path('file/'), $filename);
        $property->salary_pdf = $filename;
        
        //Save offical_pdf
        $offical_pdf = $request->file('offical_pdf');
        $filename = time()+'1' . '.' . $offical_pdf->getClientOriginalExtension();
        $location = public_path('file/' . $filename);
        $offical_pdf->move(public_path('file/'), $filename);
        $property->offical_pdf = $filename;
        
        // Shows .toaster message
        if ($property->save()) {
            Session::flash('success', '!تمت أضافة التمليك بنجاح');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة التمليك الرجاء اعادة المحاولة');
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
        $property = Property::findOrFail($id);

        return view('admin.properties.edit')->withproperty($property);
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
        $property = property::findOrFail($id);
     
        $this->validate($request, [
            'name' => 'sometimes',
            'hire_date' => 'sometimes|integer',
            'age' => 'sometimes|integer',
            'salary_pdf' => 'sometimes',
            'offical_pdf' => 'sometimes',
        ]);


        //dd($property);
        if ($request->has('name'))
        {
            $property->name = $request->name;
        }
        if ($request->has('hire_date'))
        {
            $property->hire_date = $request->hire_date;
        }
        
        if ($request->has('age'))
        {
            $property->age = $request->age;
        }

        if ($request->has('salary_pdf'))
        {
            //Save salary_pdf
            $salary_pdf = $request->file('salary_pdf');
            $filename = time() . '.' . $salary_pdf->getClientOriginalExtension();
            $location = public_path('file/' . $filename);
            $salary_pdf->move(public_path('file/'), $filename);

            //Old Path
            $oldFilename = $property->salary_pdf;

            $property->salary_pdf = $filename;

            //Delete salary_pdf
            File::delete('file/'.$oldFilename);
        }

        if ($request->has('offical_pdf'))
        {
            //Save offical_pdf
            $offical_pdf = $request->file('offical_pdf');
            $filename = time()+'1' . '.' . $offical_pdf->getClientOriginalExtension();
            $location = public_path('file/' . $filename);
            $offical_pdf->move(public_path('file/'), $filename);

            //Old Path
            $oldFilename = $property->offical_pdf;

            $property->offical_pdf = $filename;

            //Delete offical_pdf
            File::delete('file/'.$oldFilename);
        }

        // Shows .toaster message
        if($property->save()){

            Session::flash('success', 'تم تعديل التمليك بنجاح !');
            //Redirect to another page
		    return redirect()->route('propertys.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.show', $property->id);
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
        //Delete salary_pdf
        File::delete('file/'.$property->salary_pdf);
        //Delete offical_pdf
        File::delete('file/'.$property->offical_pdf);

        // Shows .toaster message
        if($property->delete()){

            Session::flash('success', 'تم حذف التمليك بنجاح !');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.index');
    }

    public function title(Request $request){
        $title = Title::findOrFail(1);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $title->name = $request->name;

        // Shows .toaster message
        if($title->save()){

            Session::flash('success', 'تم تجديد التمليك بنجاح !');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء تجديد التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.index');
    }

    public function result($id){

        $property = Property::findOrFail($id);

        if ($property->type == 0) {
            $property->type = 1;
        // Shows .toaster message
        if($property->save()){

            Session::flash('success', 'تم قبول التمليك بنجاح !');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء قبول التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.index');
        } else {
            $property->type = 0;
        // Shows .toaster message
        if($property->save()){

            Session::flash('success', 'تم رفض التمليك بنجاح !');
            //Redirect to another page
		    return redirect()->route('properties.index');
        }

        Session::flash('error', 'حصل خطااثناء رفض التمليك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('properties.index');
        }
    }

}
