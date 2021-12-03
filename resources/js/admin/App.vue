<template>
    <div class="page-wrapper">
        <sidebar></sidebar>
        <div class="content container-fluid">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
import sidebar from "./components/Sidebar.vue";
export default {
    components: {
        sidebar,
    },
};
</script>