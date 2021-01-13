<template>
  <div class="post-item-wrapper">
    <div class="post-item-user">
      <span>{{ user.name }}</span>
      <span>{{ user.rank }}</span>
      <img :src="user.image" alt="" />
      <span>{{ user.role }}</span>
      <span>{{ user.post_count }}</span>
    </div>
    <div class="post-item-content">
      <span class="post-item-created">{{ post.created_at }}</span>
      <span class="post-item-message">{{ post.message }}</span>
      <button>Reply</button>
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
  margin: 1rem;
  padding: 2rem;
}

.post-item-user {
  display: flex;
  flex-direction: column;
  width: 15%;
  font-size: 1.5rem;
  padding: 1rem;
}

.post-item-user > img{
    height: 90px;
    width: 90px;
    margin: 1rem;
    margin-left: 0;
}

.post-item-content {
  display: flex;
  flex-direction: column;
  width: 85%;
  font-size: 1.5rem;
}

.post-item-message {
  padding: 1rem;
}

.post-item-created {
  padding: 1rem;
}

</style>