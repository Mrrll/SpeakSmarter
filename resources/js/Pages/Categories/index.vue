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
              <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
                <thead class="ltr:text-left rtl:text-right">
                  <tr>
                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Name</th>
                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Date</th>
                    <th class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">Options</th>
                  </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                  <tr v-for="category in categories.data" :key="category.id">
                    <td class="px-4 py-2 font-medium text-center text-gray-900 whitespace-nowrap">{{ category.name }}
                    </td>
                    <td class="px-4 py-2 text-center text-gray-700 whitespace-nowrap">{{ category.created_at }}</td>
                    <td class="flex justify-center px-4 py-2 text-center text-gray-700 whitespace-nowrap">
                      <Link :href="route('categories.edit', category.id)"
                        v-if="$page.props.user.permissions.includes('update categories')">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#ffe16d" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                      </svg>
                      </Link>
                      <Link @click="deleteCategory(category.id)"
                        v-if="$page.props.user.permissions.includes('delete categories')">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#fe3239" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                          d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                      </svg>
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="px-4 py-2 bg-white border-t border-gray-200 divide-y-2 divide-gray-200 rounded-b-lg">
              <div class="mt-4 space-x-2" v-if="categories.links">
                <Pagination :data="categories" />                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>