<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view("projects.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newProject = new Project();
        $newProject->name = $data['name'];
        $newProject->customer = $data['customer'];
        $newProject->period_start = $data['period_start'];
        $newProject->period_end = $data['period_end'];
        $newProject->summary = $data['summary'];
        $newProject->type_id = $data['type_id'];

        $newProject->save();

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($data['technologies']);
        }
        return redirect() -> route("projects.show", $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view("projects.edit", compact("types", "project", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();

        $project->name = $data['name'];
        $project->customer = $data['customer'];
        $project->period_start = $data['period_start'];
        $project->period_end = $data['period_end'];
        $project->summary = $data['summary'];
        $project->type_id = $data['type_id'];

        $project->update();

        if ($request->has('technologies')) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }


        return redirect() -> route("projects.show", $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project -> delete();
        return redirect() -> route("projects.index");
    }
}
