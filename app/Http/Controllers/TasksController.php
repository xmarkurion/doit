<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function tasks()
    {
        $zadania = \App\Tasks::all();


        return view('tasks', ['zadania'=> $zadania]);
    }

    public function add()
    {

        return view('add');
    }
}
