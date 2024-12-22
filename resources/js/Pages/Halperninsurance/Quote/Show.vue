<template>
    <AppHeader></AppHeader>
    <QuotesHeader></QuotesHeader>
    <div>
        <h1>Quote Details</h1>
        <p><strong>Quote ID:</strong> {{ quote.quote_id }}</p>
        <p><strong>Name:</strong> {{ quote.name }}</p>
        <p><strong>Email:</strong> {{ quote.email }}</p>
        <p><strong>Phone:</strong> {{ quote.phone }}</p>
        <p><strong>Address:</strong> {{ quote.address }}</p>
        <p><strong>Property Value:</strong> {{ quote.property_value }}</p>
        <p><strong>Coverage Amount:</strong> {{ quote.coverage_amount }}</p>
        <p><strong>Property Type:</strong> {{ quote.property_type }}</p>
        <p><strong>Number of Claims:</strong> {{ quote.number_of_claims }}</p>
        <p><strong>Build Year:</strong> {{ quote.build_year }}</p>
        <p><strong>Location:</strong> {{ quote.location }}</p>
        <p><strong>Quote Date:</strong> {{ quote.quote_date }}</p>
        <p><strong>Quote Amount:</strong> {{ quote.quote_amount }}</p>
        <p><strong>Status:</strong> {{ quote.status }}</p>
        <p>
            <strong>{{ final }}</strong>
        </p>
        <a
            :href="
                route('quote.payment', { final: final, quote: quote.quote_id })
            "
        >
            <button>Confirm</button>
        </a>
    </div>
</template>

<script setup>
import QuotesHeader from "@/Components/QuotesHeader.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
import { defineProps } from "vue";

const props = defineProps({
    quote: Object,
    final: Number,
});
</script>
<style scoped>
/* Add your styles here */
</style>
