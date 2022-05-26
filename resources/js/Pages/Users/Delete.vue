<template>
    <Head title="Edit User"/>
    <PageHeader>Delete User</PageHeader>
    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8" :id="'delete-user-' + form.id">
        <div class="mb-6">
            <div class="flex items-center mb-2">

                <label for="delete" class="pl-2 font-bold text-xs text-gray-700">

                    Are you sure you want to delete <u class="uppercase">{{ props.name }}</u> user?</label>
            </div>

        </div>
        <div class="mb-8">
            <button type="submit" class="bg-red-400 text-white rounded py-2 px-4 hover:bg-red-500"
                    :disabled="form.processing">
                YES, Delete user
            </button>
            <button class="bg-blue-400 text-white rounded py-2 px-4 ml-5 hover:bg-blue-500">
                <Link href="/users">Go back</Link>
            </button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import PageHeader from "../../Shared/PageHeader";

let props = defineProps({
    id: Number,
    name: Object
});

let form = useForm({
    id: props.id
});

let submit = () => {
    form.post(`/user/${form.id}/deleted`);
}
</script>
