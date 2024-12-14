<template>  
    <tbody class="divide-y divide-gray-200">
        <tr v-for="lesson in lessons.data" :key="lesson.id">
            <td class="px-4 py-2 font-medium text-center text-gray-900 whitespace-nowrap">{{
                lesson.name }}
            </td>
            <td class="px-4 py-2 font-medium text-center text-gray-900 whitespace-nowrap">{{
                lesson.description }}
            </td>
            <td class="px-4 py-2 text-center text-gray-700 whitespace-nowrap">{{
                lesson.created_at
            }}</td>
            <Options v-if="hasAnyOptionTrue" :Options="Options" />      
        </tr>
    </tbody>
</template>

<script>
export default {
    name: 'LessonsTbody'
}
</script>

<script setup>
import { Inertia } from '@inertiajs/inertia';
import Options from '@/Components/Tables/Partials/Options.vue';

const props = defineProps({
    lessons: {
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

const deleteInstancia = id => {
    if (confirm('Are you sure?')) {
        Inertia.delete(route('lessons.destroy', id))
    }
}

</script>

<style>

</style>