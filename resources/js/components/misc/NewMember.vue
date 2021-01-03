<template>
    <div class="new-member">
        <div class="new-member-image"><span>M</span></div>
        <div class="new-member-info">
            <span class="new-member-title">Newest Member</span>
            <span class="new-member-name">Member123</span>
            <span class="new-member-since">January 3, 2021</span>
        </div>
    </div>
</template>

<script>
import { onBeforeMount, computed, ref } from "vue";
import { useStore } from "vuex";

export default {
    name: "newMember",
    setup() {
        const store = useStore();
    },
};
</script>

<style>
.new-member {
    display: flex;
    align-items: center;
    border: 1px solid grey;
    flex-grow: 0.5;
}

.new-member-image {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: lightgrey;
    margin-left: 1rem;
    width: 6.4rem;
    height: 6.4rem;
    font-size: 4rem;
}

.new-member-info {
    display: flex;
    flex-direction: column;
    font-size: 1.5rem;
    padding: 1rem;
}

.new-member-title {
    text-transform: uppercase;
}
</style>