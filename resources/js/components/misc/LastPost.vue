<template>
  <div class="last-post-wrapper">
    <div class="user-image-wrapper">
      <img :src="avatar" alt="avatar" />
    </div>
    <div class="last-post-info">
      <span>{{ lastPost.user }}</span>
      <span>{{ lastPost.created_at}}</span>
    </div>
  </div>
</template>
<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import axios from "axios";

export default {
  name: "lastPost",
  props: {
    threadId: Number,
  },
  setup(props) {
    const store = useStore();
    let lastPost = ref({});
    let avatar = ref("");

    onBeforeMount(() => {
      axios
        .get(`/api/posts/latest?thread=${props.threadId}`)
        .then((resp) => {
          lastPost.value = resp.data;
          console.log(resp.data)

          if (resp.data) {
            axios.get(`/api/users/${resp.data.user_id}`).then((usr) => {
              avatar.value = usr.data.image;
            });
          }

        })
        .catch((err) => {
          console.log(err.response.data.message);
        });
    });

    return {
      props,
      lastPost,
      avatar,
    };
  },
};
</script>

<style>
.last-post-wrapper {
  display: flex;
  padding: 1rem;
  border: 1px solid grey
}

.last-post-info {
  display: flex;
  flex-direction: column;
  font-size: 1.5rem;
  margin-left: 1rem;
}

.user-image-wrapper{
    height: 6rem;
    width: 25%;
}

.user-image-wrapper > img{
    width: 100%;
    height: 100%;
}
</style>