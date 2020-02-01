<template>
    <div>
        <nav-bar/>
        <router-view/>
        <app-footer/>
    </div>
</template>
<script>
    import NavBar from './components/Navbar';
    import AppFooter from './components/Footer';

    export default {
        components: {AppFooter, NavBar}
    }
</script>
