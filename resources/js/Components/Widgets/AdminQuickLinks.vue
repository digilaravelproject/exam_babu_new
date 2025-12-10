<template>
    <div class="bg-white rounded p-6 shadow">
        <h4 class="pb-4 text-sm font-semibold uppercase text-gray-800">{{ __('Quick Links') }}</h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 flex justify-between items-center">
            <ul>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('quizzes.index')">{{ __('New Quiz Schedule') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('quizzes.create')">{{ __('Create New Quiz') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('practice-sets.create')">{{ __('Create Practice Set') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('quizzes.index')">{{ __('View Quizzes') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('practice-sets.index')">{{ __('View Practice Sets') }}</inertia-link></li>
            </ul>
            <ul>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('questions.index')">{{ __('Create New Question') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('initiate_import_questions')">{{ __('Import Questions') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('comprehensions.index')">{{ __('Create New Comprehension') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('skills.index')">{{ __('Create New Skill') }}</inertia-link></li>
                <li class="mb-2"><inertia-link class="qt-link-success" :href="route('topics.index')">{{ __('Create New Topic') }}</inertia-link></li>
                <li class="mb-2">
                    <inertia-link 
                        class="qt-link-success"
                        :href="route('admin.topics-ref')"
                    >
                        <svg class="w-4 h-4 mr-1 inline-block align-text-top" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        {{ __('Topics Reference') }}
                    </inertia-link>
                </li>
                <li>hello</li>
            </ul>
        </div>
    </div>
</template>
