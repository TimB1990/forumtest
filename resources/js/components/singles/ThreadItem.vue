<template>
    <div class="thread-item-container">
        <thread-title
            :title="props.thread.title"
            :user="props.thread.user"
            :slug="props.thread.slug"
            :created="props.thread.created_at"
        />
        <counter :count="props.thread.posts_count" :subject="'posts'" />
        <member />
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import Counter from "../generic/Counter";
import Member from "../misc/Member";
import ThreadTitle from "../misc/ThreadTitle";

export default {
    name: "threadItem",

    props: {
        thread: Object
    },

    components: { Member, Counter, ThreadTitle },
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
    grid-template-columns: 1fr 25% 15%;
    justify-content: space-between;
    column-gap: 1.5rem;
}
</style>