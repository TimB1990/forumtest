<template>
    <div>
        <div v-for="(forum, index) in forums" :key="index">
            <h1>{{ forum.name }}</h1>
            <div class="forums-container" v-if="forum.children.length">
                <forum-item
                    v-for="child in forum.children"
                    :key="child.id"
                    :slug="child.slug"
                    :name="child.name"
                    :children="child.children"
                />
            </div>
        </div>
    </div>
    <div class="threads-container">Here you will see threads if present</div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import { useRoute } from "vue-router";
import ForumItem from "../singles/ForumItem";

export default {
    name: "Forums",
    components: { ForumItem },

    setup() {
        const store = useStore();
        const route = useRoute();

        onBeforeMount(async () => {
            store.dispatch("forum/clearForums");
            await store.dispatch("forum/fetchForums", route.params.slug);
        });
        const forums = computed(() => store.getters["forum/forums"]);

        return {
            forums,
        };
    },
};
</script>

<style>
</style>