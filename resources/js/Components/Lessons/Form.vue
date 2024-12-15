<script>
export default {
    name: "LessonsForm"
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import SecondaryButton from '@/Components/SecondaryButton.vue'
import CollectionSelector  from '@/Components/Common/CollectionSelector.vue';
import { ref } from 'vue'

defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
    },
    categories: {
        type: Object,
        required: true
    },
    levels: {
        type: Object,
        required: true
    }
})
const categoriesSelected = ref([])
const onCategories = (_categories) => {
    categoriesSelected.value = _categories
}
defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update lesson' : 'Create new lesson' }}
        </template>
        <template #description>
            {{ updating ? 'Update the selected lesson' : 'Create a new lesson from scratch' }}
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel form="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
                <InputLabel form="description" value="Description" />
                <TextInput id="description" v-model="form.description" type="text" autocomplete="description"
                    class="block w-full mt-1" />
                <InputError :message="$page.props.errors.description" class="mt-2" />
                <InputLabel form="content_uri" value="Content Uri" />
                <TextInput id="content_uri" v-model="form.content_uri" type="text" autocomplete="content_uri"
                    class="block w-full mt-1" />
                <InputError :message="$page.props.errors.content_uri" class="mt-2" />
                <br>
                <SecondaryButton class="mt-2 mr-2" type="button">
                    Upload File
                </SecondaryButton>
                <InputError :message="$page.props.errors.pdf_uri" class="mt-2" />
                <br>
                <div class="w-full mt-5">
                    <div class="flex">
                        <div class="w-1/2 mr-1">
                            <InputLabel form="level_id" value="Levels" />
                            <select name="level_id" id="level_id"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option v-for="level in levels" :key="level.id" :value="level.id">
                                    {{ level.name }}
                                </option>
                            </select>
                            <InputError :message="$page.props.errors.level_id" class="mt-2" />
                        </div>
                        <div class="w-1/2 ml-1">
                            <InputLabel form="categories" value="Categories" />
                            <CollectionSelector name="categories" id="categories" :collections="categories" @onCategories="onCategories" />                            
                            <InputError :message="$page.props.errors.categories" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>
        </template>
    </FormSection>
</template>