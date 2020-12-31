<template>
<div class="thread">
   <div class="thread-image"></div>
   <div class="thread-info">
      <span>Lorem ipsum dolor si amet</span>
      <span>Test</span>
      <span>December 31</span>
   </div>
</div>
</template>

<script>
import { onBeforeMount, computed, ref } from 'vue'
import { useStore } from 'vuex'

export default {
   name: 'thread',
   setup(){
      const store = useStore();
   }
}
</script>

<style>
   .thread{

   }

   .thread-image{

   }

   .thread-info{

   }
</style>