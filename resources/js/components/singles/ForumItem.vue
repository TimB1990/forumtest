<template>
  <div class="item-container">
    <detail
      :slug="props.forum.slug"
      :name="props.forum.name"
      :children="props.forum.children"
    />
    <div class="counters-wrapper">
      <counter :count="props.forum.threads_count" :subject="'threads'" />
      <counter :count="props.forum.posts_count" :subject="'posts'" />
    </div>
    <div class="item-thread-wrapper">
      <thread :forumId="props.forum.id" />
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
    forum: Object,
  },

  components: { Detail, Counter, Thread },
  setup(props) {
    const store = useStore();

    return {
      props,
    };
  },
};
</script>

<style>
.item-thread-wrapper {
  grid-row: 1/-1;
  grid-column: 3/-1;
  align-items: center;
  border: 1px solid grey;
}

.item-container {
  display: grid;
  grid-template-rows: 1fr;
  grid-template-columns: 25% 1fr 25%;
  justify-content: space-between;
  column-gap: 1.5rem;
}

.counters-wrapper {
  display: flex;
}
</style>