<template>
    <Link
        class="block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-purple-500"
        :class="{'font-bold border-blue-600' : active}">
    <slot />
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: { Link },
    props: {
        active: Boolean
    }
};
</script>
