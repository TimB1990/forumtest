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
                <div class="section-heading">Forums</div>
                <!-- router view -->
                <router-view></router-view>
            </div>
            <div class="forum-stats">
                <div class="section-heading">Forum statistics</div>
                <div class="section-counters">
                    <counter />
                    <counter />
                </div>
            </div>
            <div class="member-stats">
                <div class="section-heading">Member statistics</div>
                <div class="section-counters">
                    <counter />
                    <counter />
                    <new-member />
                </div>
            </div>

            <!-- side cols -->
            <div class="recent-subjects">
                <div class="section-heading">Recent subjects</div>
                <div
                    class="recent-subject-wrapper"
                    v-for="index in 5"
                    :key="index"
                >
                    <thread />
                </div>
            </div>

            <div class="recent-online">
                <div class="section-heading">
                    Recent users online (view full list)
                </div>
                <div class="recent-online-list">
                    <span>Test 1</span>, <span>Test 2</span>,
                    <span>Test 3</span>, <span>Test 4</span>,
                    <span>Test 5</span>, <span>Test 6</span>,
                    <span>Test 7</span>, <span>Test 8</span>,
                    <span>Test 9</span>
                </div>
            </div>
        </main>
        <footer class="container__foot">
            <page-footer />
        </footer>
    </div>
</template>

<script>
import Login from "./Login";
import ForumItem from "./singles/ForumItem";
import Counter from "./generic/Counter";
import Thread from "./generic/Thread";
import PageFooter from "./misc/PageFooter";
import NewMember from "./misc/NewMember";
import { onBeforeMount, computed } from "vue";
import { useStore } from "vuex";

export default {
    components: { Login, Thread, Counter, PageFooter, NewMember },
    setup() {
        const store = useStore();
        return {
            //
        };
    },
};
</script>

<style>
.header-text {
    font-size: 6rem;
    font-weight: bold;
}
.forums {
    grid-row: 1/2;
    grid-column: 1/2;
}

.forum-stats {
    grid-row: 2/3;
    grid-column: 1/2;
}

.member-stats {
    grid-row: 3/-1;
    grid-column: 1/2;
}

.recent-subjects {
    grid-row: 1/2;
    grid-column: 2/-1;
    display: flex;
    flex-direction: column;
    border: 1px solid grey;
}

.recent-subject-wrapper {
    border: 1px solid red;
    height: 6rem;
    padding: 1.5rem;
}

.recent-online {
    grid-row: 2/-1;
    grid-column: 2/-1;
    display: grid;
    grid-template-rows: min-content 1fr;
    border: 1px solid grey;
}

.recent-online-list {
    font-size: 1.8rem;
    padding: 1.5rem;
    overflow: hidden;
}

.forum-stats,
.member-stats {
    display: flex;
    flex-direction: column;
}

.section-heading {
    background-color: lightgrey;
    padding: 1rem;
    font-size: 1.5rem;
    text-transform: uppercase;
}

.section-counters {
    display: flex;
}
</style>