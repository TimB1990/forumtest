<template>
  <div class="title-element">
    <span class="title-element-topic"
      ><router-link :to="{ name: 'topic', params: { slug: props.thread.slug } }">{{
        props.thread.title
      }}</router-link></span
    >
    <span class="title-element-created"
      >By: {{ props.thread.user }} | {{ props.thread.created_at }}</span
    >
  </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
  name: "threadTitle",

  props: {
    thread: Object
  },

  components: {},
  setup(props) {
    const store = useStore();

    return {
      props,
    };
  },
};
</script>

<style>
.title-element {
  display: flex;
  flex-direction: column;
  border: 1px solid green;
  padding: 1rem;
}

.title-element-topic {
  font-size: 2rem;
  font-weight: bold;
  padding: 0;
}

.title-element-created {
  font-size: 1.5rem;
}
</style>