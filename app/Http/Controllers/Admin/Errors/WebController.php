<?php

namespace App\Http\Controllers\Admin\Errors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function page_403()
    {
        return view('pages.admin.errors.403');
    }

    public function page_404()
    {
        return view('pages.admin.errors.404');
    }

    public function page_500()
    {
        return view('pages.admin.errors.500');
    }
}
