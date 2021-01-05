<template>
    <div>
        <div
            class="forums-container"
            v-for="(forum, index) in forums"
            :key="index"
        >
            <h1>{{ forum.name }}</h1>
            <forum-item
                v-for="child in forum.children"
                :key="child.id"
                :slug="child.slug"
                :name="child.name"
                :children="child.children"
            />
        </div>
        <div>
            <thread-item v-for="index in 4" :key="index"/>
        </div>
    </div>

</template>

<script>
import { onBeforeMount, computed, ref, watch } from "vue";
import { useStore } from "vuex";
import { useRoute, onBeforeRouteUpdate } from "vue-router";
import ForumItem from "../singles/ForumItem";
import ThreadItem from "../singles/ThreadItem";

export default {
    name: "Forums",
    components: { ForumItem, ThreadItem },

    setup() {
        const store = useStore();
        const route = useRoute();

        onBeforeMount(async () => {
            store.dispatch("forum/clearForums");
            await store.dispatch("forum/fetchForums", route.params.slug);
        });

        watch(
            () => route.params,
            async (newParams) => {
                store.dispatch("forum/clearForums");
                await store.dispatch("forum/fetchForums", newParams.slug);
            }
        );

        const forums = computed(() => store.getters["forum/forums"]);

        return {
            forums,
        };
    },
};
</script>

<style>
</style>