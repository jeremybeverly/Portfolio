@props(['project'])

<div class="group bg-white border border-neutral-200 rounded-3xl overflow-hidden flex flex-col justify-between transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

    <div>
        @if($project->image)
            <div class="w-full aspect-[4/3] overflow-hidden bg-neutral-100 border-b border-neutral-100">
                <img src="{{ asset('storage/' . $project->image) }}"
                     alt="{{ $project->name }}"
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-102">
            </div>
        @endif

        <div class="p-6 flex flex-col gap-2">
            <a href="{{ route('portfolio.projects.show', $project) }}" class="block hover:text-teal-600 transition-colors duration-200">
                <h3 class="font-bold text-2xl text-neutral-900 tracking-tight leading-snug">
                    {{ $project->name }}
                </h3>
            </a>

            <p class="text-base text-neutral-500 leading-relaxed mt-1">
                {{ $project->description }}
            </p>
        </div>
    </div>

    <div class="px-6 pb-6 pt-2 flex flex-wrap gap-2">
        @if($project->projectType)
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-neutral-100 text-neutral-800 border border-neutral-200/40">
                {{ $project->projectType->name }}
            </span>
        @endif
    </div>
</div>
