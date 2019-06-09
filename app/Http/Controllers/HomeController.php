<?php

namespace App\Http\Controllers;

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
        $tasks = [
            'Play with sommenoe fainly',
            'learn laraver',
            'Become frontman, endman'
        ];

        return view('home')->with([
            'tasks' => $tasks,
        ]);
    }
}
