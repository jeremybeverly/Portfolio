<x-layouts.app title="Manage Projects">
    <div class="flex justify-between items-center mb-10">
        <div class="flex flex-col gap-1">
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950">Manage Projects</h1>
            <p class="text-sm text-neutral-500">Add, edit, or delete items displayed on your portfolio website.</p>
        </div>
        <a href="{{ route('projects.create') }}" class="bg-neutral-900 text-white text-sm font-medium px-5 py-2.5 rounded-xl hover:bg-neutral-800 transition shadow-sm tracking-wide">
            Add New Project
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($projects as $project)
            <div class="group bg-white border border-neutral-200 rounded-3xl overflow-hidden flex flex-col justify-between transition-all duration-300 hover:shadow-md">
                <div>
                    @if($project->image)
                        <div class="w-full aspect-[4/3] overflow-hidden bg-neutral-100 border-b border-neutral-100">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="p-6 flex flex-col gap-2">
                        <div class="flex justify-between items-start gap-2">
                            <h2 class="font-bold text-2xl text-neutral-900 tracking-tight leading-snug">{{ $project->name }}</h2>
                        </div>

                        @if($project->projectType)
                            <div class="mt-1">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-neutral-100 text-neutral-800 border border-neutral-200/40">
                                    {{ $project->projectType->name }}
                                </span>
                            </div>
                        @endif

                        <p class="text-sm text-neutral-500 leading-relaxed mt-2">{{ $project->description }}</p>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2 flex gap-3">
                    <a href="{{ route('projects.edit', $project) }}" class="flex-1 text-center bg-white border border-neutral-200 text-neutral-700 font-medium px-3 py-2 rounded-xl hover:bg-neutral-50 hover:text-neutral-950 transition text-sm shadow-xs">
                        Edit
                    </a>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?');" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-center bg-red-500 border border-red-600/10 text-white font-medium px-3 py-2 rounded-xl hover:bg-red-600 transition text-sm shadow-xs">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
