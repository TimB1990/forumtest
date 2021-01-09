<template>
    <div class="title-element">
        <span class="title-element-topic">{{ props.title }}</span>
        <span class="title-element-created">By: {{ props.user }} | {{ props.created }}</span>
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
    name: "threadTitle",

    props: {
        user: String,
        title: String,
        slug: String,
        created: Date,
    },

    components: {},
    setup(props) {
        const store = useStore();

        return{
            props
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