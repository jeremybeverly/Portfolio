<x-layouts.portofolio title="Design & Creative Works">
    <div class="max-w-6xl mx-auto px-6 py-12">

        <div class="w-full flex flex-col items-start text-left mb-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950 mb-2">Designs Portfolio.</h1>
            <p class="text-neutral-500 text-lg">Explore my latest creative works, artboards, and conceptual designs.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($works as $work)
                <x-designwordCard :work="$work" />
            @endforeach
        </div>

    </div>
</x-layouts.portofolio>
