<template>
<div class="detail">
   <div class="detail-image"></div>
   <div class="detail-info">
      <span class="detail-info-title">Generic</span>
      <span class="detail-info-children">Thread-1, Thread-2, Thread-3</span>
   </div>
</div>
</template>

<script>
import { onBeforeMount, computed, ref } from 'vue'
import { useStore } from 'vuex'

export default {
   name: 'detail',
   setup(){
      const store = useStore();
   }
}
</script>

<style>
   .detail{

   }

   .detail-info{

   }

   .detail-info-title{

   }

   .detail-info-children{

   }

   .detail-image{

   }
</style>