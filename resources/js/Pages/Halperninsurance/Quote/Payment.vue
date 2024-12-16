<template>
    <AppHeader></AppHeader>
    <QuotesHeader />
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

// Vue's ref() to hold Stripe elements and error messages
const cardElement = ref(null);
const stripePromise = loadStripe(
    "pk_test_51QWcRAHpgVn9LJgTvxF5Covjm0WmPBARPM2oe75nVWlIYkX6au1xzhjs9t2HiAknToDSiVyHlPKFy5rIZYvGAyaf00SG5U2KfJ"
); // Replace with your Stripe public key
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

// Handle form submission and token creation
const handleSubmit = async () => {
    const stripe = await stripePromise;
    const card = cardElement.value;

    // Create a token using Stripe.js
    const { token, error } = await stripe.createToken(card);

    if (error) {
        // Display the error in the 'card-errors' div
        errorElement.value.textContent = error.message;
    } else {
        // Send the token to your server for processing payment
        await stripeTokenHandler(token);
    }
};

// Handle the token received and send it to the server
const stripeTokenHandler = async (token) => {
    try {
        // Replace '/charge' with your backend endpoint
        const response = await fetch("/charge", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({ stripeToken: token.id }),
        });

        const data = await response.json();

        if (data.success) {
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
