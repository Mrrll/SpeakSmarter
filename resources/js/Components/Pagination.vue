<template>
    <nav class="flex items-center justify-center space-x-2">
        <!-- Botón de página anterior -->
        <button :class="buttonClass(data.prev_page_url, false)" @click="goToPage(data.links[0]?.url)"
            :disabled="!data.prev_page_url">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>

        <!-- Botones para las páginas intermedias -->
        <button v-for="link in data.links.slice(1, -1)" :key="link.label" :class="pageButtonClass(link.active)"
            v-html="link.label" @click="goToPage(link.url)"></button>

        <!-- Botón de página siguiente -->
        <button :class="buttonClass(data.next_page_url, true)"
            @click="goToPage(data.links[data.links.length - 1]?.url)" :disabled="!data.next_page_url">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </nav>
</template>

<script>
export default {
    name: "Pagination"    
};
</script>

<script setup>
import { router } from '@inertiajs/vue3';
defineProps({
    data: {
        type: Object,
        required: true
    }
})
const goToPage = url => {
    router.get(url, {}, { preserveScroll: true });
}
const buttonClass = (url, isNext) => [
    "flex items-center px-2 py-2 rounded-full transition",
    url ? "text-gray-700 bg-gray-200 hover:bg-gray-300" : "bg-blue-900 text-white cursor-not-allowed opacity-50",
    isNext ? "ml-2" : "mr-2",
];
const pageButtonClass = isActive => [
    "px-4 py-2 rounded-full transition",
    isActive ? "bg-blue-500 text-white" : "bg-gray-200 text-gray-700 hover:bg-gray-300"
];
</script>