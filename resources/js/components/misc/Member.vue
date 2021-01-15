<template>
  <div class="member">
    <div class="member-image">
      <img :src="props.member.image" alt="">
    </div>
    <div class="member-info">
      <span v-if="props.announceNewest" class="member-title"
        >Newest Member</span
      >
      <span class="member-name">{{ props.member.name }}</span>
      <span class="member-since">{{ props.member.created_at}}</span>
    </div>
  </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
  name: "member",
  props: {
    announceNewest: {
      type: Boolean,
      default: false,
    },
    
    member: Object
  },

  setup(props) {
    const store = useStore();

    return {
      props,
    };
  },
};
</script>

<style>
.member {
  display: flex;
  align-items: center;
  border: 1px solid grey;
  flex-grow: 0.5;
}

.member-image {
  margin-left: 1rem;
  width: 6.4rem;
  height: 6.4rem;
}

.member-image > img {
  height: 100%;
  width: 100%;
}

.member-info {
  display: flex;
  flex-direction: column;
  font-size: 1.5rem;
  padding: 1rem;
}

.member-title {
  text-transform: uppercase;
}
</style>