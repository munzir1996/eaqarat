<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Complain;

class ComplainController extends Controller
{
    public function create(){

        return view('complains');
    }

    public function store(Request $request){

        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|max:100',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
            'complain' => 'required',
        ]);

        $complain = new Complain();
        $complain->name = $request->name;
        $complain->email = $request->email;
        $complain->phone = $request->phone;
        $complain->address = $request->address;
        $complain->complain = $request->complain;

        // Shows .toaster message
        if ($complain->save()) {
            Session::flash('success', '!تم أرسال الشكوه بنجاح');
            //Redirect to another page
		    return redirect()->route('complain');
        }

        Session::flash('error', 'حصل خطااثناء أرسال الشكوه الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('complain');
    }
}
