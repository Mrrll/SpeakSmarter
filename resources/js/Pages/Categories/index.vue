<script>
export default {
  name: "CategoriesIndex"
}
</script>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import { Inertia } from '@inertiajs/inertia';
import Pagination from '@/Components/Pagination.vue';
import Table from '@/Components/Tables/Table.vue';
import CategoriesTbody from '@/Components/Categories/Tbody.vue'

defineProps({
  categories: {
    type: Object,
    required: true
  }
})
const deleteCategory = id => {
  if (confirm('Are you sure?')) {
    Inertia.delete(route('categories.destroy', id))
  }
}
const goToPage = url => {
  router.get(url, {}, { preserveScroll: true });
}
</script>

<template>
  <AppLayout title="Categories">
    <template #header>
      <h1 class="text-xl font-semibold leading-tight text-gray-800">Categories</h1>
    </template>
    <div class="py-12">
      <div class="mx-auto max-m-7xl sm:px-6 lg:px-8">
        <div class="p-6 bg-white border border-gray-200"
          v-if="$page.props.user.permissions.includes('create categories')">
          <div class="flex justify-between">
            <Link
              class="px-6 py-2 font-bold text-white bg-blue-700 border border-blue-800 rounded-md hover:bg-blue-800 text-md"
              :href="route('categories.create')">
            CREATE CATEGORY
            </Link>
          </div>
        </div>
        <div class="mt-4">
          <div class="border border-gray-200 rounded-lg">
            <div class="overflow-x-auto rounded-t-lg">
              <Table :Theaders="['Name', 'Date']" :Options="{ edit: true, delete: true }">
                <CategoriesTbody :categories="categories" :Options="{ edit: true, delete: true }" />
              </Table>
            </div>

            <div class="px-4 py-2 bg-white border-t border-gray-200 divide-y-2 divide-gray-200 rounded-b-lg">
              <div class="mt-4 space-x-2" v-if="categories.has_more_pages">
                <Pagination :data="categories" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>