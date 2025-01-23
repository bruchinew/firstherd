<template>
    <AppHeader></AppHeader>
    <QuotesHeader :quote-id="quote.id"></QuotesHeader>
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <h1 class="text-3xl font-bold mb-4">Quote Details</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p><strong>Quote ID:</strong> {{ quote.id }}</p>
                <p><strong>Name:</strong> {{ quote.name }}</p>
                <p><strong>Email:</strong> {{ quote.email }}</p>
                <p><strong>Phone:</strong> {{ quote.phone }}</p>
                <p><strong>Address:</strong> {{ quote.address }}</p>
                <p>
                    <strong>Property Value:</strong> {{ quote.property_value }}
                </p>
                <p>
                    <strong>Coverage Amount:</strong>
                    {{ quote.coverage_amount }}
                </p>
            </div>
            <div>
                <p><strong>Property Type:</strong> {{ quote.property_type }}</p>
                <p>
                    <strong>Number of Claims:</strong>
                    {{ quote.number_of_claims }}
                </p>
                <p><strong>Build Year:</strong> {{ quote.build_year }}</p>
                <p><strong>Location:</strong> {{ quote.location }}</p>
                <p><strong>Quote Date:</strong> {{ quote.quote_date }}</p>
                <p><strong>Status:</strong> {{ quote.status }}</p>
            </div>
        </div>
        <div class="mt-6 text-center">
            <p class="text-xl font-semibold">
                Quote Price: <strong>{{ quote.quote_amount }}</strong>
            </p>
            <a :href="route('quote.payment', { quote: quote.id })">
                <button
                    class="mt-4 px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600"
                >
                    Confirm
                </button>
            </a>
        </div>
    </div>
</template>

<script setup>
import QuotesHeader from "@/Components/QuotesHeader.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
import { defineProps } from "vue";

const props = defineProps({
    quote: Object,
});
</script>

<style scoped>
.container {
    max-width: 800px;
}
</style>
