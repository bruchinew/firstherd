<template>
    <div
        class="mx-80 sticky mt-8 top-5 p-3 z-50 bg-white shadow-md rounded-lg flex justify-center"
    >
        <a
            :href="route('quote.index')"
            :class="{
                'transition ease-in-out delay-150 text-white':
                    isActiveTab('quote.index'),
                'text-gray-600 ': !isActiveTab('quote.index'),
                disabled: isDisabled('quote.index'),
            }"
            :disabled="isDisabled('quote.index')"
            class="px-4 bg-mustard py-2 text-2xl transition duration-300 ease-in-out hover:bg-mustard hover:text-white"
        >
            Your Details
        </a>

        <a
            :href="route('quote.show', '1')"
            :class="{
                'bg-mustard text-white': !isActiveTab('quote.index'),
                'text-gray-600': !isActiveTab('quote.show'),
                disabled: isDisabled('quote.show'),
            }"
            :disabled="isDisabled('quote.show')"
            class="px-4 py-2 text-2xl rounded-lg transition duration-300 ease-in-out hover:bg-mustard hover:text-white"
        >
            Your Quote
        </a>
        <a
            :href="route('quote.payment')"
            :class="{
                'bg-mustard text-white': isActiveTab('quote.payment'),

                'text-gray-600': !isActiveTab('quote.payment'),
                disabled: isDisabled('quote.payment'),
            }"
            :disabled="isDisabled('quote.payment')"
            class="px-4 py-2 text-2xl rounded-lg transition duration-300 ease-in-out hover:bg-mustard hover:text-white"
        >
            Payment
        </a>
        <a
            :href="route('quote.payment')"
            :class="{
                'bg-mustard text-white': isActiveTab('quote.payment'),
                'text-gray-600': !isActiveTab('quote.payment'),
                disabled: isDisabled('quote.payment'),
            }"
            :disabled="isDisabled('quote.payment')"
            class="px-4 py-2 text-2xl rounded-lg transition duration-300 ease-in-out hover:bg-mustard hover:text-white"
        >
            Summary
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

const tabOrder = ["quote.index", "quote.show", "quote.payment"];

const isActiveTab = (routeName) => {
    const currentPath = window.location.pathname;
    const pattern = routePatterns[routeName];
    return pattern.test(currentPath);
};

const isDisabled = (routeName) => {
    const currentPath = window.location.pathname;
    const currentTabIndex = tabOrder.findIndex((route) =>
        routePatterns[route].test(currentPath)
    );
    const tabIndex = tabOrder.indexOf(routeName);
    return tabIndex > currentTabIndex;
};
</script>

<style scoped>
.bg-mustard {
    background-color: #ffd700; /* Replace with your mustard color */
}

.disabled {
    pointer-events: none;
    opacity: 0.5;
}
</style>
