<template>
    <div class="post-item-wrapper">
        <div class="post-item-user">
            <span>username</span>
            <span>rank</span>
            <span>image</span>
            <span>role</span>
            <span>postsCount</span>
        </div>
        <div class="post-item-content">
            <span class="post-item-created">{{ post.created_at }}</span>
            <span class="post-item-message">{{ post.message }}</span>
            <button>Reply</button>
        </div>

    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
    name: "postItem",

    props: {
        post: Object
    },

    components: { },
    setup(props) {
        const store = useStore();

        return {
            props,
        };
    },
};
</script>

<style>
.post-item-wrapper{
    display: flex;
    background-color: whitesmoke;
    border: 1px solid grey;
    border-radius: 0.2rem;
    width: 80%;
    margin: 1rem;
    padding: 2rem;
}

.post-item-user{
    display: flex;
    flex-direction: column;
    width: 15%;
    font-size: 1.5rem;
    padding: 1rem;
}

.post-item-content{
    display: flex;
    flex-direction: column;
    width: 85%;
    font-size: 1.5rem;
}

.post-item-message{
    padding: 1rem;
}

.post-item-created {
    padding: 1rem;
}

</style>