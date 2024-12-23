<template>
    <AppHeader></AppHeader>
    <QuotesHeader :quote-id="quoteId"></QuotesHeader>

    <div class="p-5">
        <h1 class="text-xl">Get a Quote</h1>
        <p>Please answer everything accurately before continuing.</p>
        <div class="double">
            <FormKit
                type="form"
                id="registration-example"
                :form-class="submitted ? 'hide' : 'show'"
                submit-label="Register"
                :actions="false"
                @submit="handleSubmit"
            >
                <h1>Personal Details</h1>
                <div class="p-4 m-6 border border-black bg-gray-200 rounded-xl">
                    <div class="justify-between grid grid-cols-3">
                        <FormKit
                            v-model="form.name"
                            type="text"
                            name="name"
                            label="Your name"
                        />
                        <FormKit
                            v-model="form.email"
                            type="email"
                            name="email"
                            label="Your email"
                        />
                        <FormKit
                            v-model="form.phone"
                            type="number"
                            name="phone"
                            label="Your phone number"
                        />
                    </div>
                </div>
                <h1>You Address and choice of cover</h1>
                <div class="p-2 m-6 border border-black bg-gray-200 rounded-xl">
                    <div class="justify-between grid grid-cols-3">
                        <FormKit
                            v-model="form.address"
                            type="text"
                            name="Address"
                            label="Your Address"
                            placeholder="8 Glaserton Road, London"
                        />
                        <FormKit
                            v-model="form.property_value"
                            type="number"
                            name="property_value"
                            label="Your property_value"
                        />
                        <FormKit
                            v-model="form.coverage_amount"
                            type="number"
                            name="coverage_amount"
                            label="Coverage Amount"
                        />
                    </div>
                    <div class="grid grid-cols-3">
                        <FormKit
                            v-model="form.property_type"
                            type="select"
                            name="property_type"
                            label="Property Type"
                            :options="[
                                'detached',
                                'semi-detached',
                                'apartment',
                                'bungalow',
                            ]"
                        />
                        <FormKit
                            v-model="form.number_of_claims"
                            type="number"
                            name="number_of_claims"
                            label="Number of claims"
                        />
                        <FormKit
                            v-model="form.build_year"
                            type="select"
                            name="build_year"
                            label="Build Year"
                            placeholder="please select..."
                            :options="BuildYearOptions"
                        />
                    </div>
                </div>
                <div class="p-4 m-6 border border-black bg-gray-200 rounded-xl">
                    <div class="justify-between grid grid-cols-3">
                        <FormKit
                            v-model="form.location"
                            type="text"
                            name="location"
                            label="Location"
                        />
                        <FormKit
                            v-model="form.quote_date"
                            type="date"
                            name="quote_date"
                            label="Quote Date"
                        />
                        <FormKit
                            v-model="form.quote_amount"
                            type="number"
                            name="quote_amount"
                            label="Quote Amount"
                        />
                    </div>
                </div>
                <div class="mt-4 mr-6 flex justify-end">
                    <button
                        type="button"
                        @click="submit"
                        :disabled="!isFormComplete"
                        class="disabled:opacity-50 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl"
                    >
                        submit
                    </button>
                </div>
            </FormKit>
            <div v-if="submitted">
                <h2 class="text-xl text-green-500">Submission successful!</h2>
            </div>
        </div>
    </div>
</template>

<script setup>
import Tab from "@/Components/Tab.vue";
import Tabs from "@/Components/Tabs.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
import { ref, inject, computed } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import QuotesHeader from "@/Components/QuotesHeader.vue";

const quoteId = ref(1);
const submitted = ref(false);
const nextTab = ref(false);

const handleSubmit = () => {
    submitted.value = true;
};
const FormFilled = () => {
    return true;
};
const BuildYearOptions = [1000, 1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800];

const form = useForm({
    name: "",
    email: "",
    phone: "",
    address: "",
    property_value: "",
    coverage_amount: "",
    property_type: "",
    number_of_claims: "",
    build_year: "",
    location: "",
    quote_date: "",
    quote_amount: "",
});

const isFormComplete = computed(() => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(form.email);
});

const submit = () => {
    console.log("Submitting form...");
    form.post(route("quote.store", form), {
        onSuccess: () => {
            console.log("Form submitted successfully");
        },
        onError: () => {
            console.log("Form submission failed");
        },
    });
};
</script>

<style scoped>
.hide {
    display: none;
}
.show {
    display: block;
}
</style>
