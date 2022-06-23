<template>
    <Head title="Settings"/>
    <PageHeader>Settings</PageHeader>
    <div class="p-4">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                    <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be careful what
                        you share.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                            <div>
                                <label for="about" class="block text-sm font-medium text-gray-700"> About </label>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="3"
                                              class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                                              placeholder="you@example.com"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">Brief description for your profile. URLs are
                                    hyperlinked.</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700"> Change Profile Photo </label>
                                <file-pond
                                    name="image"
                                    ref="pond"
                                    label-idle="Click to choose image, or drag here..."
                                    @init="filepondInitialized"
                                    accepted-file-types="image/*"
                                    max-file-size="1MB"
                                />
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="#" method="POST">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="first-name" class="block text-sm font-medium text-gray-700">First
                                        name</label>
                                    <input type="text" name="first-name" id="first-name" autocomplete="given-name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <label for="last-name" class="block text-sm font-medium text-gray-700">Last
                                        name</label>
                                    <input type="text" name="last-name" id="last-name" autocomplete="family-name"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                                        address</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6">
                                    <label for="street-address" class="block text-sm font-medium text-gray-700">Street
                                        address</label>
                                    <input type="text" name="street-address" id="street-address"
                                           autocomplete="street-address"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input type="text" name="city" id="city" autocomplete="address-level2"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="region" class="block text-sm font-medium text-gray-700">State /
                                        Province</label>
                                    <input type="text" name="region" id="region" autocomplete="address-level1"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                    <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP /
                                        Postal code</label>
                                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import PageHeader from "../Shared/PageHeader";

import vueFilePond, {setOptions} from 'vue-filepond';
import 'filepond/dist/filepond.min.css';
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

setOptions({
    server: {
        process: {
            url: './upload',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
            }
        }
    }
});

const FilePond = vueFilePond(FilePondPluginFileValidateType);
export default {
    components: {PageHeader, FilePond},
    methods: {
        filepondInitialized() {
            console.log('Filepond object: ', this.$refs.pond)
        }
    }
};
</script>
