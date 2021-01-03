<template>
<div class="thread">
   <div class="thread-image"><span>T</span></div>
   <div class="thread-info">
      <span class="thread-info-title">Lorem ipsum dolor si amet</span>
      <span class="thread-info-author">Test</span>
      <span class="thread-info-date">December 31</span>
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
      display: flex;
      height: 100%;
   }

   .thread-image{
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: lightgrey;
      width: 6.4rem;
      height: 100%;
      font-size: 4rem;
   }

   .thread-info{
      display: flex;
      flex-direction: column;
      font-size: 1.5rem;
      padding: 1rem;
   }

   .thread-info-title{
      font-weight: bold;
   }

   .thread-info-author{

   }

   .thread-info-date{


   }

</style>