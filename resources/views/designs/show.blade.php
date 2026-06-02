<x-layouts.portofolio :title="$designWork->name">
    <div class="max-w-5xl mx-auto px-6 py-16 pb-32">

        <a href="{{ url('/') }}" class="inline-flex items-center text-sm text-neutral-500 hover:text-neutral-950 transition mb-10">
            &larr; Back to Portfolio
        </a>

        <!-- Design Header -->
        <div class="mb-10 text-left">
            @if($designWork->designWorkType)
                <span class="text-sm font-semibold tracking-wider text-teal-600 uppercase block mb-3">
                    {{ $designWork->designWorkType->name }}
                </span>
            @endif
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950 md:text-6xl">
                {{ $designWork->name }}
            </h1>
        </div>

        <!-- Huge Main Thumbnail -->
        @if($designWork->cover_image)
            <figure class="w-full aspect-[21/9] overflow-hidden rounded-3xl mb-16">
                <img src="{{ asset('storage/' . $designWork->cover_image) }}" alt="{{ $designWork->name}}" class="w-full h-full object-cover">
            </figure>
        @endif

        <!-- Editorial Description -->
        <article class="prose prose-lg max-w-none text-neutral-700 leading-relaxed mb-20 text-left">
            <h3 class="text-2xl font-bold text-neutral-950 mb-4">Creative Case Study</h3>
            <p class="whitespace-pre-line text-xl text-neutral-600">{{ $designWork->description }}</p>
        </article>

        <!-- Medium-Style Clean Gallery List -->
        @if($designWork->images && $designWork->images->count() > 0)
            <div class="flex flex-col gap-16 pt-10 border-t border-neutral-200/60">
                @foreach($designWork->images as $galleryImage)
                    <div class="flex flex-col md:flex-row gap-10 items-start">

                        <!-- Borderless Clean Image -->
                        <div class="w-full md:w-7/12 rounded-2xl overflow-hidden shrink-0 bg-neutral-100">
                            <img src="{{ asset('storage/' . $galleryImage->image_path) }}"
                                 alt="Artboard Vector"
                                 class="w-full h-auto object-cover">
                        </div>

                        <!-- Clean Typography Description -->
                        <div class="w-full md:w-5/12 pt-2 text-left">
                            <h4 class="text-lg font-bold text-neutral-900 mb-2">Artboard Details</h4>
                            <p class="text-neutral-500 text-lg leading-relaxed">
                                {{ $galleryImage->caption ?? 'Exploring the creative process, typography choices, alternative variants, and layout structure of this composition.' }}
                            </p>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</x-layouts.portofolio>
