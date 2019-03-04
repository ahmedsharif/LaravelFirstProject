<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;
use App\Project;

use App\Services\Twitter;
// use App\User;


class ProjectsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index() {

        $projects = Project::where('user_id', auth()->id())->get();
    
        return view('projects.index', compact('projects'));
    }

    public function create() {
        return view('projects.create');
    }

    public function show(Project $project, Twitter $twitter) {
        // dd($project);
        // $data = array();
        // $data['project'] = Project::Where('id' , $project->id)->with('tasks')->first();
        
        // return view('projects.show', $data);
        // $twitter = app('twitter');
        // dd($twitter);
        // $filesystem = app('Illuminate\Filesystem\Filesystem');
        $this->authorize('view', $project);

        // abort_if(! auth()->user()->owns($project));

        // abort_if($project->user_id !== auth()->id(), 403);
        
        return view('projects.show', compact('project'));

        // dd($file);
    }

    public function edit(Project $project) {
        return view('projects.edit', compact('project'));
    }

    public function update(Project $project) {
        // $project->title = request('title');
        // $project->description = request('description');
        // $project->save();
        $this->authorize('update', $project);

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

        Project::create($attributs + ['user_id' => auth()->id()]);
        return redirect('/projects');
    }
}
