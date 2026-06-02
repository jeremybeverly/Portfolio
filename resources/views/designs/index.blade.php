<x-layouts.app title="Manage Design Works">
    <div class="flex justify-between items-center mb-10">
        <div class="flex flex-col gap-1">
            <h1 class="text-4xl font-extrabold tracking-tight text-neutral-950">Manage Design Works</h1>
            <p class="text-sm text-neutral-500">Add, view, edit, or delete your UI/UX and graphic design compositions.</p>
        </div>
        <a href="{{ route('designs.create') }}" class="bg-neutral-900 text-white text-sm font-medium px-5 py-2.5 rounded-xl hover:bg-neutral-800 transition shadow-sm tracking-wide">
            Add New Design Work
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($works as $work)
            <div class="group bg-white border border-neutral-200 rounded-3xl overflow-hidden flex flex-col justify-between transition-all duration-300 hover:shadow-md">
                <div>
                    @if($work->cover_image)
                        <div class="w-full aspect-[4/3] overflow-hidden bg-neutral-100 border-b border-neutral-100">
                            <img src="{{ asset('storage/' . $work->cover_image) }}" alt="{{ $work->name }}" class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="p-6 flex flex-col gap-2">
                        <div class="flex justify-between items-start gap-2">
                            <h2 class="font-bold text-2xl text-neutral-900 tracking-tight leading-snug">{{ $work->name }}</h2>
                        </div>

                        <div class="mt-1">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-neutral-100 text-neutral-800 border border-neutral-200/40">
                                {{ $work->designWorkType?->name ?? 'Uncategorized' }}
                            </span>
                        </div>

                        <p class="text-sm text-neutral-500 leading-relaxed mt-2 line-clamp-3">{{ $work->description }}</p>
                    </div>
                </div>

                <div class="px-6 pb-6 pt-2 flex gap-2">
                    <a href="{{ route('portfolio.designs.show', $work) }}" target="_blank" class="flex-1 text-center bg-white border border-neutral-200 text-neutral-700 font-medium px-3 py-2 rounded-xl hover:bg-neutral-50 hover:text-neutral-950 transition text-sm shadow-xs">
                        Preview
                    </a>

                    <a href="{{ route('designs.edit', $work) }}" class="flex-1 text-center bg-neutral-100 border border-neutral-200 text-neutral-800 font-medium px-3 py-2 rounded-xl hover:bg-neutral-200 hover:text-neutral-950 transition text-sm shadow-xs">
                        Edit
                    </a>

                    <form action="{{ route('designs.destroy', $work) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this piece from your design grid?');" class="flex-1">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full text-center bg-red-500 border border-red-600/10 text-white font-medium px-3 py-2 rounded-xl hover:bg-red-600 transition text-sm shadow-xs cursor-pointer">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layouts.app>
