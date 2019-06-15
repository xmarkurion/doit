<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;
use Illuminate\Support\Facades\Auth;

use App\Tasks;

class TasksController extends Controller
{
    public function isThisTasksYours($id)
    {
        $zadanie = Tasks::findOrFail($id);

        $live_user = Auth::id();
        $task_user = $zadanie->user_id;

        if($live_user == $task_user)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        //$zadania = \App\Tasks::all();
        //return view('tasks', ['zadania'=> $zadania]);

        $zadania = Tasks::where('user_id', Auth::id())->get();
        return view('tasks', compact('zadania'));
    }



    public function create()
    {
        return view('add');
    }

    public function edit($id)
    {
        /*$zadanie = Tasks::findOrFail($id);

        $live_user = Auth::id();
        $task_user = $zadanie->user_id;

        if($live_user==$task_user)
        */
        if($this->isThisTasksYours($id))
        {
            $zadanie = Tasks::findOrFail($id);
            return view('edit', compact('zadanie'));
        }
        else // if user will try to edit not his task...
        {
            return redirect('/tasks');
        }

    }

    public function update($id)
    {
        $zadanie = Tasks::findOrFail($id);
        $zadanie->title = request('title');
        $zadanie->description = request('description');
        $zadanie->save();

        return redirect('tasks');
    }

    public function done($id)
    {
        if(!$this->isThisTasksYours($id))
        {
            return redirect ('/tasks');
        }
        $zadanie = Tasks::findOrFail($id);
        $zadanie->status = true;
        $zadanie->save();
        return redirect('/tasks');
    }

    public function undone($id)
    {
        if(!$this->isThisTasksYours($id))
        {
            return redirect ('/tasks');
        }

        $zadanie = Tasks::findOrFail($id);
        $zadanie->status = false;
        $zadanie->save();
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        if(!$this->isThisTasksYours($id))
        {
            return redirect ('/tasks');
        }

        Tasks::findOrFail($id)->delete();
        return redirect('/tasks');
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
