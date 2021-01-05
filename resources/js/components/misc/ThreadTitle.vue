<template>
    <div class="title-element">
        <span class="title-element-topic">Thread Title</span>
        <span class="title-element-created">By: test, October 10, 2020</span>
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
    name: "threadTitle",

    components: {},
    setup() {
        const store = useStore();

        return{
            //
        }
    },
};
</script>

<style>
.title-element{
    display: flex;
    flex-direction: column;
    border: 1px solid green;
    padding: 1rem;
}

.title-element-topic{
    font-size: 2rem;
    font-weight: bold;
    padding: 0;
}

.title-element-created {
    font-size: 1.5rem;
}
</style>