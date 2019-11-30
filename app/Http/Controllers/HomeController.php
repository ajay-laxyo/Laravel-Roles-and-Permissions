<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('role:Super Admin');
    //      // $this->middleware('permission:user-create', ['only' => ['create','store']]);
    //      // $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
    //      // $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('permission:Super Admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
