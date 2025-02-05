<template>
    <div class="p-5">
        <table>
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Visitor ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Property Value</th>
                    <th>Coverage Amount</th>
                    <th>Property Type</th>
                    <th>Number of Claims</th>
                    <th>Build Year</th>
                    <th>Location</th>
                    <th>Quote Date</th>
                    <th>Quote Amount</th>
                    <th>Status</th>
                    <th>Coverage Factor</th>
                    <th>Location Factor</th>
                    <th>Claims Factor</th>
                    <th>Age Factor</th>
                    <th>Quote Price ID</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(quote, index) in quotes" :key="index">
                    <td>{{ index }}</td>
                    <td>{{ quote.visitor?.name }}</td>
                    <td>{{ quote.name }}</td>
                    <td>{{ quote.email }}</td>
                    <td>{{ quote.phone }}</td>
                    <td>{{ quote.address }}</td>
                    <td>{{ quote.property_value }}</td>
                    <td>{{ quote.coverage_amount }}</td>
                    <td>{{ quote.property_type }}</td>
                    <td>{{ quote.number_of_claims }}</td>
                    <td>{{ quote.build_year }}</td>
                    <td>{{ quote.location }}</td>
                    <td>{{ quote.quote_date }}</td>
                    <td>{{ quote.quote_amount }}</td>
                    <td>{{ quote.status }}</td>
                    <td>{{ quote.coverage_factor }}</td>
                    <td>{{ quote.location_factor }}</td>
                    <td>{{ quote.claims_factor }}</td>
                    <td>{{ quote.age_factor }}</td>
                    <td>{{ quote.quote_price_id }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <button @click="getApiKey()">get API key</button>

    <!-- <form @submit.prevent="authenticate">
        <input v-model="email" type="email" placeholder="Email" required />
        <input
            v-model="password"
            type="password"
            placeholder="Password"
            required
        />
        <button type="submit">Get API Key</button>
    </form>

    <div v-if="apiKey">
        <p>API Key: {{ apiKey }}</p>
    </div>

    <div v-if="error">
        <p>Error: {{ error }}</p>
    </div> -->
</template>

<script setup lang="ts">
import { ref, computed, defineProps } from "vue";

const props = defineProps<{
    quotes: App.Data.QuoteData;
}>();

const currentPage = ref(1);
const perPage = ref(5);

const setPage = (page: number) => {
    currentPage.value = page;
};

// import axios from "axios";

// // Reactive state variables
// // Broker email and password (Base64 encoded)
const email = "mneufeld@halperninsurance.co.uk"; // Your broker email
const password = "mn261171"; // Your broker password
// const apiKey = ref(null);
// const error = ref(null);

// // Authenticate method to make the request
// const authenticate = async () => {
//     try {
//         // Send POST request to backend with email and password
//         const response = await axios.post("http://localhost/api/auth", {
//             email: email,
//             password: password,
//         });

//         // Store the API key in the state
//         apiKey.value = response.data.apiKey;
//         error.value = null; // Clear any previous errors
//     } catch (err) {
//         // Handle errors and display message
//         error.value = err.response?.data?.error || "An error occurred";
//         apiKey.value = null;
//     }
// };

// Make the POST request to generate the API key
const getApiKey = () => {
    fetch("http://localhost:3000/api/auth", {
        method: "POST",
        headers: {
            Accept: "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            EmailAddress: email,
            Password: password,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.apiKey) {
                // Successfully received API key
                const apiKey = data.apiKey;
                console.log("Received API Key:", apiKey);

                // Store the API Key securely (e.g., in a server environment or encrypted storage)
                // You should store this API key to use for subsequent requests
            } else {
                console.error("Error: Unable to retrieve API key.");
            }
        })
        .catch((error) => {
            console.error("Request failed", error);
        });
};
</script>

<style scoped>
table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}
</style>
