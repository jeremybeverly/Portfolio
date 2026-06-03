<x-layouts.portofolio title="My Projects">
    <div class="max-w-5xl mx-auto px-6 py-12">
        <div class="w-full flex flex-col items-start text-left">
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950">Proud Projects.</h1>
            <p class="text-neutral-500 text-lg mb-10">Projects I have made in college.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
                <x-card :project="$project" />
            @endforeach
        </div>
    </div>
</x-layouts.portofolio>
