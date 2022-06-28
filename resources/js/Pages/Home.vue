<template>
    <Head title="Home"/>
    <PageHeader>Home</PageHeader>
    <div class="p-4">
        <div class="flex flex-wrap">
            <div class="w-full p-6">
                <!--Metric Card-->
                <div
                    class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full">
                                <i class="fas fa-circle-info fa-4x fa-inverse text-blue-600"></i>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 w-full">
                            <div>
                                <h2 class="font-bold uppercase text-gray-600">
                                    General information
                                </h2>
                                <p class="">
                                    {{about}}
                                </p>
                            </div>
                            <div>
                                <h2 class="font-bold uppercase text-gray-600">
                                    Contact information
                                </h2>
                                <p><span class="font-bold">Email: </span>{{email}}</p>
                                <p><span class="font-bold">Phone: </span>{{phone}}</p>
                                <p><span class="font-bold">Address: </span>{{address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Metric Card-->
                <div
                    class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-green-600">
                                <i class="fa fa-wallet fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">
                                Total Revenue
                            </h2>
                            <p class="font-bold text-3xl">
                                {{total_revenue}} RON
                                <span class="text-green-500">
                                <i class="fas fa-caret-up"></i>
                            </span>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Metric Card-->
                <div
                    class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-pink-600">
                                <i class="fas fa-users fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">
                                Total Users
                            </h2>
                            <p class="font-bold text-3xl">
                                {{ total_users }}
                                <span class="text-pink-500">
                                <i class="fas fa-exchange-alt"></i>
                            </span>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>
            <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                <!--Metric Card-->
                <div
                    class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded-full p-5 bg-yellow-600">
                                <i class="fas fa-user-plus fa-2x fa-inverse"></i>
                            </div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h2 class="font-bold uppercase text-gray-600">
                                New Users
                            </h2>
                            <p class="font-bold text-3xl">
                                {{new_users}}
                                <span class="text-yellow-600">
                                <i class="fas fa-caret-up"></i>
                            </span>
                            </p>
                        </div>
                    </div>
                </div>
                <!--/Metric Card-->
            </div>

        </div>
    </div>


</template>

<script setup>
import PageHeader from "../Shared/PageHeader";

defineProps({
    total_users: Number,
    new_users: Number,
    total_revenue: Number,
    about: String,
    email: String,
    phone: String,
    address: String
});
</script>
