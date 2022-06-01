<template>
    <Link
        class="bg-transparent font-semibold py-2 px-4 border rounded"
        :class="{'text-white bg-red-500 hover:bg-red-600' : deleteButton,
        'hover:bg-blue-500 text-blue-700 hover:text-white border-blue-500 hover:border-transparent' : !deleteButton}"
        >
        <slot/>
    </Link>
</template>

<script>
import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: {Link},
    props: {
        deleteButton: Boolean
    }
};
</script>
