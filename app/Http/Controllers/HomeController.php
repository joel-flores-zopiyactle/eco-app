<?php

namespace App\Http\Controllers;

use App\Models\Categorys;
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
        $categories =  Categorys::where('isPublished', true)->paginate(20);
        return view('home', ['categories' => $categories]);
    }
}
