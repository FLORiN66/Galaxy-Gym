<template>
    <nav aria-label="alternative nav">
        <div
            class="bg-gray-800 h-20 fixed bottom-0 md:relative z-10 w-full md:w-48 content-center">
            <div
                class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                    <li class="mr-3 flex-1">
                        <NavLink href="/" :active="$page.component === 'Home'">
                            <i class="fa fa-home pr-0 md:pr-3"></i>Home
                        </NavLink>
                    </li>
                    <li class="mr-3 flex-1">
                        <NavLink href="/users" :active="$page.component === 'Users/Index'">
                            <i class="fa fa-users pr-0 md:pr-3"></i>Users
                        </NavLink>
                    </li>
                    <li class="mr-3 flex-1">
                        <NavLink href="/subscriptions" :active="$page.component === 'Subscriptions/Index'">
                            <i class="fa-solid fa-layer-group pr-0 md:pr-3"></i>Subscriptions
                        </NavLink>
                    </li>
                    <li class="mr-3 flex-1">
                        <NavLink href="/settings" :active="$page.component === 'Settings'">
                            <i class="fas fa-tasks pr-0 md:pr-3"></i>Settings
                        </NavLink>
                    </li>
                    <li class="mr-3 flex-1">
                        <NavLink as="button" href="/logout" method="post" class="text-left w-full">
                            <i class="fa-solid fa-right-from-bracket pr-0 md:pr-3"></i>Log Out
                        </NavLink>
                    </li>
                </ul>
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
