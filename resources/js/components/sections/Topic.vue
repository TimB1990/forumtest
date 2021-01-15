<template>
  <div>
    <p class="posts-thread-title">
      {{ route.params.slug.replace(/-/gi, " ") }}
    </p>
    <div class="posts-container">
      <PostItem v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import { onBeforeMount, computed, ref, watch } from "vue";
import { useStore } from "vuex";
import { useRoute, onBeforeRouteUpdate } from "vue-router";
import PostItem from "../singles/PostItem";

export default {
  name: "Topic",
  components: { PostItem },

  setup() {
    const store = useStore();
    const route = useRoute();

    onBeforeMount(async () => {
      store.dispatch("forum/clearPosts");
      await store.dispatch("forum/fetchPosts", {
        threadSlug: route.params.slug,
      });
    });

    watch(
      () => route.params,
      async (newParams) => {
        store.dispatch("forum/clearPosts");
        await store.dispatch("forum/fetchPosts", {
          threadSlug: newParams.slug,
        });
      }
    );

    const posts = computed(() => store.getters["forum/posts"]);

    return {
      posts,
      route,
    };
  },
};
</script>

<style>
.posts-container {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.posts-thread-title {
  font-size: 4rem;
  padding: 1.5rem;
  padding-bottom: 0;
}
</style>