<template>
    <div class="mx-16 sticky flex justify-between top-5 p-3 z-50 blur-none">
        <a
            :href="route('quote.index')"
            :class="{ 'bg-mustard': isActiveTab('Your Details') }"
            >Your Details</a
        >
        <a
            :href="route('quote.index')"
            :class="{ 'bg-mustard': isActiveTab('Your Quote') }"
            >Your Quote</a
        >
        <a
            :href="route('quote.index')"
            :class="{ 'bg-mustard': isActiveTab('Summary') }"
            >Summary</a
        >
        <a
            :href="route('quote.index')"
            :class="{ 'bg-mustard': isActiveTab('Payment') }"
            >Payment</a
        >
        <button @click="activeTab()">kl</button>
    </div>
</template>

<script setup>
import { ref, inject } from "vue";

function activeTab() {
    const fullRoute = window.location.pathname;
    console.log(fullRoute);
}
const isActiveTab = (tabName) => {
    return activeTab.value === tabName;
};
</script>

<style scoped>
.bg-mustard {
    background-color: #ffd700; /* Replace with your mustard color */
}
</style>
