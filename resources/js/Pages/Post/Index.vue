<template>
    <Head title="Posts"/>
    <h1 class="text-lg mb-4">Posts</h1>
    <div>
        <Link :href="route('posts.create')"
              class="hover:bg-white hover:text-black border border-sky-500 block p-2 w-32 bg-sky-500 rounded-full text-center text-white">
            Add Post
        </Link>
    </div>

    <div v-if="posts && posts.length > 0" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        <div v-for="post in posts" :key="post.id" class="border rounded-lg p-4 shadow-md">
            <div class="mb-2">
                <h2 class="text-xl font-bold break-words">{{ post.title }}</h2>
            </div>
            <div class="mb-2">
                <p class="break-words">{{ post.content }}</p>
            </div>
            <div class="text-right text-sm text-gray-600 mb-2">
                {{ post.data }}
            </div>
            <div class="text-right">
                <Link class="text-green-600 mr-2" :href="route('posts.show', post.id)">Show</Link>
                <Link class="text-sky-500 mr-2" :href="route('posts.edit', post.id)">Edit</Link>
                <p @click="deletePost(post.id)" class="cursor-pointer text-red-500 inline-block">Delete</p>
            </div>
        </div>
    </div>
    <div v-else>
        <p>No posts available.</p>
    </div>
</template>

<script>

import MainLayot from '@/Layouts/MainLayot.vue';
import {Link, Head} from "@inertiajs/vue3";

export default {
    name: "Index",
    layout: MainLayot,
    props: [
        "posts"
    ],
    components: {
        Head,
        Link
    },
    methods: {
        deletePost(id) {
            this.$inertia.delete(`/posts/${id}`);
        }
    }
}
</script>

<style scoped>
</style>
