<template>
    <Head title="Users"/>
    <PageHeader>Users</PageHeader>
    <div class="flex justify-between mb-6 p-5">
        <!--        <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-3"> New User </Link>-->
        <Button v-if="can.createUser" href="/users/create">New User</Button>

        <input v-model="search" type="text" placeholder="Search" class="border px-2 rounded-lg">
    </div>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full p-5">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="user in users.data" :key="user.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                             src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y"
                                             alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ user.name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ user.email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td v-if="user.can.edit" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <Link :href="`/user/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                    Edit
                                </Link>
                                <Button :href="`/user/${user.id}/delete`" :deleteButton="true" class="ml-4">Delete
                                </Button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--    Pagination-->
    <Pagination :links="users.links" class="mt-6"/>
</template>

<script setup>
import {ref, watch} from "vue";
import Pagination from "../../Shared/Pagination";
import PageHeader from "../../Shared/PageHeader";
import Button from "../../Shared/Button";
import {Inertia} from "@inertiajs/inertia";
//Search every 500 milliseconds
// import {throttle} from "lodash/function";
//Search after 500 milliseconds user finished to type
import {debounce} from "lodash/function";

let props = defineProps({
    users: Object,
    filters: Object,
    can: Object
});

//default value for search
let search = ref(props.filters.search);
watch(search, debounce(function (value) {
    Inertia.get('/users', {
        search: value
    }, {
        //don't reload when type inside input
        preserveState: true,
        //replace current url if is the same (for input search)
        replace: true
    })
}, 300));

</script>
