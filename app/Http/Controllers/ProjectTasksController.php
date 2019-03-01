<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    public function update(Task $task) {
        // dd(request()->all());
        // dd('hello');

        $task->update([
            'completed' => request()->has('completed')
        ]);

        return back();

    }    

    public function store(Project $project) {
        // var_dump($project->description);
        // exit;
        $attributes = request()->validate(['description' => 'required']);
        $project->addTask($attributes);
        return back();
    }
    
    
}