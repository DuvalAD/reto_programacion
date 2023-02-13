<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function view(){
        $user = DB::table('employees')->where('user_fk', Auth::user()->id)->first();

        return view('profile.view', compact('user'));
    }
}
