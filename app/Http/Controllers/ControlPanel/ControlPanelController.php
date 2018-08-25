<?php

namespace App\Http\Controllers\ControlPanel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function userProfile()
    {
        return view('profile');
    }

}
