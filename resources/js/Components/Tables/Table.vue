<template>    
    <table class="min-w-full text-sm bg-white divide-y-2 divide-gray-200">
        <thead v-if="$slots.Thead" :class="TheaderClass || 'ltr:text-left rtl:text-right'">
            <slot name="Thead"></slot>
        </thead>
        <thead v-else-if="Theaders && Theaders.length > 0" class="ltr:text-left rtl:text-right">
            <tr>
                <th v-for="item in Theaders" :key="item" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">{{
                    item }}
                </th>
                <th v-if="hasAnyOptionTrue" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap">
                    Options
                </th>
            </tr>
        </thead>
        <slot />        
        <tfoot v-if="$slots.Tfooter" :class="TfooterClass || 'divide-y divide-gray-200'">
            <slot name="Tfooter"></slot>
        </tfoot>
    </table>
</template>

<script>
export default {
    name: "Table"
}
</script>

<script setup>
import { computed } from 'vue'

const props = defineProps({
    Options: {        
        type: Object,
        default: () => ({
            show: false,
            edit: false,
            delete: false,
        }),
    },
    Theaders: {
        type: Object,
        default: null
    },
    TheaderClass: {
        type: String,
        default: null
    },
    TfooterClass: {
        type: String,
        default: null
    }
    
})
const hasAnyOptionTrue = computed(() => {
    return Object.values(props.Options).includes(true);
});
</script>

<style>

</style>