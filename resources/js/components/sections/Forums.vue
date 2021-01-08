<template>
    <div class="forums-container">
        <div>
            <forum-item v-for="forum in forums" :key="forum.id" :forum="forum"/>
        </div>
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import ForumItem from "../singles/ForumItem";

// counts goes double why?

export default {
    name: "Forums",
    components: { ForumItem },
    setup() {
        const store = useStore();

        onBeforeMount(async () => {
            await store.dispatch("forum/fetchForums", null);
        });
        const forums = computed(() => store.getters["forum/forums"]);

        return {
            forums,
        };
    },
};
</script>

<style>
.forums-container {
    display: flex;
    flex-direction: column;
}

.forums-container > div {
    margin-top: 1rem;
    margin-bottom: 1rem;
}
</style>