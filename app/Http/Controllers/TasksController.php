<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Auth;

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

    public function store()
    {
        $zadanie = new \App\Tasks;
        $zadanie->user_id = Auth::id();
        $zadanie->parent_id = 0;
        $zadanie->title = request('title');
        $zadanie->description = request('description');
        $zadanie->status = false;
        $zadanie->save();

        return redirect('/tasks');
    }
}
