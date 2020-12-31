<template>
<div class="category-container">
    <detail/>
    <counter/>
    <thread/>
</div>
</template>

<script>
import { onBeforeMount, computed, ref } from 'vue'
import { useStore } from 'vuex'
import Detail from '../generic/Detail'
import Counter from '../generic/Counter'
import Thread from '../generic/Thread'

export default {
    name: 'categoryItem',
    components: { Detail, Counter, Thread},
   setup(){
      const store = useStore();
   }
}
</script>

<style>
   .category-container{
      display: flex;
      justify-content: space-between;
      padding: 2rem;
      height: 8rem;
      border: 1px solid red;
   }

</style>