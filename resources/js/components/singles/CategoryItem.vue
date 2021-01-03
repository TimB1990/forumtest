<template>
    <div class="category-container">
        <detail :name="props.name" :children="props.children" />
        <counter />
        <div class="category-thread-wrapper">
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
    name: "categoryItem",

    props: {
        name: String,
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
.category-thread-wrapper {
    grid-row: 1/-1;
    grid-column: 3/-1;
    align-items: center;
    border: 1px solid grey;
}

.category-container {
    display: grid;
    grid-template-rows: 1fr;
    grid-template-columns: 25% 1fr 25%;
    justify-content: space-between;
    column-gap: 1.5rem;
}
</style>