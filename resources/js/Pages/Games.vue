<template>
    <Layout title="Dashboard">
        <template #header>
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-lg leading-6 font-semibold text-gray-900">Games</h1>
                </div>
            </header>
        </template>

        <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div class="px-4 py-4 sm:px-0">
                <ol>
                    <li>you need a table here that shows the current games in the database</li>
                    <li>You also need a button that takes you to a create page for a new game</li>
                    <li>After creating a new game it should redirect you to a page that shows the game details (players, score, etc.)</li>
                </ol>
            </div>
        </div>
    </Layout>
</template>

<script setup>
    import Layout from '@/Layouts/Layout.vue';
</script>
