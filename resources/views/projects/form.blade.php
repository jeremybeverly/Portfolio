<x-layouts.app title="{{ isset($project) ? 'Edit Project' : 'Create Project' }}">
    <div class="max-w-2xl mx-auto py-6">

        <a href="{{ route('projects.index') }}" class="inline-flex items-center text-sm text-neutral-500 hover:text-neutral-950 transition mb-6">
            ← Back to Management
        </a>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-neutral-200/60">
            <h2 class="text-3xl font-extrabold text-neutral-950 tracking-tight mb-2">
                {{ isset($project) ? 'Edit Project' : 'Create New Project' }}
            </h2>
            <p class="text-sm text-neutral-500 mb-8">Fill in the fields below to update your dynamic workspace portfolio information.</p>

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
                    <input type="text"
                           name="name"
                           id="name"
                           required
                           value="{{ old('name', $project->name ?? '') }}"
                           class="w-full border {{ $errors->has('name') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:outline-none transition text-neutral-900 placeholder-neutral-400"
                           placeholder="e.g. Portfolio Infrastructure Automation">
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="project_type_id" class="block text-sm font-semibold text-neutral-800 mb-1.5">Project Type / Specialty</label>
                    <select name="project_type_id"
                            id="project_type_id"
                            required
                            class="w-full border {{ $errors->has('project_type_id') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:outline-none transition text-neutral-900">
                        <option value="" disabled {{ !isset($project) ? 'selected' : '' }}>Select Specialty Tag...</option>
                        @foreach($projectTypes as $type)
                            <option value="{{ $type->id }}" {{ old('project_type_id', $project->project_type_id ?? '') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('project_type_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-neutral-800 mb-1.5">Description</label>
                    <textarea name="description"
                              id="description"
                              required
                              rows="4"
                              class="w-full border {{ $errors->has('description') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:outline-none transition text-neutral-900 placeholder-neutral-400"
                              placeholder="Describe your architecture stack, your workflow, and objectives...">{{ old('description', $project->description ?? '') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image" class="block text-sm font-semibold text-neutral-800 mb-1.5">Project Cover Image</label>
                    <input type="file"
                           name="image"
                           id="image"
                           {{ isset($project) ? '' : 'required' }}
                           class="w-full text-sm text-neutral-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-neutral-100 file:text-neutral-700 hover:file:bg-neutral-200 file:transition file:cursor-pointer border border-neutral-200 rounded-xl p-2 bg-neutral-50/50">
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    @if(isset($project) && $project->image)
                        <div class="mt-4 p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl max-w-xs">
                            <p class="text-xs font-semibold text-neutral-500 mb-2">Current Active Image Cover:</p>
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-auto rounded-xl shadow-xs border border-neutral-200/40">
                        </div>
                    @endif
                </div>

                <div class="border-t border-neutral-200/60 pt-6" x-data="{ items: [] }">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-neutral-900 tracking-tight">Project Gallery Images</h3>
                            <p class="text-xs text-neutral-500">Attach additional images paired with individual descriptions.</p>
                        </div>
                        <button type="button" @click="items.push({ id: Date.now() })" class="bg-neutral-100 border border-neutral-200 text-neutral-800 text-xs font-semibold px-4 py-2 rounded-xl hover:bg-neutral-200 transition cursor-pointer">
                            + Add Item
                        </button>
                    </div>

                    @if(isset($project) && $project->images->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            @foreach($project->images as $galleryImage)
                                <div class="p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl flex gap-4 items-center">
                                    <img src="{{ asset('storage/' . $galleryImage->image_path) }}" class="w-20 h-20 object-cover rounded-xl border border-neutral-200">
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs text-neutral-500 italic truncate">{{ $galleryImage->caption ?? 'No description provided' }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="space-y-4">
                        <template x-for="(item, index) in items" :key="item.id">
                            <div class="p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl relative space-y-3">
                                <button type="button" @click="items.splice(index, 1)" class="absolute top-3 right-3 text-neutral-400 hover:text-red-500 text-xs transition cursor-pointer">
                                    Remove
                                </button>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
                                    <div>
                                        <label class="block text-xs font-semibold text-neutral-700 mb-1">Image File</label>
                                        <input type="file"
                                               :name="'gallery[' + index + '][file]'"
                                               required
                                               class="w-full text-xs text-neutral-500 file:mr-3 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-white file:text-neutral-700 hover:file:bg-neutral-100 border border-neutral-200 rounded-lg p-1 bg-white">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-neutral-700 mb-1">Optional Description</label>
                                        <input type="text"
                                               :name="'gallery[' + index + '][caption]'"
                                               class="w-full border border-neutral-200 bg-white rounded-lg p-2 text-xs focus:ring-1 focus:ring-neutral-900 focus:outline-none transition text-neutral-900 placeholder-neutral-400"
                                               placeholder="Describe this gallery photo view...">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

                <div class="flex justify-end pt-4 border-t border-neutral-100">
                    <button type="submit" class="bg-neutral-900 text-white font-medium text-sm py-2.5 px-6 rounded-xl hover:bg-neutral-800 transition shadow-sm tracking-wide">
                        {{ isset($project) ? 'Update Project Structure' : 'Save to Production DB' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
