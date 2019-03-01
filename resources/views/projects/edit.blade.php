@extends('layout')

@section('content')
    <h1 class="title">Edit content </h1>

    <form method="POST" action="/laravelapps/project/public/projects/{{ $project->id }}">
        @method('PATCH')
        @csrf

        <div class="field">
            <label for="" class="label">Title</label>
            <div class="control">
                <input type="text" name="title" class="input" value="{{ $project->title }}">
            </div>
        </div>

        <div class="field">
            <label for="" class="label">Description</label>
            <div class="control">
                <textarea type="text" name="description" class="textarea">{{ $project->description }}</textarea>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="textarea">Update Project</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/laravelapps/project/public/projects/{{ $project->id }}"> 
        @method('DELETE')
        @csrf

        <div class="field">
            <div class="control">
                <button type="submit">Delete Project</button>
            </div>
        </div>
    </form>
@endsection