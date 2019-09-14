<template>
    <div>
        <header></header>
        <navigation></navigation>
        <router-view></router-view>
        <footer></footer>
    </div>
</template>

<script>
    import Header from "../components/Header";
    import Navigation from "../components/Navigation";
    import Footer from "../components/Footer";
    export default {
        name: "App.vue",
        components: {Header, Navigation, Footer}
    }
</script>

<style scoped>

</style>
