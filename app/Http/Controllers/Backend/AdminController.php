<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard()
    {
        // return view('backend.index');
        return view('backend.admin_master');
    }
}
