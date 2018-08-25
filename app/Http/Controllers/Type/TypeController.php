<?php

namespace App\Http\Controllers\Type;

use App\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index')->withTypes($types);
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
        ]);

        $type = new Type();
        $type->name = $request->name;

        // Shows .toaster message
        if ($type->save()) {
            Session::flash('success', '!تمت أضافة النوع بنجاح');
            //Redirect to another page
		    return redirect()->route('types.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة النوع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('types.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(Types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::findOrFail($id);

        return view('admin.types.edit')->withType($type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $type = Type::findOrFail($id);
        $this->validate($request, [
            'name' => 'sometimes|max:100',
        ]);


        //dd($type);
        if ($request->has('name'))
        {
            $type->name = $request->name;
        }

        //dd($type);

        // Shows .toaster message
        if($type->save()){

            Session::flash('success', 'تم تعديل النوع بنجاح !');
            //Redirect to another page
		    return redirect()->route('types.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل النوع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('types.show', $type->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type =Type::findOrFail($id);
        
        // Shows .toaster message
        if($type->delete()){

            Session::flash('success', 'تم حذف النوع بنجاح !');
            //Redirect to another page
		    return redirect()->route('types.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف النوع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('types.index');
    }
}
