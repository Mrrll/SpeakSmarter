<script>
export default {
    name: "LessonsCreate"
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import lessonForm from '@/Components/Lessons/Form.vue';
const form = useForm({
    name: ""
})
defineProps({
    categories: {
        type: Object,
        required: true
    },
    levels: {
        type: Object,
        required: true
    }
})
</script>

<template>
    <AppLayout title="Create Lesson">
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Create lesson</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-m-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <lessonForm :form="form" @submit="form.post(route('lessons.store'))" :categories="categories" :levels="levels"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>