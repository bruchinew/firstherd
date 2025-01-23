<template>
    <AppHeader></AppHeader>
    <QuotesHeader :quote-id="quote.id"></QuotesHeader>

    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg mt-6">
        <h1 class="text-3xl font-bold mb-4 text-center">
            Thank you for your Quote
        </h1>
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
                <p><strong>Quote Amount:</strong> {{ quote.quote_amount }}</p>
                <p><strong>Status:</strong> {{ quote.status }}</p>
            </div>
        </div>
        <div class="mt-6 text-center">
            <button class="border-black border rounded-xl p-2">
                <a :href="route('halperninsurance.index')" class="text-black"
                    >Back to home</a
                >
            </button>
        </div>
    </div>
</template>

<script setup>
import QuotesHeader from "@/Components/QuotesHeader.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
const props = defineProps({
    quote: Object,
    final: Number,
});
</script>

<style scoped>
.container {
    max-width: 800px;
}
</style>
