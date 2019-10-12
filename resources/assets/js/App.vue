<template>
    <div>
        <nav-bar/>
        <router-view/>
        <app-footer/>
    </div>
</template>
<script>
    import AppFooter from './components/Footer'
    import NavBar from './components/Navbar'

    export default {
        components: {AppFooter, NavBar}
    }
</script>