<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <div>
        <button v-if="$page.props.user.permissions.includes('create roles')">Create new Roles</button>
        <button v-if="$page.props.user.permissions.includes('create lessons')">Create new Lessons</button>        
    </div>
</template>
<style>
    button {
        background-color: green;
        color: white;
        padding: 22px;
        margin: 5px;
    }
</style>