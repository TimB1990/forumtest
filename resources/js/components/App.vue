<template>
   <div class="container">
      <header class="container__head">This is a header</header>
      <nav class="container__breadcrumbs">... > ... > ... </nav>
      <main class="container__main">

         <!-- main cols -->
         <div class="forums">forums</div>
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
export default {
   data() {
      return {
         message: "I am saying Hello",
      };
   },

   mounted() {
      console.log("Example Component Mounted");
   },
};
</script>