<template>
    <Head title="Create User"/>
    <PageHeader>Create New User</PageHeader>
    <form @submit.prevent="submit" class="max-w-md mx-auto mt-8">
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name*</label>
            <input v-model="form.name" type="text" name="name" id="name"
                   class="border border-gray-400 p-2 w-full" required>
            <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email*</label>
            <input v-model="form.email" type="email" name="email" id="email"
                   class="border border-gray-400 p-2 w-full" required>
            <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password*</label>
            <input v-model="form.password" type="password" name="password" id="password"
                   class="border border-gray-400 p-2 w-full" required>
            <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label for="role" class="block mb-2 uppercase font-bold text-xs text-gray-700">Role*</label>
            <select v-model="form.role" name="role" id="role">
                <option value="administrator">Administrator</option>
                <option value="subscriber">Subscriber</option>
            </select>

            <div v-if="form.errors.role" v-text="form.errors.role" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-8 flex justify-between">
            <button type="submit" class="hover:bg-transparent bg-blue-500 hover:text-blue-700 font-semibold text-white py-2 px-4 border hover:border-blue-500 border-transparent rounded"
                    :disabled="form.processing">
                Submit
            </button>
            <Button href="/users">Go back</Button>
        </div>
    </form>
</template>

<script setup>
import {useForm} from "@inertiajs/inertia-vue3";
import Button from "../../Shared/Button";
import PageHeader from "../../Shared/PageHeader";

let form = useForm({
    id: '',
    name: '',
    email: '',
    password: '',
    role: 'subscriber',
    subscription: null,
    new_user: true
});

let submit = () => {
    form.post('/users');
}

</script>
