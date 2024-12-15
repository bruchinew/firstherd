<template>
    <div class="mx-16 sticky flex justify-between top-5 p-3 z-50 blur-none">
        <a
            :href="route('quote.index')"
            :class="{ 'bg-mustard': isActiveTab('quote.index') }"
        >
            Your Details
        </a>
        <a
            :href="route('quote.show', '1')"
            :class="{ 'bg-mustard': isActiveTab('quote.show') }"
        >
            Your Quote
        </a>
        <a
            :href="route('quote.payment')"
            :class="{ 'bg-mustard': isActiveTab('quote.payment') }"
        >
            Payment
        </a>
    </div>
</template>

<script setup>
import { usePage } from "@inertiajs/inertia-vue3";

const page = usePage();

const routePatterns = {
    "quote.index": /^\/halperninsurance\/quote$/,
    "quote.show": /^\/halperninsurance\/quote\/\d+$/,
    "quote.payment": /^\/halperninsurance\/quote\/payment$/,
};

const isActiveTab = (routeName) => {
    const currentPath = window.location.pathname;
    const pattern = routePatterns[routeName];
    console.log(pattern.test(currentPath));
    return pattern.test(currentPath);
};
</script>

<style scoped>
.bg-mustard {
    background-color: #ffd700; /* Replace with your mustard color */
}
</style>
