<script>
export default {
    name: "CategoriesCreate"
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm } from '@inertiajs/vue3';
import categoryForm from '@/Components/Categories/Form.vue';
const form = useForm({
    name: ""
})
</script>

<template>
    <AppLayout title="Create Category">
        <template #header>
            <h1 class="text-xl font-semibold leading-tight text-gray-800">Create category</h1>
        </template>
        <div class="py-12">
            <div class="mx-auto max-m-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <categoryForm :form="form" @submit="form.post(route('categories.store'))"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>