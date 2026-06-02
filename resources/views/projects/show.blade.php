<x-layouts.portofolio :title="$project->name">
    <div class="max-w-4xl mx-auto px-6 py-16 pb-32">

        <a href="{{ route('portfolio.projects') }}" class="inline-flex items-center text-sm text-neutral-500 hover:text-neutral-950 transition mb-6">
            ← Back to All Projects
        </a>

        <div class="flex flex-col gap-2 mb-8">
            @if($project->projectType)
                <span class="text-xs font-semibold tracking-wider text-teal-600 uppercase">
                    {{ $project->projectType->name }}
                </span>
            @endif
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950 md:text-5xl">
                {{ $project->name }}
            </h1>
        </div>

        @if($project->image)
            <div class="w-full aspect-[16/9] overflow-hidden rounded-3xl border border-neutral-200/60 shadow-sm mb-12 bg-neutral-100">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="max-w-none text-neutral-700 leading-relaxed text-lg mb-16">
            <h3 class="text-xl font-bold text-neutral-950 mb-3">About the Project</h3>
            <p>{{ $project->description }}</p>
        </div>

        @if($project->images && $project->images->count() > 0)
            <div class="border-t border-neutral-200/60 pt-12">
                <h3 class="text-2xl font-bold text-neutral-950 tracking-tight mb-6">Project Gallery & Specifications</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($project->images as $galleryImage)
                        <div class="group bg-white border border-neutral-200 rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between">
                            <div class="w-full aspect-[4/3] overflow-hidden bg-neutral-50">
                                <img src="{{ asset('storage/' . $galleryImage->image_path) }}"
                                     alt="Gallery Image asset for {{ $project->name }}"
                                     class="w-full h-full object-cover transition duration-300 group-hover:scale-102">
                            </div>

                            <div class="p-4 bg-neutral-50/60 border-t border-neutral-100 min-h-[70px] flex items-center">
                                <p class="text-sm text-neutral-600 leading-relaxed font-normal">
                                    {{ $galleryImage->caption ?? 'No additional description provided for this perspective view.' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</x-layouts.portofolio>
