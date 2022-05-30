<template>
    <Layout title="Dashboard">
        <template #header>
            <header class="bg-white shadow-sm">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-lg leading-6 font-semibold text-gray-900">Create Match</h1>
                </div>
            </header>
        </template>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form @submit.prevent="form.post(route('matches.store'))">
                    <div>
                        <label for="games_required_to_win_match" class="block text-sm font-medium text-gray-700">Games required to win match</label>
                        <div class="mt-1">
                            <input v-model="form.games_required_to_win_match"
                                   type="number"
                                   name="games_required_to_win_match"
                                   id="games_required_to_win_match"
                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                            />
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from '@/Layouts/Layout.vue';

export default {
    components: {
        Layout,
    },
    data() {
        return {
            form: this.$inertia.form({
                games_required_to_win_match: 2,
            })
        }
    }
}

</script>
