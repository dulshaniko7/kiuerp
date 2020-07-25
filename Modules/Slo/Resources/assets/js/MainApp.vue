<template>
    <div>
        <test></test>
        <router-view></router-view>
    </div>
</template>

<script>
    import Test from "./components/Test";
    export default {
        name: "MainApp",
        components: {Test}
    }
</script>

<style scoped>

</style>
