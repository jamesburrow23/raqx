<template>
    <Layout title="Dashboard">
        <template #header>
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center w-full">
                        <h1 class="text-lg leading-6 font-semibold text-gray-900">Games</h1>
                        <a :href="route('games.create')" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Create Game
                        </a>
                    </div>
                </div>
            </header>
        </template>

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-4 sm:px-0">

            </div>
        </div>
    </Layout>
</template>

<script setup>
    import Layout from '@/Layouts/Layout.vue';
</script>
