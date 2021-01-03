<template>
<div class="footer-container">
        <div class="footer-socials">
        <i class="fab fa-facebook-f"></i>
        <i class="fab fa-twitter"></i>
        <i class="fab fa-instagram"></i>
        <i class="fab fa-youtube"></i>
    </div>
    <ul class="footer-nav">
        <li><a href="#">Language</a></li>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Rules</a></li>
    </ul>
    <div class="footer-text">Forum Test &copy; 2021</div>
</div>

</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
    name: "pageFooter",
    setup() {
        const store = useStore();
    },
};
</script>

<style>
.footer-container{
    display: grid;
    grid-template-rows: repeat(3,1fr);
    grid-template-columns: minmax(min-content, 40%) 1fr minmax(min-content, 40%);
    align-items: center;
    border: 1px solid red;
    height: 100%;
}

.footer-socials {
    grid-row: 1/2;
    grid-column: 2/3;
    display: flex;
    align-self: end;
    justify-content: space-evenly;
    width: 100%;
    font-size: 3.0rem;
}

.footer-nav{
    grid-row: 2/3;
    grid-column: 2/3;
    display: flex;
    justify-content: space-between;
    list-style-type: none;
    width: 100%;
    margin: 0;
    padding: 0;
}

.footer-nav > li {
    display: inline;
    font-size: 2rem;
}

.footer-text{
    grid-row: 3/-1;
    grid-column: 2/3;
    display: flex;
    justify-content: center;
    font-size: 1.5rem;

}
</style>