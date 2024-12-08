<template>
    <AppHeader></AppHeader>
    <div class="p-4 text-center">
        <h1 class="text-3xl">Get a Quote</h1>
        <p>Please answer everything accurately before continuing.</p>
        <FormKit
            type="form"
            id="registration-example"
            :form-class="submitted ? 'hide' : 'show'"
            submit-label="Register"
            :actions="false"
        >
            <FormKit
                type="text"
                name="Address"
                label="Your Address"
                placeholder="8 Glaserton Road, London"
                help="Where do you live?"
                validation="required"
            />
            <FormKit
                type="text"
                name="Postcode"
                label="Your Postcode"
                validation="required|postcode"
            />
            <div class="double">
                <FormKit
                    type="radio"
                    name="owner"
                    label="Do you own this home?"
                    validation="required|length:6|matches:/[^a-zA-Z]/"
                />
                <FormKit
                    type="select"
                    name="Your coverage"
                    label="Your coverage"
                    :options="['buildings', 'contents', 'bulding and contents']"
                />
                <FormKit
                    type="date"
                    label="Cover Start Date"
                    name="cover_start_date"
                    validation="required"
                />

                <FormKit
                    type="select"
                    name="Prperty type"
                    label="Property type"
                    validation="required"
                    :options="['Detached', 'Semi-detached', 'Terraced', 'Flat']"
                />
                <FormKit
                    name="number_of_bedrooms"
                    label="Number of bedrooms"
                    validation="required"
                    type="number"
                />
                <FormKit
                    name="number_of_bathrooms"
                    label="Number of bathrooms"
                    validation="required"
                    type="number"
                />
                <FormKit
                    name="number_of_rooms"
                    label="Number of rooms"
                    validation="required"
                    type="number"
                />
                <FormKit
                    name="build_date"
                    label="Build date"
                    validation="required"
                    type="date"
                />
            </div>

            <FormKit type="submit" label="Register" />
        </FormKit>
        <div v-if="submitted">
            <h2 class="text-xl text-green-500">Submission successful!</h2>
        </div>
    </div>
</template>

<script setup>
import AppHeader from "@/Components/UI/AppHeader.vue";
import { ref } from "vue";

const submitted = ref(false);

const form = ref({
    name: "",
    email: "",
    phone: "",
    coverage: 0,
});

function submitForm() {
    console.log(form);
}
</script>

<style scoped>
/* Add your styles here */
</style>
