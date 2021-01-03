<template>
<div class="counter">
   <span class="counter-number">12345</span>
   <span class="counter-subject">posts</span>
</div>
</template>

<script>
import { onBeforeMount, computed, ref } from 'vue'
import { useStore } from 'vuex'

export default {
   name: 'counter',
   setup(){
      const store = useStore();
   }
}
</script>

<style>
.counter{
   display: flex;
   flex-direction: column;
   border: 1px solid grey;
   padding: 1rem;
   text-align: center;
   flex-grow: 1;
}

.counter-number{
   font-size: 3rem;
   font-weight: bold;
   letter-spacing: 0.3rem;
}

.counter-subject{
   font-size: 2rem;

}

</style>