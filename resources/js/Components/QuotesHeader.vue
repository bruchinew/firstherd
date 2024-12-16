<template>
    <div
        class="mx-80 sticky mt-8 top-5 p-3 z-50 bg-white shadow-md flex justify-center"
    >
        <a
            :href="route('quote.index')"
            :class="{
                'bg-white': isActiveTab('quote.index'),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.index')"
            class="tab px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-0"
        >
            <span class="relative z-10">Your Details</span>
        </a>
        <a
            :href="route('quote.show', '1')"
            :class="{
                'bg-white ': isActiveTab('quote.show'),
                disabled: isDisabled('quote.show'),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.show')"
            class="tab px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-500"
        >
            <span class="relative z-10">Your Quote</span>
        </a>
        <a
            :href="route('quote.payment')"
            :class="{
                'bg-white': isActiveTab('quote.payment'),
                disabled: isDisabled('quote.payment'),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.payment')"
            class="tab px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-1000"
        >
            <span class="relative z-10">Payment</span>
        </a>
        <a
            :href="route('quote.summary')"
            :class="{
                'bg-white': isActiveTab('quote.summary'),
                disabled: isDisabled('quote.summary'),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.summary')"
            class="tab px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-1500"
        >
            <span class="relative z-10">Summary</span>
        </a>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";

const animateBg = ref(false);

const routePatterns = {
    "quote.index": /^\/halperninsurance\/quote$/,
    "quote.show": /^\/halperninsurance\/quote\/\d+$/,
    "quote.payment": /^\/halperninsurance\/quote\/payment$/,
    "quote.summary": /^\/halperninsurance\/quote\/summary$/,
};

const tabOrder = [
    "quote.index",
    "quote.show",
    "quote.payment",
    "quote.summary",
];

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

onMounted(() => {
    setTimeout(() => {
        animateBg.value = true;
    }, 100); // Delay to ensure the component is fully mounted before starting the animation
});
</script>

<style scoped>
.tab {
    position: relative;
    overflow: hidden;
    color: #4a5568; /* text-gray-600 */
}

.tab::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background-color: #ffd700; /* Replace with your mustard color */
    /* transition: left 0.5s ease-in-out; */
}

.tab.active::before,
.tab.animate-bg::before {
    left: 0;
}

.tab.active {
    color: white;
}

.tab:hover::before {
    left: 0;
}

.disabled::before {
    pointer-events: none;
    opacity: 0;
}
.disabled span {
    color: #4a5568;
}
</style>
