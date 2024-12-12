<template>
    <AppHeader></AppHeader>
    <QuotesHeader></QuotesHeader>

    <div>
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
                            type="date"
                            name="build_year"
                            label="Build Year"
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
                    <div class="mt-4 flex justify-end">
                        <button
                            type="button"
                            @click="submit"
                            :disabled="!isFormComplete"
                        >
                            submit
                        </button>
                    </div>
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

const submitted = ref(false);
const nextTab = ref(false);

const handleSubmit = () => {
    submitted.value = true;
};
const FormFilled = () => {
    return true;
};

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
            console.log(submitted.value);
            nextTab.value = true;
            console.log("Form submitted successfully");
            console.log(nextTab.value);
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
