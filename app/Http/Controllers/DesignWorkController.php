<?php

namespace App\Http\Controllers;

use App\Models\DesignWork;
use App\Models\DesignWorkType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DesignWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = DesignWork::with('designWorkType')->latest()->get();
        return view('designs.index', compact('works'));
    }

    public function portfolio()
    {
        $works = DesignWork::latest()->get();
        return view('designWorks', compact('works')); // Corrected: return view and pass data
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $designWorkTypes = DesignWorkType::all();
        return view('designs.form', compact('designWorkTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'cover_image' => 'required|image|max:2048',
            'design_work_type_id' => 'required|exists:design_work_types,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('designs', 'public');
        }

        $designWork = DesignWork::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'cover_image' => $validated['cover_image'] ?? null,
            'design_work_type_id' => $validated['design_work_type_id'],
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('designs/gallery', 'public');

                $designWork->images()->create([
                    'image_path' => $path,
                    'caption' => null,
                ]);
            }
        }

        return redirect()->route('designs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(DesignWork $designWork) // Changed $design to $designWork
    {
        $designWork->load('images', 'designWorkType');
        return view('designs.show', compact('designWork')); // Changed compact('design') to compact('designWork')
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignWork $designWork) // Changed $design to $designWork
    {
        $designWorkTypes = DesignWorkType::all();
        return view('designs.form', compact('designWork', 'designWorkTypes')); // Changed ['designWork' => $design] to compact('designWork', 'designWorkTypes')
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignWork $designWork) // Changed $design to $designWork
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
            'design_work_type_id' => 'required|exists:design_work_types,id',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle cover image update
        if ($request->hasFile('cover_image')) {
            if ($designWork->cover_image) {
                Storage::disk('public')->delete($designWork->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('designs', 'public');
        }

        $designWork->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'design_work_type_id' => $validated['design_work_type_id'],
            'cover_image' => $validated['cover_image'] ?? $designWork->cover_image,
        ]);

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $file) {
                $path = $file->store('designs/gallery', 'public');

                $designWork->images()->create([
                    'image_path' => $path,
                    'caption' => null,
                ]);
            }
        }

        // Handle updates to existing gallery image captions
        if ($request->has('existing_gallery_images')) {
            foreach ($request->input('existing_gallery_images') as $imageId => $imageData) {
                $designWorkImage = $designWork->images()->find($imageId); // Changed $design->images to $designWork->images
                if ($designWorkImage) {
                    $designWorkImage->update(['caption' => $imageData['caption'] ?? null]);
                }
            }
        }

        if ($request->has('delete_gallery_images')) {
            foreach ($request->input('delete_gallery_images') as $imageId) {
                $designWorkImage = $designWork->images()->find($imageId);
                if ($designWorkImage) {
                    Storage::disk('public')->delete($designWorkImage->image_path);
                    $designWorkImage->delete();
                }
            }
        }

        return redirect()->route('designs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignWork $designWork) // Changed $design to $designWork
    {
        if ($designWork->cover_image) { // Changed $design->cover_image to $designWork->cover_image
            Storage::disk('public')->delete($designWork->cover_image);
        }

        foreach ($designWork->images as $img) { // Changed $design->images to $designWork->images
            Storage::disk('public')->delete($img->image_path);
        }

        $designWork->delete();
        return redirect()->route('designs.index');
    }
}
