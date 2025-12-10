<template>
    <app-layout>
        <template #header>
            <h1 class="app-heading">{{ __('Add Exams') }}</h1>
        </template>

        <div class="py-6">
            <div class="mb-8 lg:text-center">
                <h2 class="text-base font-semibold tracking-wide uppercase text-secondary">{{ __('Categories') }}</h2>
                <p class="mt-2 text-3xl font-extrabold leading-8 tracking-tight text-primary sm:text-4xl">
                    {{ category.title || __('MOCK TESTS WITH COMPARATIVE RANKING') }}
                </p>
                <p class="max-w-2xl mt-4 text-xl text-gray-500 lg:mx-auto">
                    {{ category.subtitle || __('A small step today can lead to a government job tomorrow.') }}
                </p>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-7">
                <template v-for="cat in categories"">
                    <div :key="cat.id" class="w-full p-4 transition-shadow duration-300 border rounded sm:w-64 hover:shadow-lg">
                        <div class="flex flex-col items-center justify-center">
                            <div class="flex flex-col items-center justify-center mt-3">
                                <p class="font-medium leading-none text-center text-gray-800">{{ cat.name }}</p>
                            </div>
                        </div>
                        <div class="w-full mx-auto mt-8 sm:w-56 h-9">
                            <a :href="route('store.categories.show', { category: cat.slug })"
                               class="flex items-center justify-center flex-1 h-full px-20 py-3 border rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300 hover:opacity-90 bg-primary border-primary">
                                <p class="text-sm font-medium leading-none text-white">{{ __('Explore') }}</p>
                            </a>
                        </div>
                    </div>
                </template>
            </div>

            <div v-if="categories.length === 0" class="py-12 text-center">
                <p class="text-gray-500">{{ __('No categories available') }}</p>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout
        },
        props: {
            categories: {
                type: Array,
                default: () => []
            },
            category: {
                type: Object,
                default: () => ({
                    title: '',
                    subtitle: ''
                })
            }
        },
        metaInfo() {
            return {
                title: this.title
            }
        },
        computed: {
            title() {
                return this.__('Add Exams')+' - ' + this.$page.props.general.app_name;
            }
        },
    }
</script>

