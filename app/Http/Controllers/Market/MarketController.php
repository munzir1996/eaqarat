<?php

namespace App\Http\Controllers\Market;

use App\Market;
use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markets = Market::all();
        $areas = Area::all();

        return view('admin.markets.index')->withMarkets($markets)->withAreas($areas);
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
            'area_id' => 'required',
            'start_price' => 'required|integer',
            'end_price' => 'required|integer',
        ]);

        $market = new Market();
        $market->area_id = $request->area_id;
        $market->start_price = $request->start_price;
        $market->end_price = $request->end_price;
        
        if ($market->save()) {
            Session::flash('success', '!تمت أضافة البورصة بنجاح');
            //Redirect to another page
		    return redirect()->route('markets.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة البورصة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('markets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $market = Market::findOrFail($id);
        $areas = Area::all();

        return view('admin.markets.edit')->withMarket($market)->withAreas($areas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $market = market::findOrFail($id);
     
        //dd($market);
        $this->validate($request, [
            'area_id' => 'sometimes',
            'start_price' => 'sometimes|integer',
            'end_price' => 'sometimes|integer',
        ]);


        //dd($market);
        if ($request->has('area_id'))
        {
            $market->area_id = $request->area_id;
        }
        if ($request->has('start_price'))
        {
            $market->start_price = $request->start_price;
        }
        
        if ($request->has('end_price'))
        {
            $market->end_price = $request->end_price;
        }

        //dd($market);

        if($market->save()){

            Session::flash('success', 'تم تعديل البورصة بنجاح !');
            //Redirect to another page
		    return redirect()->route('markets.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل البورصة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('markets.show', $market->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Market  $market
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $market = Market::findOrFail($id);
        
        if($market->delete()){

            Session::flash('success', 'تم حذف البورصة بنجاح !');
            //Redirect to another page
		    return redirect()->route('markets.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف البورصة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('markets.index');
    }
}
