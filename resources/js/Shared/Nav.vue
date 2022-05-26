<template>
    <nav aria-label="menu nav"
         class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">

        <!--        <ul class="flex space-x-6">-->
        <!--            <li>-->
        <!--                <NavLink href="/" :active="$page.component === 'Home'">Home</NavLink>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <NavLink href="/users" :active="$page.component === 'Users/Index'">Users</NavLink>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <NavLink href="/settings" :active="$page.component === 'Settings'">Settings</NavLink>-->
        <!--            </li>-->
        <!--            <li>-->
        <!--                <NavLink href="/logout" method="post">Log Out</NavLink>-->
        <!--            </li>-->
        <!--        </ul>-->
        <div class="flex flex-wrap items-center">
            <div class="flex flex-shrink md:w-1/3 justify-center md:justify-start text-white">
                <a href="#" aria-label="Home">
                    <span class="text-xl pl-2">
                        <p class="text-sm ml-4">Welcome back, {{ username }}</p>
                    </span>
                </a>
            </div>

            <div class="flex flex-1 md:w-1/3 justify-center md:justify-start text-white px-2">
                <span class="relative w-full">
                    <input
                        aria-label="search"
                        type="search"
                        id="search"
                        placeholder="Search"
                        class="w-full bg-gray-900 text-white transition border border-transparent focus:outline-none focus:border-gray-400 rounded py-3 px-2 pl-10 appearance-none leading-normal"/>
                    <div class="absolute search-icon"
                         style="top: 1rem; left: 0.8rem">
                        <svg
                            class="fill-current pointer-events-none text-white w-4 h-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"
                            ></path>
                        </svg>
                    </div>
                </span>
            </div>

            <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">

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
