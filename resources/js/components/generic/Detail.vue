<template>
<div class="detail">
   <div class="detail-image"><i class="far fa-comments"></i></div>
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
      display: flex;
      grid-row: 1/-1;
      grid-column: 1;
      border: 1px solid purple;

   }

   .detail-image{
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: lightgrey;
      width: 6.4rem;
      height: 100%;
      font-size: 4rem;
   }

   .detail-info{
      display: flex;
      flex-direction: column;
      padding: 1rem;

   }

   .detail-info-title{
      font-size: 2.5rem;
      font-weight: bold;

   }

   .detail-info-children{
      font-size: 1.5rem;

   }
</style>