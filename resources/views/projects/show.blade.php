@extends('layout')

@section('content')
    <h1 class="title">{{ $project->title }} </h1>
    <div class="container">{{ $project->description }} </div>
    <p>
            <a href="/laravelapps/project/public/projects/{{ $project->id }}/edit">
                Edit
            </a>
    </p>

    @if ($project->tasks->count())
        
    <div>
       <?php
        foreach ($project->tasks as $task){ 
        
            ?>
            <div> 
                <form method="POST" action="/laravelapps/project/public/tasks/{{ $task->id }}">
                    @method('PATCH')
                    @csrf
                    
                    <label for="completed" class="checkbox">
                        <input type="checkbox" name="completed" onchange="this.form.submit()" {{ $task->completed? 'checked': ''}}>
                        {{ $task->description }}
                    </label>
                </form>
            </div>   
      <?php  } ?>
    </div>
    @endif

    <form method="POST" action="/laravelapps/project/public/projects/{{ $project->id }}/tasks" class="box">
            @csrf
            <div class="field">
                <label for="description" class="checkbox">New task</label>
                <div class="control">
                    <input type="text" placeholder="Enter description" name="description">
                </div>
            </div>
            <div class="field">
                    <div class="control">
                        <button type="submit" placeholder="btn btn-primary">Add Task </button>
                    </div>
                </div>
            @if ($errors->any())
            <div class="notification is-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
