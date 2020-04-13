<template>
    <div class="d-flex">
        <sidebar></sidebar>
        <router-view></router-view>
    </div>
</template>


<script>
import sidebar from './components/sidebar/SidebarComponent';
    export default {
        name: "App",
        components: {sidebar},
    }
</script>

<style scoped>

</style>
