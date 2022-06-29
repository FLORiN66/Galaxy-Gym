<template>
    <Head title="Subscriptions"/>
    <PageHeader>Subscriptions</PageHeader>
    <div class="flex justify-between mb-6 p-5">
        <Button v-if="can.edit" href="/subscriptions/create">New Subscription</Button>

    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full p-5">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="subscription in subscriptions" :key="subscription.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ subscription.name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ subscription.email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td v-if="can.edit" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <Link :href="`/subscription/${subscription.id}/edit`"
                                      class="text-indigo-600 hover:text-indigo-900">
                                    Edit
                                </Link>
                                <Button :href="`/subscription/${subscription.id}/delete`" :deleteButton="true" class="ml-4">
                                    Delete
                                </Button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import PageHeader from "../../Shared/PageHeader";
import Button from "../../Shared/Button";

let props = defineProps({
    subscriptions: Object,
    can: Object
});
</script>
