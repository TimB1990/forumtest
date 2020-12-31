<template>
   <div class="container">
      <header class="container__head">
         <div class="container__head--header">
            {{ user }}
         </div>
         <div class="container__head--login">
            <login />
         </div>
      </header>
      <nav class="container__breadcrumbs"></nav>
      <main class="container__main">

         <!-- main cols -->
         <div class="forums">
            <category-item/>
         </div>
         <div class="forum-stats">Statestieken - forum</div>
         <div class="member-stats">Statistieken - leden</div>

         <!-- side cols -->
         <div class="recent-subjects">Recent subjects</div>
         <div class="recent-status-updates">Recent status updates</div>
         <div class="recent-online">Recente gebruikers online</div>

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
import { onBeforeMount, computed } from 'vue'
import { useStore } from 'vuex'

export default {
   components: { Login, CategoryItem },
   setup(){
      const store = useStore();
   }
}
</script>