<script>
export default {
    name: "CategoriesForm"
}
</script>

<script setup>
import FormSection from '@/Components/FormSection.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import TextInput from '@/Components/TextInput.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'

defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false      
    }
})
defineEmits(['submit'])
</script>

<template>
    <FormSection @submitted="$emit('submit')">
        <template #title>
            {{ updating ? 'Update category' : 'Create new category' }}    
        </template>
        <template #description>
            {{ updating ? 'Update the selected category' : 'Create a new category from scratch' }}         
        </template>
        <template #form>
            <div class="col-span-6 sm:col-span-6">
                <InputLabel form="name" value="Name" />
                <TextInput id="name" v-model="form.name" type="text" autocomplete="name" class="block w-full mt-1" />
                <InputError :message="$page.props.errors.name" class="mt-2" />
            </div>          
        </template>
        <template #actions>
            <PrimaryButton>
                {{ updating ? 'Update' : 'Create' }}
            </PrimaryButton>  
        </template>
    </FormSection>
</template>