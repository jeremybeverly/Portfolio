<x-layouts.portofolio title="My Projects">
    <div class="max-w-5xl mx-auto px-6 py-12">
        <h1 class="text-4xl font-bold tracking-tight text-neutral-950 mb-8">My Projects</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <x-card :project="$project" />
            @endforeach
        </div>
    </div>
</x-layouts.portofolio>
