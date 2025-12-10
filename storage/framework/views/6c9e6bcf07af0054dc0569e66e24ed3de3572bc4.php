<section class="relative pt-20 pb-24 overflow-hidden bg-white lg:pt-36 lg:pb-32">

    <div class="absolute top-0 z-0 w-full h-full -translate-x-1/2 pointer-events-none left-1/2">
        <div class="absolute top-20 left-10 w-80 h-80 bg-blue-100 rounded-full mix-blend-multiply filter blur-[64px] opacity-70 animate-blob"></div>
        <div class="absolute top-40 right-10 w-80 h-80 bg-purple-100 rounded-full mix-blend-multiply filter blur-[64px] opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute -bottom-8 left-1/3 w-80 h-80 bg-indigo-100 rounded-full mix-blend-multiply filter blur-[64px] opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10 px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center gap-16 lg:flex-row lg:gap-12">

            <div class="w-full text-center lg:w-1/2 lg:text-left">

                <div class="inline-flex items-center px-4 py-1.5 mb-8 rounded-full border border-blue-100 bg-blue-50/50 backdrop-blur-sm text-blue-600 text-sm font-bold uppercase tracking-widest shadow-sm hover:shadow-md transition-shadow">
                    <span class="relative flex w-3 h-3 mr-3">
                      <span class="absolute inline-flex w-full h-full bg-blue-400 rounded-full opacity-75 animate-ping"></span>
                      <span class="relative inline-flex w-3 h-3 bg-blue-500 rounded-full"></span>
                    </span>
                    Start Learning Today
                </div>

                <h1 class="mb-6 text-5xl font-extrabold leading-tight tracking-tight sm:text-6xl lg:text-7xl">
                    <span class="bg-clip-text bg-gradient-to-r from-slate-900 via-blue-800 to-indigo-900">
                        <?php echo $title; ?>

                    </span>
                </h1>

                <p class="max-w-2xl mx-auto mb-10 text-xl font-medium leading-relaxed sm:text-2xl text-slate-600 lg:mx-0">
                    <?php echo $subtitle; ?>

                </p>

                <div class="flex flex-col items-center justify-center gap-6 sm:flex-row lg:justify-start">
                    <a href="<?php echo e($cta_link); ?>"
                       class="relative inline-flex items-center justify-center px-8 py-4 overflow-hidden text-lg font-bold text-white transition-all duration-300 rounded-full shadow-lg group bg-gradient-to-r from-blue-600 to-indigo-600 hover:shadow-blue-500/40 hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-600">
                        <span class="absolute inset-0 w-full h-full transition-transform duration-700 ease-in-out transform -translate-x-full bg-gradient-to-r from-white/0 via-white/20 to-white/0 group-hover:translate-x-full"></span>

                        <span class="relative flex items-center">
                            <?php echo e($cta_text); ?>

                            <svg class="w-5 h-5 ml-2 -mr-1 transition-transform transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </span>
                    </a>
                </div>
            </div>

            <div class="relative w-full lg:w-1/2 perspective-1000">
                <div class="relative w-full max-w-lg mx-auto lg:max-w-none animate-float">
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] h-[120%] bg-gradient-to-tr from-blue-200/40 to-purple-200/40 rounded-full blur-3xl -z-10"></div>

                    <img class="relative w-full h-auto drop-shadow-2xl rounded-3xl transform transition-all duration-500 hover:scale-[1.03] hover:rotate-2 hover:shadow-indigo-500/20"
                         src="<?php echo e(asset('storage/'.$image_path)); ?>"
                         alt="Hero Image">
                </div>
            </div>

        </div>
    </div>
</section>

<style>
    @keyframes  blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    @keyframes  float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
        100% { transform: translateY(0px); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    .perspective-1000 {
        perspective: 1000px;
    }
</style>
<?php /**PATH C:\xampp\htdocs\Digi_Laravel_Prrojects\Exam-Backup-Update\resources\views/components/hero.blade.php ENDPATH**/ ?>