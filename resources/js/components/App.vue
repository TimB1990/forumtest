<template>
   <div class="container">
      <header class="container__head">
         <div class="container__head--header">
            <p class="header-text">My Forum</p>
         </div>
         <div class="container__head--login">
            <login />
         </div>
      </header>
      <nav class="container__breadcrumbs"></nav>
      <main class="container__main">

         <!-- main cols -->
         <div class="forums">
            <div class="section-heading">
               Forums
            </div>
            <category-item v-for="index in 5" :key="index" />
         </div>
         <div class="forum-stats">
            <div class="section-heading">
               Forum statistics
            </div>
            <div class="section-counters">
               <counter/>
               <counter/>
            </div>
         </div>
         <div class="member-stats">
            <div class="section-heading">
               Member statistics
            </div>
            <div class="section-counters">
               <counter/>
               <counter/>
            </div>
         </div>

         <!-- side cols -->
         <div class="recent-subjects">
            <div class="section-heading">Recent subjects</div>
            <div class="recent-subject-wrapper" v-for="index in 5" :key="index">
               <thread/>
            </div>
         </div>

         <div class="recent-status-updates">
            Recent status updates
         </div>
         <div class="recent-online">
            Recente gebruikers online
         </div>
      </main>
      <footer class="container__foot">
         <div>Here go social links</div>
         <div>
            <span>Taal</span>
            <span>Privacy Policy</span>
            <span>Contact</span>
            <span>Regels</span>
         </div>
         <div>
            Testform &copy; 2021
         </div>
      </footer>
   </div>

</template>

<script>
import Login from './Login'
import CategoryItem from './singles/CategoryItem'
import Counter from './generic/Counter'
import Thread from './generic/Thread'
import { onBeforeMount, computed } from 'vue'
import { useStore } from 'vuex'

export default {
   components: { Login, CategoryItem, Thread, Counter },
   setup(){
      const store = useStore();
   }
}
</script>

<style>
.header-text{
   font-size: 6rem;
   font-weight: bold;
}

.forum-stats, .member-stats{
   display: flex;
   flex-direction: column;
}

.section-heading{
   background-color: lightgrey;
   padding: 1rem;
   font-size: 1.5rem;
   text-transform: uppercase;
}

.section-counters{
   display: flex;
}

.recent-subjects{
   display: grid;
   grid-template-rows: min-content repeat(5,1fr);
   border: 1px solid grey
}

.recent-subject-wrapper{
   padding: 1.5rem;
}
</style>