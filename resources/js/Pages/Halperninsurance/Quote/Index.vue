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
                <div class="justify-center flex space-x-6">
                    <div>
                        <FormKit
                            v-model="form.Client1.Title"
                            type="radio"
                            name="client1Title"
                            label="Title"
                            :options="[
                                { value: 'Mr', label: 'Mr' },
                                { value: 'Mrs', label: 'Mrs' },
                                { value: 'Miss', label: 'Miss' },
                                { value: 'Ms', label: 'Ms' },
                            ]"
                            validation="required"
                        />
                        <FormKit
                            v-model="form.Client1.Forenames"
                            type="text"
                            name="client1Forenames"
                            label="First names"
                            placeholder="Enter your first names"
                            validation="required"
                        />
                        <FormKit
                            v-model="form.Client1.Surname"
                            type="text"
                            name="client1Surname"
                            label="Last names"
                            placeholder="Enter your last names"
                            validation="required"
                        />
                        <FormKit
                            v-model="form.Client1.DateOfBirth"
                            type="date"
                            name="client1DateOfBirth"
                            label="Date of Birth"
                            validation="required"
                        />

                        <div
                            class="flex justify-end mt-3"
                            v-if="!addSecondClient"
                        >
                            <button
                                type="button"
                                @click="addSecondClient = true"
                                class="text-xs border rounded-xl p-1 border-mustard"
                            >
                                + Client
                            </button>
                        </div>
                        <h1 class="text-lg text-mustard font-bold">
                            How you will be contacted
                        </h1>
                        <FormKit
                            v-model="form.Client1.TelephoneNumber"
                            type="number"
                            name="client1TelephoneNumber"
                            label="Telephone Number"
                            placeholder="07"
                            validation="required"
                        />
                        <FormKit
                            v-model="form.Client1.EmailAddress"
                            type="email"
                            name="client1Email"
                            label="Email"
                            placeholder="example@gmail.com"
                            validation="required|email"
                        />
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                class="bg-mustard my-3 rounded-2xl text-sm p-2 items-center hover:bg-yellow-700"
                            >
                                Continue
                            </button>
                        </div>
                    </div>

                    <div v-if="addSecondClient">
                        <FormKit
                            v-model="form.Client2.Title"
                            type="radio"
                            name="client2Title"
                            label="Title"
                            :options="[
                                { value: 'Mr', label: 'Mr' },
                                { value: 'Mrs', label: 'Mrs' },
                                { value: 'Miss', label: 'Miss' },
                                { value: 'Ms', label: 'Ms' },
                            ]"
                        />

                        <FormKit
                            v-model="form.Client2.Forenames"
                            type="text"
                            name="client2Forenames"
                            label="Client 2 Forenames"
                        />
                        <FormKit
                            v-model="form.Client2.Surname"
                            type="text"
                            name="client2Surname"
                            label="Client 2 Surname"
                        />
                        <FormKit
                            v-model="form.Client2.DateOfBirth"
                            type="date"
                            name="client2DateOfBirth"
                            label="Client 2 Date of Birth"
                        />

                        <div class="flex justify-end" v-if="addSecondClient">
                            <button
                                type="button"
                                @click="addSecondClient = false"
                                class="text-xs border rounded-xl p-1 border-mustard"
                            >
                                - Client
                            </button>
                        </div>
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
import AppHeader from "@/Components/UI/AppHeader.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import QuotesHeader from "@/Components/QuotesHeader.vue";

const quoteId = ref(1);
const submitted = ref(false);
const addSecondClient = ref(false);

const handleSubmit = () => {
    submitted.value = true;

    form.post(route("uinsure-quote.store"), {});
};

const form = useForm({
    Client1: {
        Title: "",
        Forenames: "",
        Surname: "",
        DateOfBirth: "",
        TelephoneNumber: "",
        EmailAddress: "",
    },
    // Client2: {
    //     Title: "",
    //     Forenames: "",
    //     Surname: "",
    //     DateOfBirth: "",
    // },
});
</script>

<style scoped>
.hide {
    display: none;
}
.show {
    display: block;
}
</style>
