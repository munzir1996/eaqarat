<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->withUsers($users);
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
            'email' => 'required|max:100|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;

        // Shows .toaster message
        if ($user->save()) {
            Session::flash('success', '!تمت أضافة المستخدم بنجاح');
            //Redirect to another page
		    return redirect()->route('users.index');
        }

        Session::flash('error', 'حصل خطااثناء اضافة المستخدم الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('users.index');
         
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
        $user = User::findOrFail($id);

        return view('admin.users.edit')->withUser($user);
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
        $user = User::findOrFail($id);
     
        $this->validate($request, [
            'name' => 'sometimes|max:100',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'sometimes',
            'phone' => 'sometimes',
            'address' => 'sometimes'
        ]);


        if ($request->has('name'))
        {
            $user->name = $request->name;
        }
        if ($request->has('email') && $user->email != $request->email)
        {
            $user->email = $request->email;
        }
        
        if ($request->has('password') && $request->password == $request->password_confirmation)
        {
            $user->password = bcrypt($request->password);
        }

        if ($request->has('address'))
        {
            $user->address = $request->address;
        }

        if ($request->has('phone'))
        {
            $user->phone = $request->phone;
        }

        // Shows .toaster message
        if($user->save()){

            Session::flash('success', 'تم تعديل المستخدم بنجاح !');
            //Redirect to another page
		    return redirect()->route('users.index');
        }

        Session::flash('error', 'حصل خطااثناء تعديل المستخدم الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('users.show', $user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Shows .toaster message
        if($user->delete()){

            Session::flash('success', 'تم حذف المستخدم بنجاح !');
            //Redirect to another page
		    return redirect()->route('users.index');
        }

        Session::flash('error', 'حصل خطااثناء حذف المستخدم الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('users.index');

    }
}
