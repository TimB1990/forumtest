<template>
<div class="counter">
   <span class="counter-number">{{ props.count }}</span>
   <span class="counter-subject">{{ props.subject }}</span>
</div>
</template>

<script>
import { onBeforeMount, computed, ref } from 'vue'
import { useStore } from 'vuex'

export default {
   name: 'counter',

   props: {
      count: {
         type: Number,
         default: 0
      },
      subject: {
         type: String,
         default: 'posts'
      }
   },

   setup(props){
      const store = useStore();

      return {
         props
      }
   }
}
</script>

<style>
.counter{
   display: flex;
   flex-direction: column;
   border: 1px solid grey;
   text-align: center;
   padding: 1rem;
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