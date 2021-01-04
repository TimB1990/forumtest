<template>
    <div class="forum-container">
        <detail :slug="props.slug" :name="props.name" :children="props.children" />
        <counter />
        <div class="forum-thread-wrapper">
            <thread />
        </div>
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import Detail from "../generic/Detail";
import Counter from "../generic/Counter";
import Thread from "../generic/Thread";

export default {
    name: "forumItem",

    props: {
        name: String,
        slug: String,
        children: Object,
    },

    components: { Detail, Counter, Thread },
    setup(props) {
        const store = useStore();

        return{
           props
        }

    },
};
</script>

<style>
.forum-thread-wrapper {
    grid-row: 1/-1;
    grid-column: 3/-1;
    align-items: center;
    border: 1px solid grey;
}

.forum-container {
    display: grid;
    grid-template-rows: 1fr;
    grid-template-columns: 25% 1fr 25%;
    justify-content: space-between;
    column-gap: 1.5rem;
}
</style>