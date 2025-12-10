<template>
    <app-layout>
        <template #header>
            <h1 class="app-heading">{{ __('Dashboard') }}</h1>
        </template>

        <div class="py-6">
            <!-- My Subscriptions Section -->
            <div class="w-full mb-6" v-if="userSubscriptions && userSubscriptions.length > 0">
                <section-header :title="'My Subscriptions'"></section-header>
                <div class="grid grid-cols-1 gap-4 mb-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    <template v-for="(userSubscription, index) in userSubscriptions" >
                        <div :key="userSubscription.id" class="transition-shadow duration-300 card hover:shadow-lg">
                            <div class="card-body">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-800">{{ userSubscription.plan }}</h3>
                                        <p class="mt-1 text-xs text-gray-500">{{ __('Valid until') }}: {{ userSubscription.ends }}</p>
                                    </div>
                                    <span class="ml-2 text-xs uppercase badge badge-success badge-sm">{{ __('Active') }}</span>
                                </div>
                                <div class="mb-4" v-if="userSubscription.features && userSubscription.features.length > 0">
                                    <p class="mb-2 text-xs text-gray-400">{{ __('Features') }}:</p>
                                    <ul class="space-y-1 text-sm text-gray-600">
                                        <li v-for="feature in userSubscription.features" :key="feature.code" class="flex items-center">
                                            <svg class="flex-shrink-0 w-4 h-4 text-green-500 ltr:mr-2 rtl:ml-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="truncate">{{ __(feature.name) }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <inertia-link :href="route('exam_dashboard')" class="block w-full text-center qt-btn qt-btn-sm qt-btn-primary">
                                    {{ __('View Exams') }}
                                </inertia-link>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
            <div v-else class="mb-6">
                <div class="py-8 text-center">
                    <p class="text-gray-500">{{ __('No active subscriptions found') }}</p>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import SectionHeader from "@/Components/SectionHeader";

    export default {
        components: {
            AppLayout,
            SectionHeader
        },
        props: {
            userSubscriptions: {
                type: Array,
                default: () => []
            }
        },
        metaInfo() {
            return {
                title: this.title
            }
        },
        computed: {
            title() {
                return this.__('User Dashboard')+' - ' + this.$page.props.general.app_name;
            }
        },
    }
</script>
