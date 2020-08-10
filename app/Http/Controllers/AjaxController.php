<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function users(Request $request)
    {
        $users = User::where('company_id', $request->company)->get();
        return view('layouts.users_options', compact('users'));
    }
}
