@props(['project'])

<div class="group bg-white block max-w-sm border border-neutral-200 rounded-3xl overflow-hidden shadow-sm transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

    @if($project->image)
        <a href="{{ route('portfolio.projects.show', $project) }}" class="block w-full aspect-[4/3] overflow-hidden bg-neutral-100 border-b border-neutral-100">
            <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-102"
                 src="{{ asset('storage/' . $project->image) }}"
                 alt="{{ $project->name }}" />
        </a>
    @endif

    <div class="p-6 flex flex-col items-start text-left">

        @if($project->projectType)
            <span class="inline-flex items-center bg-neutral-100 border border-neutral-200 text-neutral-800 text-xs font-semibold px-3 py-1.5 rounded-full">
                <svg class="w-3.5 h-3.5 me-1 text-neutral-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.122 17.645a7.185 7.185 0 0 1-2.656 2.495 7.06 7.06 0 0 1-3.52.853 6.617 6.617 0 0 1-3.306-.718 6.73 6.73 0 0 1-2.54-2.266c-2.672-4.57.287-8.846.887-9.668A4.448 4.448 0 0 0 8.07 6.31 4.49 4.49 0 0 0 7.997 4c1.284.965 6.43 3.258 5.525 10.631 1.496-1.136 2.7-3.046 2.846-6.216 1.43 1.061 3.985 5.462 1.754 9.23Z"/>
                </svg>
                {{ $project->projectType->name }}
            </span>
        @endif

        <a href="{{ route('portfolio.projects.show', $project) }}" class="block group/title mt-4">
            <h5 class="text-2xl font-bold tracking-tight text-neutral-900 group-hover/title:text-teal-500 transition-colors duration-200">
                {{ $project->name }}
            </h5>
        </a>

        <p class="mt-2 mb-6 text-sm text-neutral-500 leading-relaxed">
            {{ $project->description }}
        </p>

        <a href="{{ route('portfolio.projects.show', $project) }}" class="mt-auto inline-flex items-center text-white bg-neutral-900 hover:bg-neutral-800 transition-colors duration-200 font-medium leading-5 rounded-xl text-sm px-5 py-2.5 shadow-sm">
            Read more
            <svg class="w-4 h-4 ms-1.5 transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
            </svg>
        </a>
    </div>
</div>
