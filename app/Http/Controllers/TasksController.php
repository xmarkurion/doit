<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Auth;

use App\Tasks;

class TasksController extends Controller
{
    public function index()
    {
        //$zadania = \App\Tasks::all();
        $zadania = Tasks::all();

        //return view('tasks', ['zadania'=> $zadania]);
        return view('tasks', compact('zadania'));
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

    public function edit($id)
    {

        $zadanie = Tasks::find($id);
        return view('edit', compact('zadanie'));
    }
}
