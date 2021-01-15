<template>
  <div class="post-item-wrapper">
    <div class="post-item-user">
      <span class="user-name">{{ user.name }}</span>
      <span class="user-stars"><i v-for="index in user.rank" :key="index" class="fas fa-star"></i></span>
      <img :src="user.image" alt="" />
      <span class="user-role">{{ user.role }}</span>
      <span class="user-posts">posts: {{ user.post_count }}</span>
    </div>
    <div class="post-item-content">
      <span class="post-item-created">{{ post.created_at }}</span>
      <span class="post-item-message">{{ post.message }}</span>
      <div class="post-reply-wrapper"><button><i class="fas fa-plus"></i></button><span>Reply</span></div>
    </div>
  </div>
</template>

<script>
import { onBeforeMount, onMounted, computed, ref } from "vue";
import { useStore } from "vuex";
import axios from "axios";

export default {
  name: "postItem",

  props: {
    post: Object,
  },

  components: {},
  setup(props) {
    const store = useStore();
    const user = ref({});

    onBeforeMount(() => {
      axios
        .get(`/api/users/${props.post.user_id}`)
        .then((response) => {
          user.value = response.data;
        })
        .catch((err) => {
          console.log(err);
        });
    });

    return {
      props,
      user,
    };
  },
};
</script>

<style>
.post-item-wrapper {
  display: flex;
  background-color: whitesmoke;
  border: 1px solid grey;
  border-radius: 0.2rem;
  width: 80%;
  padding: 2rem;
  margin: 1.5rem;
}

.post-item-user {
  display: flex;
  flex-direction: column;
  align-items: center;
  font-size: 1.5rem;
  padding: 1rem;
}

.post-item-user > img{
    height: 90px;
    width: 90px;
    margin-left: 0;
    margin: 1rem;
}

.post-item-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  font-size: 1.6rem;
}

.post-item-message {
  padding: 1rem;
}

.post-item-created {
  padding: 1rem;
}

.user-name{
  padding: 0.5rem;
  font-size: 1.75rem;
  font-weight: bold;
}

.post-reply-wrapper{
  padding: 1rem;
}

.post-reply-wrapper > button {
  padding: 0.5rem 1rem 0.5rem 1rem;
  font-size: 1.0rem;
  cursor: pointer;
}

.post-reply-wrapper > span {
  margin: 1rem;
  letter-spacing: 1px;
}

</style>