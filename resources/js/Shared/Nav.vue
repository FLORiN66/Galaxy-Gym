<template>
    <nav aria-label="menu nav"
         class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <Link href="/" aria-label="Home">
<!--                    <img class="ml-5 mt-1 h-20" src="../../images/GalaxyGym.png" alt="">-->
                </Link>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">

                </span>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                <span class="text-xl pr-5 text-white">
                <p class="text-sm ml-4">Welcome back, {{ username }}</p>
                </span>
            </div>
        </div>
    </nav>
</template>

<script>
import NavLink from './NavLink';

export default {
    components: {NavLink},
    computed: {
        username() {
            return this.$page.props.auth.user.username
        }
    }
};
</script>
