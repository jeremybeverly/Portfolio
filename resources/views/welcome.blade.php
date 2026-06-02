<x-layouts.portofolio title="Home">
    <div class="bg-neutral-50 text-neutral-900 min-h-screen font-sans pb-32">
        <div class="max-w-5xl mx-auto px-6 py-24 pb-16">
            <div class="flex flex-row gap-12 items-center justify-center text-left">
                <img src="{{ asset('images/profile-picture.JPG') }}" alt="Jeremy"
                     class="h-44 w-44 object-cover rounded-[2rem] shadow-sm border border-neutral-200/60 bg-neutral-100">

                <div class="max-w-lg flex flex-col gap-3">
                    <h1 class="text-5xl font-extrabold tracking-tight text-neutral-950">
                        Hi! I'm <span class="text-neutral-800">Jeremy</span>
                    </h1>
                    <p class="text-xl text-neutral-500 leading-relaxed font-normal">
                        I'm a 6th Semester Software Engineering Student. Currently, I'm expanding my mastery in <span class="text-neutral-900 font-medium">Backend and Infrastructure Development</span>.
                    </p>
                </div>
            </div>
        </div>

        <h1 class="justify-center"></h1>
        <div class="border-t border-neutral-200/60 bg-white/80 backdrop-blur-md py-24 flex justify-center">
            <div class="max-w-5xl w-full grid grid-cols-2 gap-x-16 gap-y-24 px-6">
                <div class="flex flex-col max-w-md  md:ml-auto">
                    <h2 class="text-4xl font-bold tracking-tight text-neutral-950 mt-1">Experience with variety of Projects.</h2>
                    <p class="text-neutral-500 leading-relaxed mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam aperiam deserunt incidunt minus nobis pariatur recusandae similique ullam voluptas?</p>
                </div>
                <div class="hidden md:block"></div>
                <div class="hidden md:block"></div>
                <div class="flex flex-col max-w-xl w-full gap-6">
                    <div class="text-right">
                        <h2 class="text-4xl font-bold tracking-tight text-neutral-950 mt-1">Project Specialties.</h2>
                    </div>
                    <div class="grid grid-cols-1 gap-4 text-left">
                        <div class="sm:col-span-2 bg-neutral-50/80 border border-neutral-200/50 rounded-2xl p-6 flex flex-col justify-between min-h-[140px] hover:bg-white transition-colors duration-200 shadow-xs">
                            <div class="h-8 w-8 rounded-lg bg-white border border-neutral-200 flex items-center justify-center">
                                <i data-lucide="globe" class="w-4 h-4 text-neutral-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-neutral-950 tracking-tight">Web Development</h4>
                                <p class="text-xs text-neutral-500 mt-1 leading-normal">Building responsive, high-performance web interfaces with optimized loading systems.</p>
                            </div>
                        </div>

                        <div class="bg-neutral-50/80 border border-neutral-200/50 rounded-2xl p-6 flex flex-col justify-between min-h-[140px] hover:bg-white transition-colors duration-200 shadow-xs">
                            <div class="h-8 w-8 rounded-lg bg-white border border-neutral-200 flex items-center justify-center">
                                <i data-lucide="database" class="w-4 h-4 text-neutral-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-neutral-950 tracking-tight">Database</h4>
                                <p class="text-xs text-neutral-500 mt-1 leading-normal">Relational structuring & schema tuning.</p>
                            </div>
                        </div>

                        <div class="bg-neutral-50/80 border border-neutral-200/50 rounded-2xl p-6 flex flex-col justify-between min-h-[140px] hover:bg-white transition-colors duration-200 shadow-xs">
                            <div class="h-8 w-8 rounded-lg bg-white border border-neutral-200 flex items-center justify-center">
                                <i data-lucide="cpu" class="w-4 h-4 text-neutral-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-neutral-950 tracking-tight">Infrastructure</h4>
                                <p class="text-xs text-neutral-500 mt-1 leading-normal">RESTful APIs & secure cloud staging protocols.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-6 mt-12">
            <h1 class="text-neutral-950 font-bold text-4xl text-left mt-12 my-6">What I do.</h1>
            <div class="bg-white border border-neutral-200/60 rounded-3xl p-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 divide-y lg:divide-y-0 lg:divide-x divide-neutral-200/60 gap-12 lg:gap-0">
                    <div class="flex flex-col gap-4 lg:pr-10 pb-8 lg:pb-0">
                        <div class="h-10 w-10 rounded-xl bg-neutral-50 border border-neutral-200/80 flex items-center justify-center">
                            <i data-lucide="terminal" class="w-5 h-5 text-neutral-600"></i>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="text-xl font-bold text-neutral-950 tracking-tight">Software Development</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed font-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, ipsam.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 pt-8 lg:pt-0 lg:px-10 pb-8 lg:pb-0">
                        <div class="h-10 w-10 rounded-xl bg-neutral-50 border border-neutral-200/80 flex items-center justify-center">
                            <i data-lucide="layers" class="w-5 h-5 text-neutral-600"></i>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="text-xl font-bold text-neutral-950 tracking-tight">UI/UX Design</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed font-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, perspiciatis.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 pt-8 lg:pt-0 lg:pl-10">
                        <div class="h-10 w-10 rounded-xl bg-neutral-50 border border-neutral-200/80 flex items-center justify-center">
                            <i data-lucide="image" class="w-5 h-5 text-neutral-600"></i>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="text-xl font-bold text-neutral-950 tracking-tight">Graphic Design</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed font-normal">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, magnam.
                            </p>
                        </div>
                    </div>
                </div>
          </div>

        </div>
        <div class="max-w-5xl mx-auto px-6 mt-12">
            <h1 class="text-neutral-950 font-bold text-4xl text-left mt-12 my-6">Recent Works.</h1>
            <div class="grid grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <x-showcaseCard :project="$project" />
                @endforeach
            </div>
        </div>
    </div>

</x-layouts.portofolio>
