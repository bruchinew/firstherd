<template>
    <div
        class="mx-80 sticky mt-8 top-5 p-3 z-50 bg-white shadow-md flex justify-center"
    >
        <a
            :href="route('quotes.index')"
            :class="{
                'bg-white': isActiveTab('quotes.index'),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quotes.index')"
            class="tab before:bg-gradient-to-r before:from-blue-900 before:to-blue-500 px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-0"
        >
            <span class="relative z-10">Your Details</span>
        </a>
        <a
            :href="route('quote.show', quoteId)"
            :class="{
                'bg-white ': isActiveTab('quote.show', quoteId),
                disabled: isDisabled('quote.show', quoteId),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.show')"
            class="tab before:bg-gradient-to-r before:from-blue-500 before:to-blue-100 px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-400"
        >
            <span class="relative z-10">Your Quote</span>
        </a>
        <a
            :href="route('quote.payment', quoteId)"
            :class="{
                'bg-white': isActiveTab('quote.payment', quoteId),
                disabled: isDisabled('quote.payment', quoteId),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.payment', quoteId)"
            class="tab before:bg-gradient-to-r before:from-blue-100 before:to-yellow-300 px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-800"
        >
            <span class="relative z-10">Payment</span>
        </a>
        <a
            :href="route('quote.summary', quoteId)"
            :class="{
                'bg-white': isActiveTab('quote.summary', quoteId),
                disabled: isDisabled('quote.summary', quoteId),
                'animate-bg': animateBg,
            }"
            :disabled="isDisabled('quote.summary', quoteId)"
            class="tab before:bg-gradient-to-r before:from-yellow-300 before:to-yellow-700 px-4 py-2 text-2xl before:translate-x-0 before:ease-in-out before:duration-500 before:delay-1200"
        >
            <span class="relative z-10">Summary</span>
        </a>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
defineProps({
    quoteId: {
        type: Number,
        required: false,
    },
});

const animateBg = ref(false);

const routePatterns = {
    "quotes.index": /^\/halperninsurance\/quotes$/,
    "quote.show": /^\/halperninsurance\/quote\/\d+$/,
    "quote.payment": /^\/halperninsurance\/quote\/\d+\/payment$/,
    "quote.summary": /^\/halperninsurance\/quote\/\d+\/summary$/,
};

const tabOrder = [
    "quotes.index",
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
    margin-right: -1px; /* Remove space between tabs */
}

.tab::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
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
