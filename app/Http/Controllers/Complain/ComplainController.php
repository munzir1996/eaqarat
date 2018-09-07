<?php

namespace App\Http\Controllers\Complain;

use App\Complain;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complain::all();

        return view('admin.complains.index')->withComplains($complains);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complain = Complain::findOrFail($id);

        return view('admin.complains.show')->withComplain($complain);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function edit(Complain $complain)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complain $complain)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complain  $complain
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complain =Complain::findOrFail($id);
        
        // Shows .toaster message
        if($complain->delete()){

            Session::flash('success', 'تم حذف الشكوة بنجاح !');
            //Redirect to another page
		    return redirect()->route('complains.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الشكوة الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('complains.index');
    }
}
