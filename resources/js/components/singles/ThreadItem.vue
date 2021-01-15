<template>
    <div class="thread-item-container">
        <thread-title :thread="props.thread" />
        <counter :count="props.thread.posts_count" :subject="'posts'" />
        <last-post :threadId="props.thread.id"/>
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import Counter from "../generic/Counter";
import ThreadTitle from "../misc/ThreadTitle";
import LastPost from "../misc/LastPost";

export default {
    name: "threadItem",

    props: {
        thread: Object
    },

    components: { ThreadTitle, Counter, LastPost },
    setup(props) {
        const store = useStore();

        return {
            props,
        };
    },
};
</script>

<style>
.thread-item-container {
    display: grid;
    grid-template-rows: 1fr;
    grid-template-columns: 30% 1fr 20%;
    justify-content: space-between;
    column-gap: 1.5rem;
}
</style>