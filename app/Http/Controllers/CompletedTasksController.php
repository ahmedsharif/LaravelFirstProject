<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class CompletedTasksController extends Controller
{
    public function store(Task $task) {
        $task->complete();
        return back();
    }

    public function destory() {
        $task->incomplete();
        return back();
    }
}
