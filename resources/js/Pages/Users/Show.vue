<template>
    <div>
        <h1>User Details</h1>
        <p><strong>Name:</strong> {{ user.name }}</p>
        <p><strong>Email:</strong> {{ user.email }}</p>
        <p><strong>Created At:</strong> {{ user.created_at }}</p>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";

const props = defineProps<{
    user: App.Data.UserData;
}>();
</script>

<style scoped>
/* Add some basic styles */
div {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    max-width: 600px;
    margin: 20px auto;
}
h1 {
    margin-bottom: 20px;
}
p {
    margin: 10px 0;
}
</style>
