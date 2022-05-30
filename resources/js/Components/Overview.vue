<!-- This example requires Tailwind CSS v2.0+ -->
<template>
    <div v-for="user in users" class="mb-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ user.name }}</h3>

        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Games Won
                </dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">
                    {{ user.games_won }}
                </dd>
            </div>

            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Matches Won
                </dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">
                    {{ user.matches_won }}
                </dd>
            </div>

            <div class="px-4 py-5 bg-white shadow rounded-lg overflow-hidden sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">
                    Total Points
                </dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">
                    {{ user.total_points }}
                </dd>
            </div>
        </dl>
    </div>
</template>

<script>

export default {
    props: {
        users: Array,
    }
}
</script>
