<template>
  <div class="thread">
    <div class="thread-image"><span>T</span></div>
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

    onBeforeMount(() => {
      let response = axios
        .get(`/api/threads/latest?forum=${props.forumId}`)
        .then((resp) => {
          lastThread.value = resp.data;
        })
        .catch((err) => {
          console.log(err.response.data.message);
        });
    });

    return {
      props,
      lastThread,
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
  height: 100%;
  font-size: 4rem;
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