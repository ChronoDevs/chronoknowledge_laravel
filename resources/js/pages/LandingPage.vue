<template>
    <div id="landingComponent" :class="[
    { 'landingLoggedIn': isLoggedIn },
    { 'landingGuest': !isLoggedIn }
    ]">
        <div v-show="isLoggedIn" class="sidebar-menu">
            <Sidebar></Sidebar>
        </div>
        <div class="sidebar-views">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import { getters, mutations, actions } from "../store";
import Sidebar from '../components/main/Sidebar.vue'

export default {
    components: { Sidebar },
    data() {
        return {
        };
    },
    methods: {
        ...mutations, ...actions
    },
    computed: {
        ...getters,
        landingLoggedInStyle() {
            return {
                'grid-template-areas': `'sidebar posts posts category''sidebarclasspapi posts posts popular'`,
                'background-color': 'none',
                'padding': '0'
            }
        }
    }
};
</script>

<style lang="scss">
@import "../../sass/imports";

.landingLoggedIn {
    display: grid;
    grid-template-columns: 380px auto;
}
.landingGuest {
    display: grid;
    grid-template-columns: auto;
}

</style>
