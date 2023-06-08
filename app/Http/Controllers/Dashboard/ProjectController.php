<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Skill;
use App\Models\Project;
use Illuminate\Support\Str;
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skills' => 'required'
        ]);

        $slug = Str::slug($request->title, '-');
        $file = $request->file('image');
        $folder = 'images/projects';

        $filename = time() . '-' . $slug . '.' . $file->getClientOriginalExtension();
        $request->image->storeAs($folder, $filename);

        $project = Project::create([
            'title' => $request->title,
            'project_link' => $request->project_link,
            'coder' => $request->coder,
            'overview' => $request->overview,
            'image' => $filename
        ]);

        $requestedSkills = explode(",", $request->skills);

        foreach ($requestedSkills as $skill) {
            $newSkill = Skill::firstOrCreate([
                'name' => $skill
            ]);

            $project->skills()->attach($newSkill);
        }

        return back()->with('success', 'Project Created Successfully');
    }

    public function edit(Project $project)
    {
        return view('dashboard.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required',
            'project_link' => 'required|unique:projects,project_link,' . $project->id,
            'coder' => 'required',
            'overview' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project->title = $request->title;
        $project->project_link = $request->project_link;
        $project->coder = $request->coder;
        $project->overview = $request->overview;

        if ($request->hasFile('image')) {

            $oldFile = "images/projects/" . $project->getRawOriginal('image');
            if (Storage::exists($oldFile)) {
                Storage::delete($oldFile);
            }

            $slug = Str::slug($request->title, '-');
            $file = $request->file('image');
            $folder = 'images/projects';

            $filename = time() . '-' . $slug . '.' . $file->getClientOriginalExtension();
            $request->image->storeAs($folder, $filename);

            $project->image = $filename;
        } else {
            unset($request->image);
        }

        if ($request->has('skills')) {
            $requestedSkills = explode(",", $request->skills);
    
            foreach ($requestedSkills as $skill) {
                $newSkill = Skill::firstOrCreate([
                    'name' => $skill
                ]);
    
                $project->skills()->attach($newSkill);
            }
        }

        $project->update();

        return redirect()->route('projects.index')->with('success', 'Project Updated Successfully');
    }

    public function destroy(Project $project)
    {
        Storage::delete('images/projects/' . $project->getRawOriginal('image'));
        $project->delete();
        return back()->with('success', 'Project Deleted Successfully');
    }
}
