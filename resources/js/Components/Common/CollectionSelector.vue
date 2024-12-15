<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import IconTrash from '@/Components/Icons/Trash.vue';

defineProps({
    collections: {
        type: Array,
        required: true
    }
})
const selection = ref([])
const currentSelection = ref([])
const emit = defineEmits(['onCategories'])
const handleAddToSelection = () => {
    let alreadyExist = false
    selection.value.forEach(item => {
        if (item.id == currentSelection.value.id) {
            alreadyExist = true
            return
        }
    })
    if (alreadyExist) {
        return
    }
    selection.value.push(currentSelection.value)
    emit('onCategories', selection.value)
}
const handleRemoveSelection = (index) => {
    selection.value = selection.value.filter(item => item.id !== index)
    emit('onCategories', selection.value)
}

</script>

<template>
    <div class="w-full">
        <div class="flex">
            <select v-model="currentSelection"
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                <option v-for="(item, index) in collections" :key="index" :value="item">
                    {{ item?.name }}
                </option>
            </select>
            <button
                class="px-6 py-2 ml-1 font-bold text-white bg-blue-700 border border-blue-800 rounded-md hover:bg-blue-800 text-md"
                @click="handleAddToSelection">Add</button>
        </div>
        <div>
            <ul>
                <li v-for="(item, index) in selection" :key="index" @click="handleRemoveSelection(item.id)"
                    class="px-6 py-2 mt-1 mb-1 ml-1 font-bold text-white bg-blue-700 border border-blue-800 rounded-md cursor-pointer hover:bg-blue-800 text-md">
                    {{ item.name }}
                    <span class="float-right cursor-pointer">X</span>
                </li>
            </ul>
        </div>
    </div>
</template>