<template>
    <Head title="Edit User"/>
    <h1 class="text-3xl">Delete User </h1>
    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8" :id="'delete-user-' + form.id">
        <div class="mb-6">
            <div class="flex items-center mb-2">

                <label for="delete" class="pl-2 uppercase font-bold text-xs text-gray-700">
                    <input v-model="form.yes" type="radio" name="delete" id="delete"
                           class="border border-gray-400 p-2">
                    YES</label>
            </div>
            <div class="flex items-center mb-2">

                <label for="no-delete" class="pl-2 uppercase font-bold text-xs text-gray-700">
                    <input v-model="form.no" type="radio" name="no-delete" id="no-delete"
                           class="border border-gray-400 p-2" checked>
                    NO</label>
            </div>

        </div>
        <div class="mb-8">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-bllue-500"
                    :disabled="form.processing">
                Submit
            </button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let props = defineProps({
    id: Number
});

let form = useForm({
    id: props.id,
    yes: true,
    no: false
});

let submit = () => {
    form.post('/users');
}
</script>
