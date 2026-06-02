<x-layouts.portofolio :title="$project->name">
    <div class="max-w-5xl mx-auto px-6 py-16 pb-32">

        <a href="{{ route('portfolio.projects') }}" class="inline-flex items-center text-sm text-neutral-500 hover:text-neutral-950 transition mb-10">
            &larr; Back to All Projects
        </a>

        <!-- Project Header -->
        <div class="mb-10 text-left">
            @if($project->projectType)
                <span class="text-sm font-semibold tracking-wider text-teal-600 uppercase block mb-3">
                    {{ $project->projectType->name }}
                </span>
            @endif
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950 md:text-6xl">
                {{ $project->name }}
            </h1>
        </div>

        <!-- Huge Main Thumbnail -->
        @if($project->image)
            <figure class="w-full aspect-[21/9] overflow-hidden rounded-3xl mb-16">
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
            </figure>
        @endif

        <!-- Editorial Description -->
        <article class="prose prose-lg max-w-none text-neutral-700 leading-relaxed mb-20 text-left">
            <h3 class="text-2xl font-bold text-neutral-950 mb-4">About the Project</h3>
            <p class="whitespace-pre-line text-xl text-neutral-600">{{ $project->description }}</p>
        </article>

        <!-- Medium-Style Clean Gallery List -->
        @if($project->images && $project->images->count() > 0)
            <div class="flex flex-col gap-16 pt-10 border-t border-neutral-200/60">
                @foreach($project->images as $galleryImage)
                    <div class="flex flex-col md:flex-row gap-10 items-start">

                        <!-- Borderless Clean Image -->
                        <div class="w-full md:w-7/12 rounded-2xl overflow-hidden shrink-0 bg-neutral-100">
                            <img src="{{ asset('storage/' . $galleryImage->image_path) }}"
                                 alt="Gallery Image"
                                 class="w-full h-auto object-cover">
                        </div>

                        <!-- Clean Typography Description -->
                        <div class="w-full md:w-5/12 pt-2 text-left">
                            <h4 class="text-lg font-bold text-neutral-900 mb-2">Image Overview</h4>
                            <p class="text-neutral-500 text-lg leading-relaxed">
                                {{ $galleryImage->caption ?? 'A detailed look at the interface architecture, structural layout, and core user experience flows designed for this specific screen.' }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-layouts.portofolio>
