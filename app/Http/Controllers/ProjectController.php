<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType; // Import ProjectType model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('projectType')->latest()->get();

        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function portfolio()
    {
        $projects = Project::latest()->get();

        return view('projects', [
            'projects' => $projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projectTypes = ProjectType::all();
        return view('projects.form', compact('projectTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_type_id' => 'required|exists:project_types,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        $project = Project::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'project_type_id' => $validated['project_type_id']
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'caption' => null,
                ]);
            }
        }

        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load(['images', 'projectType']);

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $projectTypes = ProjectType::all(); // Fetch all project types
        return view('projects.form', compact('project', 'projectTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'project_type_id' => 'required|exists:project_types,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'project_type_id' => $validated['project_type_id'],
            'image' => $validated['image'] ?? $project->image,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('projects/gallery', 'public');
                $project->images()->create([
                    'image_path' => $path,
                    'caption' => null,
                ]);
            }
        }

        if ($request->has('delete_gallery_images')) {
            foreach ($request->input('delete_gallery_images') as $imageId) {
                $projectImage = $project->images()->find($imageId);
                if ($projectImage) {
                    Storage::disk('public')->delete($projectImage->image_path);
                    $projectImage->delete();
                }
            }
        }

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        foreach ($project->images as $img) {
            Storage::disk('public')->delete($img->image_path);
        }

        $project->delete();
        return redirect()->route('projects.index');
    }
}
