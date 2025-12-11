<section class="relative py-16 overflow-hidden bg-white border-b border-gray-100 sm:py-24">

    <div class="absolute top-0 right-0 -mt-20 -mr-20 rounded-full opacity-50 pointer-events-none w-80 h-80 bg-blue-50 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -mb-20 -ml-20 rounded-full opacity-50 pointer-events-none w-80 h-80 bg-indigo-50 blur-3xl"></div>

    <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="max-w-3xl mx-auto mb-16 text-center">
            <span class="inline-flex items-center px-3 py-1 text-xs font-bold tracking-widest text-blue-600 uppercase rounded-full bg-blue-50">
                {{ __('Features') }}
            </span>
            <h2 class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                {{ $title }}
            </h2>
            <p class="mt-4 text-lg text-slate-500">
                {{ $subtitle }}
            </p>
        </div>

        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:gap-12">
            @foreach([1, 2, 3, 4] as $i)
                <div class="relative flex flex-col items-start p-6 transition-all duration-300 ease-out transform bg-white border border-gray-100 shadow-sm group sm:flex-row rounded-2xl hover:shadow-xl hover:border-blue-100 hover:-translate-y-1">

                    <div class="flex-shrink-0 mb-4 sm:mb-0 sm:mr-6">
                        <div class="flex items-center justify-center text-white transition-transform duration-300 transform shadow-lg h-14 w-14 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 group-hover:rotate-6">
                            <img class="object-contain w-8 h-8 filter brightness-0 invert"
                                 src="{{ ${"feature".$i}[2] }}"
                                 alt="{{ ${"feature".$i}[0] }}"
                                 loading="lazy" />
                        </div>
                    </div>

                    <div class="flex-1">
                        <h3 class="mb-2 text-xl font-bold transition-colors text-slate-900 group-hover:text-blue-600">
                            {{ ${"feature".$i}[0] }}
                        </h3>
                        <p class="text-base leading-relaxed text-slate-500">
                            {{ ${"feature".$i}[1] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
