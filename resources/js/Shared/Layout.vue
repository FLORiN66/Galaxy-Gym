<template>
    <Head>
        <title>Galaxy Gym</title>
        <meta type="description" content="This is an app created by Florin Moisei" head-key="description">
    </Head>

    <section>
        <header>
            <Nav />
        </header>
    </section>


    <section>
        <div class="flex flex-col md:flex-row">
            <SidebarNav/>
            <section class="w-full pb-20 md:pb-0">
                <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-12 md:pb-5">
                    <div id="messages"></div>
                    <slot/>
                </div>
            </section>
        </div>
    </section>
</template>

<script>
import Nav from "./Nav.vue";
import SidebarNav from "./SidebarNav";
import {Head} from "@inertiajs/inertia-vue3";

export default {
    components: {Nav, SidebarNav, Head},
    computed: {
        username() {
            return this.$page.props.auth.user.username
        }
    }
};
</script>
