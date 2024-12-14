<template>
    <tbody class="divide-y divide-gray-200">
        <tr v-for="category in categories.data" :key="category.id">
            <td class="px-4 py-2 font-medium text-center text-gray-900 whitespace-nowrap">{{
                category.name }}
            </td>
            <td class="px-4 py-2 text-center text-gray-700 whitespace-nowrap">{{
                category.created_at
                }}</td>
            <Options v-if="hasAnyOptionTrue" :Options="props.Options" NameUrl="categories" :data="category" />
        </tr>
    </tbody>
</template>

<script>
export default {
    name: 'CategoriesTbody'
}
</script>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import Options from '@/Components/Tables/Partials/Options.vue';
import { computed } from 'vue';

const props = defineProps({
    categories: {
        type: Object,
        required: true
    },
    Options: {
        type: Object,
        default: () => ({
            show: false,
            edit: false,
            delete: false,
        }),
    },
})
const hasAnyOptionTrue = computed(() => {
    return Object.values(props.Options).includes(true);
});
</script>

<style></style>