<template>
    <h1 class="text-lg mb-4">Edit</h1>
    <div class="mb-4">
        <Link :href="route('posts.index')"
              class="hover:bg-white hover:text-black border border-sky-500 block p-2 w-32 bg-gray-500 rounded-full text-center text-white">
            Back
        </Link>
    </div>

    <form @submit.prevent="update" class="space-y-6">
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <div class="mt-1">
                <input v-model="title" id="title" name="title" type="text" autocomplete="title"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm">
            </div>
            <div v-if="errors.title" class="text-red-600 text-sm mt-1">{{ errors.title }}</div>
        </div>
        <div>
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <div class="mt-1">
                <textarea v-model="content" id="content" name="content" rows="4"
                          class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm sm:text-sm"></textarea>
            </div>
            <div v-if="errors.content" class="text-red-600 text-sm mt-1">{{ errors.content }}</div>
        </div>
        <div class="pt-2">
            <button type="submit"
                    class="hover:bg-white hover:text-black border border-sky-500 block p-2 w-32 bg-sky-500 rounded-full text-center text-white">
                Update
            </button>

        </div>
    </form>


</template>


<script>
import {Link} from "@inertiajs/vue3";
import MainLayot from "@/Layouts/MainLayot.vue";

export default {
    name: "index",
    layout: MainLayot,
    components: {
        Link
    },
    props: [
        'post',
        'errors'
    ],

    data() {
        return {
            id: this.post.id,
            title: this.post.title,
            content: this.post.content,
        }
    },
    methods: {
        update() {
            this.$inertia.patch(`/posts/${this.id}`, {title: this.title, content: this.content})
        }
    }
}
</script>

<style scoped>

</style>
