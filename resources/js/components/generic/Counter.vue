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

}

.counter-number{

}

.counter-subject{

}

</style>