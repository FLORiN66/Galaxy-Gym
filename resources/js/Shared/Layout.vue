<template>
    <Head>
        <title>Galaxy Gym</title>
        <meta type="description" content="This is an app created by Florin Moisei" head-key="description">
    </Head>
<!--    <section class="p-6 bg-gray-200">-->
<!--        <header class="flex justify-between">-->
<!--            <div class="flex items-center">-->
<!--                <h1 class="font-bold text-lg">Users management</h1>-->
<!--                <p class="text-sm ml-4">Welcome back, {{ username }}</p>-->
<!--            </div>-->
<!--            <Nav/>-->
<!--        </header>-->
<!--    </section>-->
    <section>
        <header>
            <Nav />
        </header>
    </section>


    <section>
        <div class="flex flex-col md:flex-row">
            <SidebarNav/>
            <section class="w-full">
                <div id="main" class="main-content flex-1 bg-gray-100 mt-12 md:mt-2 md:pb-5">
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
