<?php

namespace App\Http\Controllers;

use App\Project;


class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        ///$projects = Project::where('owner_id', auth()->id())->get();


        return view('project.index', compact('projects'));
    }

    public function show(Project $project)
    {

        return view('project.show',compact('project'));
    }

    public function create()
    {
        return view('project.create');
    }

    public function store()
    {
        $attributes =request()->validate([
            'title'=> ['required', 'min:3' , 'max:255'],
            'description'=>['required' , 'min:3', 'max:255']

        ]);

        $attributes['owner_id'] = auth()->id();

        Project::create($attributes);


        return redirect('/projects');
    }

    public function edit(Project $project)
    {

        return view ('project.edit',compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(\request(['title','description']));

        return redirect('/projects');


    }

    public function destroy(Project $project)
    {

        $project->delete();

        return redirect('/projects');
    }
}
