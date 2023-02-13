<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuario = User::leftJoin('employees', function($join) {
            $join->on('users.id', 'employees.user_fk');
        })
        ->first([
            'employees.identification',
            'users.username',
            'users.name'
        ]);


        // dd($usuario);
        return view('home');
    }
}
