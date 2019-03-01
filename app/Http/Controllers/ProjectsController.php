<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectsController extends Controller
{
    public function index() {
        $projects = Project::all();
    
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function show(Project $project) {
        return $project;
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project) {
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();
        $project->update(request(['title', 'description']));
        return redirect('/projects');
        // dd(request()->all());

    }

    public function destroy(Project $project) {
        $project->delete();

        return redirect('/projects');
        // dd("hello");
    }

    public function store() {
        // Project::create([
        //     'title' => request('title'),
        //     'description' => request('description')
        // ]);

        $attributs = request()->validate([
            'title' => ['required', 'min:3', 'max:5'],
            'description' => 'required'
        ]);

        Project::create($attributs);
        return redirect('/projects');
    }
}
