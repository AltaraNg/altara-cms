<template>
    <div>
        <nav-bar/>
        <router-view></router-view>
        <app-footer/>
    </div>
</template>
<script type="text/javascript">
    import Sidebar from "./components/Sidebar.vue";
    import AppFooter from './components/Footer'
    import NavBar from './components/Navbar'

    export default {
        components: {
            Sidebar, AppFooter, NavBar
        }
    };
</script>