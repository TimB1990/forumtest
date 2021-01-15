<template>
  <div class="thread">
    <div class="thread-image"><img :src="user.image" alt="" /></div>
    <div class="thread-info">
      <span class="thread-info-title">{{ lastThread.title }}</span>
      <span class="thread-info-author">{{ lastThread.user }}</span>
      <span class="thread-info-date">{{ lastThread.created_at }}</span>
    </div>
  </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";
import axios from "axios";

export default {
  name: "thread",

  props: {
    forumId: Number,
  },

  setup(props) {
    const store = useStore();

    let lastThread = ref({});
    let user = ref({});

    onBeforeMount(() => {
      axios
        .get(`/api/threads/latest?forum=${props.forumId}`)
        .then((resp) => {
          lastThread.value = resp.data;
          if (resp.data) {
            axios.get(`/api/users/${resp.data.user_id}`).then((usr) => {
              user.value = usr.data;
            });
          }
        })
        .catch((err) => {
          console.log(err.response.data.message);
        });
    });

    return {
      props,
      lastThread,
      user,
    };
  },
};
</script>

<style>
.thread {
  display: flex;
  height: 100%;
}

.thread-image {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: lightgrey;
  width: 6.4rem;
}

.thread-image > img {
  width: 100%;
  height: 100%;
}

.thread-info {
  display: flex;
  flex-direction: column;
  font-size: 1.5rem;
  padding: 1rem;
}

.thread-info-title {
  font-weight: bold;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: 30rem;
  display: block;
  overflow: hidden;
}

.thread-info-author {
}

.thread-info-date {
}
</style>