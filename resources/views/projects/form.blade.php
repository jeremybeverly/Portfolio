<x-layouts.app title="{{ isset($project) ? 'Edit Project' : 'Create Project' }}">
    <div class="max-w-2xl mx-auto py-2">
        <a href="{{ route('projects.index') }}" class="inline-flex items-center text-sm font-medium text-neutral-500 hover:text-neutral-950 transition mb-6">
            &larr; Back to Management
        </a>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-neutral-200/60">
            <h2 class="text-3xl font-extrabold text-neutral-950 tracking-tight mb-8">
                {{ isset($project) ? 'Edit Project' : 'Create New Project' }}
            </h2>

            <form action="{{ isset($project) ? route('projects.update', $project) : route('projects.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @if(isset($project))
                    @method('PUT')
                @endif

                <div>
                    <label for="name" class="block text-sm font-semibold text-neutral-800 mb-1.5">Project Name</label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $project->name ?? '') }}" class="w-full border {{ $errors->has('name') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:outline-none transition text-neutral-900">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="project_type_id" class="block text-sm font-semibold text-neutral-800 mb-1.5">Project Type</label>
                    <select name="project_type_id" id="project_type_id" required class="w-full border {{ $errors->has('project_type_id') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:ring-neutral-900 focus:outline-none transition text-neutral-900">
                        <option value="" disabled {{ !isset($project) ? 'selected' : '' }}>Select Type</option>
                        @foreach($projectTypes as $type)
                            <option value="{{ $type->id }}" {{ old('project_type_id', $project->project_type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('project_type_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-neutral-800 mb-1.5">Project Description</label>
                    <textarea name="description" id="description" required rows="4" class="w-full border {{ $errors->has('description') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:ring-neutral-900 focus:outline-none transition text-neutral-900 " >{{ old('description', $project->description ?? '') }}</textarea>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-semibold text-neutral-800 mb-1.5">Cover / Thumbnail</label>
                    <input type="file" name="image" id="image" {{ isset($project) ? '' : 'required' }} class="w-full text-sm text-neutral-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-neutral-100 file:text-neutral-700 hover:file:bg-neutral-200 file:transition file:cursor-pointer border border-neutral-200 rounded-xl p-2 bg-neutral-50/50">
                    @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

                    @if(isset($project) && $project->image)
                        <div class="mt-4 p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl max-w-xs">
                            <p class="text-xs font-semibold text-neutral-500 mb-2">Current Cover Thumbnail:</p>
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-auto rounded-xl shadow-sm border border-neutral-200/40">
                        </div>
                    @endif
                </div>

                <div class="border-t border-neutral-200/60 pt-6" x-data="{ items: [ {id: Date.now()} ] }">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-neutral-900 tracking-tight">Project Screenshots</h3>
                        </div>
                        <button type="button" @click="items.push({ id: Date.now() })" class="bg-neutral-100 border border-neutral-200 text-neutral-800 text-xs font-semibold px-4 py-2 rounded-xl hover:bg-neutral-200 transition cursor-pointer shadow-sm">
                            + Add Picture
                        </button>
                    </div>

                    <div class="space-y-3 mb-2">
                        <template x-for="(item, index) in items" :key="item.id">
                            <div class="p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl relative flex flex-col gap-4">
                                <button type="button" @click="if(items.length > 1) items.splice(index, 1)" class="absolute top-4 right-4 text-neutral-400 hover:text-red-500 text-xs font-medium transition cursor-pointer">
                                    Remove
                                </button>

                                <div class="w-full md:w-3/4 pr-12">
                                    <label class="block text-xs font-semibold text-neutral-700 mb-1.5">Artwork / Screenshot File</label>
                                    <input type="file" :name="'gallery[' + index + '][file]'" class="w-full text-sm text-neutral-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-white border border-neutral-200 rounded-xl p-1.5 bg-white cursor-pointer shadow-sm">
                                </div>

                                <div class="w-full">
                                    <label class="block text-xs font-semibold text-neutral-700 mb-1.5">Image Caption / Description</label>
                                    <input type="text" :name="'gallery[' + index + '][caption]'"  class="w-full border border-neutral-200 bg-white rounded-xl p-2.5 text-sm focus:ring-1 focus:ring-neutral-900 focus:outline-none transition text-neutral-900 ">
                                </div>
                            </div>
                        </template>
                    </div>

                    @error('gallery.*')<p class="text-red-500 text-xs mt-2">{{ $message }}</p>@enderror

                    @if(isset($project) && $project->images->count() > 0)
                        <div class="mt-8 pt-4 border-t border-neutral-100">
                            <p class="text-sm font-bold text-red-600 mb-3">Delete Existing Screenshots:</p>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach($project->images as $galleryImage)
                                    <div class="aspect-square bg-neutral-100 rounded-xl overflow-hidden border border-neutral-200/60 shadow-sm relative group">
                                        <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-sm">
                                            <label class="flex items-center gap-2 cursor-pointer bg-white px-3 py-1.5 rounded-lg shadow-sm">
                                                <input type="checkbox" name="delete_gallery_images[]" value="{{ $galleryImage->id }}" class="w-4 h-4 text-red-600 rounded border-gray-300 focus:ring-red-600">
                                                <span class="text-xs font-bold text-red-600">Delete</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <div class="flex justify-end pt-4 border-t border-neutral-100">
                    <button type="submit" class="bg-neutral-900 text-white font-medium text-sm py-2.5 px-6 rounded-xl hover:bg-neutral-800 transition shadow-sm tracking-wide">
                        {{ isset($project) ? 'Update Project' : 'Publish Project' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
