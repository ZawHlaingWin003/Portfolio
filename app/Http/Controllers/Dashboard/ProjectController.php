<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('dashboard.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'project_link' => 'required|unique:projects,project_link',
            'coder' => 'required',
            'overview' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'required'
        ]);

        $filename = time().'-'.$request->image_path->getClientOriginalName();
        $request->image_path->storeAs('images/projects', $filename);

        $tags = explode(",", $request->tags);

        $project = Project::create([
            'title' => $request->title,
            'project_link' => $request->project_link,
            'coder' => $request->coder,
            'overview' => $request->overview,
            'image_path' => $filename
        ]);
        $project->tag($tags);

        return back()->with('success', 'Project Created Successfully');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'project_link' => 'required|unique:projects,project_link,'.$project->id,
            'coder' => 'required',
            'overview' => 'required',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'required'
        ]);

        $input = $request->all();

        $tags = explode(",", $request->tags);

        if($image = $request->file('image_path')) {
            $filename = time().'-'.$request->image_path->getClientOriginalName();
            $request->image_path->storeAs('images', $filename);
            $input['image_path'] = $filename;
        }else {
            unset($input['image_path']);
        }

        $project->update($input);
        $project->tag($tags);

        return redirect()->route('projects.index')->with('success', 'Project Updated Successfully');

    }

    public function destroy(Project $project)
    {
        Storage::delete('frontend/images/projects/'.$project->image_path);
        $project->delete();
        return back()->with('success', 'Project Deleted Successfully');
    }
}
