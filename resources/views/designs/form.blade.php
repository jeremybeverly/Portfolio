<x-layouts.app title="{{ isset($designWork) ? 'Edit Creative Work' : 'Create Creative Work' }}">
    <div class="max-w-2xl mx-auto py-2">
        <a href="{{ route('designs.index') }}" class="inline-flex items-center text-sm font-medium text-neutral-500 hover:text-neutral-950 transition mb-6">
            &larr; Back to Management
        </a>

        <div class="bg-white p-8 rounded-3xl shadow-sm border border-neutral-200/60">
            <h2 class="text-3xl font-extrabold text-neutral-950 tracking-tight mb-2">
                {{ isset($designWork) ? 'Edit Creative Work' : 'Create New Creative Work' }}
            </h2>
            <p class="text-sm text-neutral-500 mb-8">Fill in the fields below to update your dynamic creative design showcase details.</p>

            <form action="{{ isset($designWork) ? route('designs.update', $designWork) : route('designs.store') }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="space-y-6">

                @csrf
                @if(isset($designWork))
                    @method('PUT')
                @endif

                <div>
                    <label for="name" class="block text-sm font-semibold text-neutral-800 mb-1.5">Artwork / Concept Title</label>
                    <input type="text" name="name" id="name" required value="{{ old('name', $designWork->name ?? '') }}" class="w-full border {{ $errors->has('name') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:outline-none transition text-neutral-900 placeholder-neutral-400" placeholder="e.g. Minimalist FinTech Dashboard Design">
                    @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="design_work_type_id" class="block text-sm font-semibold text-neutral-800 mb-1.5">Design Field</label>
                    <select name="design_work_type_id" id="design_work_type_id" required class="w-full border {{ $errors->has('design_work_type_id') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:ring-neutral-900 focus:outline-none transition text-neutral-900">
                        <option value="" disabled {{ !isset($designWork) ? 'selected' : '' }}>Select Creative Domain...</option>
                        @foreach($designWorkTypes as $type)
                            <option value="{{ $type->id }}" {{ old('design_work_type_id', $designWork->design_work_type_id ?? '') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @error('design_work_type_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-neutral-800 mb-1.5">Creative Process Description</label>
                    <textarea name="description" id="description" required rows="4" class="w-full border {{ $errors->has('description') ? 'border-red-400 focus:ring-red-500' : 'border-neutral-200 focus:ring-neutral-900' }} bg-neutral-50/50 rounded-xl p-3 text-sm focus:ring-1 focus:ring-neutral-900 focus:outline-none transition text-neutral-900 placeholder-neutral-400" placeholder="Describe the design style guide details, typography choices, grid system, or guidelines...">{{ old('description', $designWork->description ?? '') }}</textarea>
                    @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>

                <!-- Primary Cover Thumbnail -->
                <div>
                    <label for="cover_image" class="block text-sm font-semibold text-neutral-800 mb-1.5">Primary Display Cover</label>
                    <input type="file" name="cover_image" id="cover_image" {{ isset($designWork) ? '' : 'required' }} class="w-full text-sm text-neutral-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-neutral-100 file:text-neutral-700 hover:file:bg-neutral-200 file:transition file:cursor-pointer border border-neutral-200 rounded-xl p-2 bg-neutral-50/50">
                    <p class="text-xs text-neutral-500 mt-1">Uploading a new image will automatically replace the old one.</p>
                    @error('cover_image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror

                    @if(isset($designWork) && $designWork->cover_image)
                        <div class="mt-4 p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl max-w-xs">
                            <p class="text-xs font-semibold text-neutral-500 mb-2">Current Active Cover Banner:</p>
                            <img src="{{ asset('storage/' . $designWork->cover_image) }}" alt="{{ $designWork->name }}" class="w-full h-auto rounded-xl shadow-sm border border-neutral-200/40">
                        </div>
                    @endif
                </div>

                <!-- Dynamic Artboard Gallery -->
                <div class="border-t border-neutral-200/60 pt-6" x-data="{ items: [ {id: Date.now()} ] }">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h3 class="text-lg font-bold text-neutral-900 tracking-tight">Design Canvas Gallery</h3>
                            <p class="text-xs text-neutral-500">Upload additional artboards, screens, or vectors individually.</p>
                        </div>
                        <button type="button" @click="items.push({ id: Date.now() })" class="bg-neutral-100 border border-neutral-200 text-neutral-800 text-xs font-semibold px-4 py-2 rounded-xl hover:bg-neutral-200 transition cursor-pointer shadow-sm">
                            + Add Picture
                        </button>
                    </div>

                    <div class="space-y-3 mb-2">
                        <template x-for="(item, index) in items" :key="item.id">
                            <div class="p-4 bg-neutral-50 border border-neutral-200/60 rounded-2xl relative flex items-center justify-between">
                                <div class="flex-1">
                                    <label class="block text-xs font-semibold text-neutral-700 mb-1.5">Artwork File (Variant / Artboard)</label>
                                    <input type="file" name="gallery[]" class="w-full md:w-3/4 text-sm text-neutral-500 file:mr-3 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-white border border-neutral-200 rounded-xl p-1.5 bg-white cursor-pointer shadow-sm">
                                </div>
                                <button type="button" @click="if(items.length > 1) items.splice(index, 1)" class="text-neutral-400 hover:text-red-500 text-xs font-medium transition cursor-pointer px-3">
                                    Remove
                                </button>
                            </div>
                        </template>
                    </div>

                    @error('gallery.*')<p class="text-red-500 text-xs mt-2">{{ $message }}</p>@enderror

                    <!-- Existing Uploaded Images with Delete Checkboxes -->
                    @if(isset($designWork) && $designWork->images->count() > 0)
                        <div class="mt-8 pt-4 border-t border-neutral-100">
                            <p class="text-sm font-bold text-red-600 mb-3">Delete Existing Artboards:</p>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                @foreach($designWork->images as $galleryImage)
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
                        {{ isset($designWork) ? 'Update Creative Work' : 'Publish Design Work' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
