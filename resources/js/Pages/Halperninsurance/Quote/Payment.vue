<template>
    <AppHeader></AppHeader>
    <QuotesHeader />
    {{ quote }}
    <div class="payment-form">
        <h2>Complete Your Payment</h2>
        <form @submit.prevent="handleSubmit">
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>
            <div id="card-errors" role="alert" ref="errorElement"></div>
            <button type="submit">Pay Now</button>
        </form>
    </div>
</template>

<script setup>
import QuotesHeader from "@/Components/QuotesHeader.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
import { loadStripe } from "@stripe/stripe-js";
import { ref, onMounted } from "vue";

const props = defineProps({
    quote: Object,
});
// Vue's ref() to hold Stripe elements and error messages
const cardElement = ref(null);
const stripePromise = loadStripe(import.meta.env.VITE_STRIPE_PUBLIC_KEY); // Use the public key from the environment variables
const errorElement = ref(null);

// Create Stripe Elements and mount them when the component is mounted
onMounted(async () => {
    const stripe = await stripePromise;
    const elements = stripe.elements();

    // Create an instance of the card Element and mount it to the DOM
    const card = elements.create("card");
    card.mount("#card-element");
    cardElement.value = card;
});

// Handle form submission and pass minimal values to the backend
const handleSubmit = async () => {
    const stripe = await stripePromise;
    const card = cardElement.value;

    // Create a payment method using Stripe.js
    const { paymentMethod, error } = await stripe.createPaymentMethod({
        type: "card",
        card: card,
    });

    if (error) {
        // Display the error in the 'card-errors' div
        errorElement.value.textContent = error.message;
    } else {
        // Send the payment method ID to your server for processing payment
        await processPayment(paymentMethod.id);
    }
};

// Send the payment method ID to the backend for processing
const processPayment = async (paymentMethodId) => {
    try {
        const response = await fetch(route("quote.storepayment"), {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({
                paymentMethodId: paymentMethodId,
            }),
        });

        if (!response.ok) {
            const errorText = await response.text();
            console.error("Error response from server:", errorText);
            throw new Error("Network response was not ok");
        }

        const data = await response.json();

        if (data.success) {
            window.location.href = route("quote.summary", {
                quote: quote.quote_id,
            });
            alert("Payment successful!");
        } else {
            alert("Payment failed: " + data.error);
        }
    } catch (error) {
        console.error("Error processing payment:", error);
        alert("An error occurred while processing the payment.");
    }
};
</script>

<style scoped>
.payment-form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background: #f4f4f4;
    border-radius: 8px;
    text-align: center;
}

.payment-form input {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.payment-form button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    border: none;
    border-radius: 4px;
    color: white;
    font-size: 16px;
}

#card-errors {
    color: red;
    margin-top: 10px;
}
</style>
