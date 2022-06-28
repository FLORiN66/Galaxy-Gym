<template>
    <Head title="Edit Subscription"/>
    <PageHeader>Edit Subscription</PageHeader>
    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8" :id="'user-' + form.id">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name*</label>
            <input v-model="form.name" type="text" name="name" id="name"
                   class="border border-gray-400 p-2 w-full" required>
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="value" class="block mb-2 uppercase font-bold text-xs text-gray-700">Price*</label>
            <input v-model="form.value" type="number" name="value" id="value"
                   class="border border-gray-400 p-2 w-full" required>
            <div v-if="form.errors.value" v-text="form.errors.value" class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-8 flex justify-between">
            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-bllue-500"
                    :disabled="form.processing">
                Submit
            </button>
            <Link class="bg-blue-400 text-white rounded py-2 px-4 float-right hover:bg-bllue-500" href="/subscriptions"> Cancel </Link>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import PageHeader from "../../Shared/PageHeader";


let props = defineProps({
    name: String,
    value: String,
    id: String
});

let form = useForm({
    id: props.id,
    name: props.name,
    value: props.value,
    new_subscription: false,
});

let submit = () => {
    form.post('/subscriptions');
}
</script>
