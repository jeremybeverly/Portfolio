<x-layouts.portofolio title="Home">
    <div class="bg-neutral-50 text-neutral-900 min-h-screen font-sans pb-32">

        <div class="max-w-5xl mx-auto px-6 py-24 pb-16">
            <div class="flex flex-row gap-12 items-center justify-center text-left">
                <img src="{{ asset('images/profile-picture.JPG') }}" alt="Jeremy"
                     class="h-67 w-67 object-cover rounded-[2rem] shadow-sm border border-neutral-200/60 bg-neutral-100">

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

        <div class="border-t border-neutral-200/60 bg-white/80 backdrop-blur-md py-24 flex justify-center">
            <div class="max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 gap-x-16 gap-y-16 px-6">

                <div class="flex flex-col max-w-md md:ml-auto justify-center">
                    <h2 class="text-4xl font-bold tracking-tight text-neutral-950 mt-1">Experience across diverse domains.</h2>
                    <p class="text-neutral-500 leading-relaxed mt-4">
                        From architecting resilient backend logic to designing engaging user interfaces, I blend technical engineering with creative problem-solving. My focus is on delivering high-performance, scalable solutions while maintaining a sharp eye for aesthetic design.
                    </p>
                </div>

                <div class="flex flex-col max-w-xl w-full gap-6">
                    <div class="text-left md:text-right">
                        <h2 class="text-4xl font-bold tracking-tight text-neutral-950 mt-1">Project Specialties.</h2>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-left">

                        <div class="sm:col-span-2 bg-neutral-50/80 border border-neutral-200/50 rounded-2xl p-6 flex flex-col justify-between min-h-[140px] hover:bg-white transition-colors duration-200 shadow-xs">
                            <div class="h-8 w-8 rounded-lg bg-white border border-neutral-200 flex items-center justify-center mb-4">
                                <i data-lucide="monitor-smartphone" class="w-4 h-4 text-neutral-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-neutral-950 tracking-tight">Web Development</h4>
                                <p class="text-xs text-neutral-500 mt-1 leading-normal">Building responsive, high-performance web interfaces combined with optimized, secure loading systems.</p>
                            </div>
                        </div>

                        <div class="bg-neutral-50/80 border border-neutral-200/50 rounded-2xl p-6 flex flex-col justify-between min-h-[140px] hover:bg-white transition-colors duration-200 shadow-xs">
                            <div class="h-8 w-8 rounded-lg bg-white border border-neutral-200 flex items-center justify-center mb-4">
                                <i data-lucide="database" class="w-4 h-4 text-neutral-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-neutral-950 tracking-tight">Database</h4>
                                <p class="text-xs text-neutral-500 mt-1 leading-normal">Relational structuring, schema tuning, and efficient query optimization.</p>
                            </div>
                        </div>

                        <div class="bg-neutral-50/80 border border-neutral-200/50 rounded-2xl p-6 flex flex-col justify-between min-h-[140px] hover:bg-white transition-colors duration-200 shadow-xs">
                            <div class="h-8 w-8 rounded-lg bg-white border border-neutral-200 flex items-center justify-center mb-4">
                                <i data-lucide="server" class="w-4 h-4 text-neutral-600"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg text-neutral-950 tracking-tight">Infrastructure</h4>
                                <p class="text-xs text-neutral-500 mt-1 leading-normal">Designing RESTful APIs and managing secure cloud staging protocols.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-6 mt-12">
            <h1 class="text-neutral-950 font-bold text-4xl text-left mt-12 my-6">What I do.</h1>
            <div class="bg-white border border-neutral-200/60 rounded-3xl p-8 shadow-sm">
                <div class="grid grid-cols-1 lg:grid-cols-3 divide-y lg:divide-y-0 lg:divide-x divide-neutral-200/60 gap-12 lg:gap-0">

                    <div class="flex flex-col gap-4 lg:pr-10 pb-8 lg:pb-0">
                        <div class="h-10 w-10 rounded-xl bg-neutral-50 border border-neutral-200/80 flex items-center justify-center">
                            <i data-lucide="code" class="w-5 h-5 text-neutral-600"></i>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="text-xl font-bold text-neutral-950 tracking-tight">Software Development</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed font-normal">
                                Developing robust APIs, structuring complex application logic, and building scalable backend architectures.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 pt-8 lg:pt-0 lg:px-10 pb-8 lg:pb-0">
                        <div class="h-10 w-10 rounded-xl bg-neutral-50 border border-neutral-200/80 flex items-center justify-center">
                            <i data-lucide="layout" class="w-5 h-5 text-neutral-600"></i>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="text-xl font-bold text-neutral-950 tracking-tight">UI/UX Design</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed font-normal">
                                Prototyping intuitive interfaces and user flows that ensure seamless, accessible digital experiences.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col gap-4 pt-8 lg:pt-0 lg:pl-10">
                        <div class="h-10 w-10 rounded-xl bg-neutral-50 border border-neutral-200/80 flex items-center justify-center">
                            <i data-lucide="palette" class="w-5 h-5 text-neutral-600"></i>
                        </div>
                        <div class="flex flex-col gap-1.5">
                            <h3 class="text-xl font-bold text-neutral-950 tracking-tight">Graphic Design</h3>
                            <p class="text-sm text-neutral-500 leading-relaxed font-normal">
                                Crafting visually striking brand assets, modern typography layouts, and conceptual poster designs.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-6 my-24">
            <h2 class="text-neutral-950 font-bold text-4xl text-left mb-6">Tools & Technologies.</h2>
            <div class="flex flex-wrap gap-3">
        <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="blocks" class="w-4 h-4 text-neutral-400"></i> Laravel / PHP
        </span>
                <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="blocks" class="w-4 h-4 text-neutral-400"></i> Flask / Python
        </span>
                <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="database" class="w-4 h-4 text-neutral-400"></i> SQL
        </span>
                <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="database" class="w-4 h-4 text-neutral-400"></i> MongoDB
        </span>
                <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="server" class="w-4 h-4 text-neutral-400"></i> REST APIs
        </span>
                <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="git-branch" class="w-4 h-4 text-neutral-400"></i> Git & Version Control
        </span>
                <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-2xl bg-white border border-black/5 shadow-sm text-sm font-semibold text-neutral-800">
            <i data-lucide="container" class="w-4 h-4 text-neutral-400"></i> Docker
        </span>

            </div>
        </div>

        <div class="max-w-5xl mx-auto px-6 py-16">
            <div class="mb-10 text-center md:text-left">
                <h1 class="text-4xl font-bold tracking-tight text-neutral-950">Recent Projects.</h1>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($projects as $project)
                    <x-card :project="$project" />
                @endforeach
            </div>


            <div class="mt-14 flex justify-center">
                <a href="{{ route('portfolio.projects') }}" class="inline-flex items-center text-neutral-900 bg-white border border-neutral-200 hover:bg-neutral-50 hover:-translate-y-0.5 active:scale-95 font-semibold rounded-2xl text-sm px-8 py-3.5 shadow-sm transition-all duration-300">
                    Explore All Projects
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>

        <div class="max-w-4xl mx-auto px-6 py-24 text-center mt-10">
            <h2 class="text-5xl md:text-7xl font-extrabold tracking-tight text-neutral-950 mb-6">
                So.. Let's build something!
            </h2>
            <p class="text-xl text-neutral-500 mb-10 max-w-2xl mx-auto">
                Whether you need a robust backend infrastructure, a seamless UI, or just want to chat about software engineering, I'm currently open for opportunities.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="#" class="inline-flex items-center justify-center w-full sm:w-auto text-white bg-neutral-950 hover:bg-neutral-800 active:scale-95 transition-all duration-300 font-semibold rounded-2xl text-base px-8 py-4 shadow-md">
                    <i data-lucide="mail" class="w-5 h-5 mr-2 -ml-1"></i>
                    Send me an Email
                </a>
                <a href="#" class="inline-flex items-center justify-center w-full sm:w-auto text-neutral-900 bg-white border border-black/10 hover:bg-neutral-50 active:scale-95 transition-all duration-300 font-semibold rounded-2xl text-base px-8 py-4 shadow-sm">
                    <i data-lucide="compass" class="w-5 h-5 mr-2 -ml-1"></i>
                    Connect on LinkedIn
                </a>
            </div>
        </div>


    </div>
</x-layouts.portofolio>
