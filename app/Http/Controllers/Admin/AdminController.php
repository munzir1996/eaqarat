<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        return view('admin.admins.index')->withAdmins($admins);
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
            'email' => 'required|max:100|unique:admins,email',
            'password' => 'required|min:6',
        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);

        // Shows .toaster message
        if ($admin->save()) {
            Session::flash('success', '!تمت أضافة الأدمن بنجاح');
            //Redirect to another page
		    return redirect()->route('admins.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة الأدمن الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('admins.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admins.edit')->withAdmin($admin);
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
        $admin = admin::findOrFail($id);
     
        $this->validate($request, [
            'name' => 'sometimes|max:100',
            'email' => 'sometimes|email|unique:admins,email,' . $id,
            'password' => 'sometimes',
        ]);


        if ($request->has('name'))
        {
            $admin->name = $request->name;
        }
        if ($request->has('email') && $admin->email != $request->email)
        {
            $admin->email = $request->email;
        }
        
        if ($request->has('password') && $request->password == $request->password_confirmation)
        {
            $admin->password = bcrypt($request->password);
        }

        // Shows .toaster message
        if($admin->save()){

            Session::flash('success', 'تم تعديل الأدمن بنجاح !');
            //Redirect to another page
		    return redirect()->route('admins.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل الأدمن الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('admins.show', $admin->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        
        // Shows .toaster message
        if($admin->delete()){

            Session::flash('success', 'تم حذف الأدمن بنجاح !');
            //Redirect to another page
		    return redirect()->route('admins.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف الأدمن الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('admins.index');
    }
}
