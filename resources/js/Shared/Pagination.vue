<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :href="link.url" v-html="link.label"
            class="px-1"
            :class="{
                'text-gray-500' : ! link.url,
                'font-bold' : link.active
            }"
        />
        <!--        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">-->
        <!--            <div class="flex-1 flex justify-between sm:hidden">-->
        <!--                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">-->
        <!--                    Previous-->
        <!--                </a>-->
        <!--                <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">-->
        <!--                    Next-->
        <!--                </a>-->
        <!--            </div>-->
        <!--            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">-->
        <!--                <div>-->
        <!--                    <p class="text-sm text-gray-700">-->
        <!--                        Showing-->
        <!--                        <span class="font-medium">1</span>-->
        <!--                        to-->
        <!--                        <span class="font-medium">{{links.length - 2}}</span>-->
        <!--                        of-->
        <!--                        <span class="font-medium">97</span>-->
        <!--                        results-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--                <div>-->
        <!--                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">-->
        <!--                        <a :href="links[0].url" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">-->
        <!--                            <span class="sr-only">Previous</span>-->
        <!--                            &lt;!&ndash; Heroicon name: solid/chevron-left &ndash;&gt;-->
        <!--                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
        <!--                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />-->
        <!--                            </svg>-->
        <!--                        </a>-->
        <!--                        &lt;!&ndash; Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" &ndash;&gt;-->
        <!--                        <a v-for="link in links" :key="link" :href="link.url"-->
        <!--                           v-html="link.label"-->
        <!--                           aria-current="page"-->
        <!--                           class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">-->
        <!--                        </a>-->

        <!--                        <a :href="links[links.length -1].url" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">-->
        <!--                            <span class="sr-only">Next</span>-->
        <!--                            &lt;!&ndash; Heroicon name: solid/chevron-right &ndash;&gt;-->
        <!--                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
        <!--                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />-->
        <!--                            </svg>-->
        <!--                        </a>-->
        <!--                    </nav>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</template>

<script>
export default {
    props: {
        links: Array
    }
};
</script>
