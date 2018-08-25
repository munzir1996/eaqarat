<?php

namespace App\Http\Controllers\Rate;

use App\Rate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rates = Rate::all();

        return view('admin.rates.index')->withRates($rates);
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
            'rate' => 'required|max:100',
        ]);

        $rate = new Rate();
        $rate->rate = $request->rate;

        // Shows .toaster message
        if ($rate->save()) {
            Session::flash('success', '!تمت أضافة التقييم بنجاح');
            //Redirect to another page
		    return redirect()->route('rates.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة التقييم الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('rates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rate = rate::findOrFail($id);

        return view('admin.rates.edit')->withRate($rate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rate = Rate::findOrFail($id);
        $this->validate($request, [
            'rate' => 'sometimes|max:100',
        ]);

        if ($request->has('rate'))
        {
            $rate->rate = $request->rate;
        }

        // Shows .toaster message
        if($rate->save()){

            Session::flash('success', 'تم تعديل النوع بنجاح !');
            //Redirect to another page
		    return redirect()->route('rates.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل النوع الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('rates.show', $rate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rate  $rate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        $rate = Rate::findOrFail($id);
        
        // Shows .toaster message
        if($rate->delete()){

            Session::flash('success', 'تم حذف التقييم بنجاح !');
            //Redirect to another page
		    return redirect()->route('rates.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف التقييم الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('rates.index');
    }
}
