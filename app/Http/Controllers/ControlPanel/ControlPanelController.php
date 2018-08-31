<?php

namespace App\Http\Controllers\ControlPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Estate;

class ControlPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        return view('admin.index');
    }

    public function adminProfile()
    {
        return view('admin.admins.profile');
    }

    public function userProfile($id)
    {
        $user = User::findOrFail($id);
        return view('profile')->withUser($user);
    }

    public function updateUserProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);
     
        $this->validate($request, [
            'name' => 'sometimes|max:100',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'address' => 'sometimes',
            'password' => 'sometimes',
        ]);


        if ($request->has('name'))
        {
            $user->name = $request->name;
        }
        if ($request->has('email') && $user->email != $request->email)
        {
            $user->email = $request->email;
        }

        if ($request->has('address'))
        {
            $user->address = $request->address;
        }
        
        if ($request->has('password') && $request->password == $request->password_confirmation)
        {
            $user->password = bcrypt($request->password);
        }

        // Shows .toaster message
        if($user->save()){

            Session::flash('success', 'تم تعديل بياناتك بنجاح !');
            //Redirect to another page
		    return redirect()->route('user.profile');
        }

        Session::flash('error', 'حصل خطااثناء تعديل بياناتك الرجاء اعادة المحاولة');
        //Redirect to another page
	    return redirect()->route('user.profile');
    }

}
