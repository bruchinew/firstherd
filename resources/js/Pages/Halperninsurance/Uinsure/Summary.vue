<template>
    <h1>Summary</h1>
    <pre>{{ quote }}</pre>
</template>

<script lang="ts">
import { defineProps } from "vue";

const props = defineProps({
    quote: {
        type: Object,
        required: true,
    },
});

console.log(props.quote);
</script>
