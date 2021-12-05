<template>
    <div class="container-scroller">
        <navbarAdmin></navbarAdmin>
        <div class="container-fluid page-body-wrapper">
            <sidebarAdmin></sidebarAdmin>

            <div class="main-panel">
                <div class="content-wrapper">
                    <router-view></router-view>
                </div>

                <footerAdmin></footerAdmin>
            </div>
        </div>
    </div>
</template>

<script>
import navbarAdmin from "./components/Navbar.vue";
import sidebarAdmin from "./components/Sidebar.vue";
import footerAdmin from "./components/Footer.vue";
export default {
    components: {
        navbarAdmin,
        sidebarAdmin,
        footerAdmin,
    },
};
</script>