<template>
    <AppHeader></AppHeader>
    <div class="container mx-auto p-8 bg-gray-100">
        <h1 class="text-center font-bold text-2xl my-3">
            Fill in details for policy
        </h1>
        <FormKit type="form" submit-label="Save" @submit="submitPolicy">
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

                    <div class="flex justify-end mt-3" v-if="!addSecondClient">
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
            <!-- <div class="grid grid-cols-2 space-x-6">
                <div>
                    <GoogleAutocomplete
                        id="correspondenceAddress"
                        @placechanged="getAddressData"
                    />
                    <FormKit
                        type="text"
                        name="correspondenceAddressLine1"
                        label="Correspondence Address Line 1"
                        validation="required"
                    />
                    <FormKit
                        type="text"
                        name="correspondenceAddressLine2"
                        label="Correspondence Address Line 2"
                    />
                    <FormKit
                        type="text"
                        name="correspondenceAddressLine3"
                        label="Correspondence Address Line 3"
                    />
                    <FormKit
                        type="text"
                        name="correspondenceAddressLine4"
                        label="Correspondence Address Line 4"
                    />
                    <FormKit
                        type="text"
                        name="correspondencePostcode"
                        label="Correspondence Postcode"
                        validation="required"
                    />
                    <FormKit
                        type="text"
                        name="correspondenceUDPRN"
                        label="Correspondence UDPRN"
                    />
                </div>
                <div> -->
            <!-- <GoogleAutocomplete
                        id="riskAddress"
                        @placechanged="getAddressData"
                    />
                    <FormKit
                        type="text"
                        name="riskAddressLine1"
                        label="Risk Address Line 1"
                        validation="required"
                    />
                    <FormKit
                        type="text"
                        name="riskAddressLine2"
                        label="Risk Address Line 2"
                    />
                    <FormKit
                        type="text"
                        name="riskAddressLine3"
                        label="Risk Address Line 3"
                    />
                    <FormKit
                        type="text"
                        name="riskAddressLine4"
                        label="Risk Address Line 4"
                    />
                    <FormKit
                        type="text"
                        name="riskPostcode"
                        label="Risk Postcode"
                        validation="required"
                    />
                    <FormKit type="text" name="riskUDPRN" label="Risk UDPRN" />
                </div>
            </div>
            <FormKit
                type="number"
                name="numberOfBedrooms"
                label="Number of Bedrooms"
            />
            <FormKit
                type="select"
                name="propertyType"
                label="Property Type"
                placeholder="Select an option"
                :options="[
                    { value: 'DetachedHouse', label: 'Detached' },
                    { value: 'SemiDetachedHouse', label: 'Semi-Detached' },
                    { value: 'TerracedHouse', label: 'Terraced' },
                    { value: 'DetachedBungalow', label: 'Detached Bungalow' },
                    {
                        value: 'SemiDetachedBungalow',
                        label: 'Semi-Detached Bungalow',
                    },
                    { value: 'PurposeBuiltFlat', label: 'Purpose-Built Flat' },
                    { value: 'TerracedBungalow', label: 'Terraced Bungalow' },
                    { value: 'CoachHouse', label: 'CoachHouse' },
                ]"
            />
            <FormKit type="text" name="yearBuilt" label="Year Built" />
            <FormKit
                type="select"
                name="yearBuiltRange"
                label="Year Built Range"
                placeholder="Select an option"
                :options="[
                    { value: '_Pre1975', label: 'Pre 1975' },
                    { value: '_1750to1869', label: '1750-1869' },
                    { value: '_1870to1899', label: '1870-1899' },
                    { value: '_1900to1919', label: '1900-1919' },
                    { value: '_1920to1945', label: '1920-1945' },
                    { value: '_1946to1959', label: '1946-1959' },
                    { value: '_1960to1979', label: '1960-1979' },
                    { value: '_1980to1989', label: '1980-1989' },
                    { value: '_1990to1999', label: '1990-1999' },
                    { value: '_2000to2009', label: '2000-2009' },
                    { value: '_2010to2019', label: '2010-2019' },
                    { value: '_2020onwards', label: '2020 onwards' },
                ]"
            />
            <FormKit
                type="checkbox"
                name="isFirstTimeBuyer"
                label="Is First Time Buyer"
            />
            <FormKit
                type="checkbox"
                name="includeBuildings"
                label="Include Buildings"
            />
            <FormKit
                type="checkbox"
                name="includeBuildingsAccidentalCover"
                label="Include Buildings Accidental Cover"
            />
            <FormKit
                type="text"
                name="buildingsClaimFreeYears"
                label="Buildings Claim Free Years"
            />
            <FormKit
                type="checkbox"
                name="includeContents"
                label="Include Contents"
            />
            <FormKit
                type="checkbox"
                name="includeContentsPlus"
                label="Include Contents Plus"
            />
            <FormKit
                type="checkbox"
                name="includeContentsAccidentalCover"
                label="Include Contents Accidental Cover"
            />
            <FormKit
                type="checkbox"
                name="includeContentsPersonalPossessions"
                label="Include Contents Personal Possessions"
            />
            <FormKit
                type="number"
                name="contentsPersonalUnspecifiedValue"
                label="Contents Personal Unspecified Value"
            />
            <FormKit
                type="select"
                name="buildingsExcess"
                label="Buildings Excess"
                placeholder="Select an option"
                :options="[
                    { value: 100, label: '£100' },
                    { value: 150, label: '£150' },
                    { value: 200, label: '£200' },
                    { value: 250, label: '£250' },
                    { value: 300, label: '£300' },
                    { value: 350, label: '£350' },
                    { value: 400, label: '£400' },
                    { value: 450, label: '£450' },
                    { value: 500, label: '£500' },
                ]"
            />
            <FormKit
                type="select"
                name="contentsExcess"
                label="Contents Excess"
                placeholder="Select an option"
                :options="[
                    { value: 100, label: '£100' },
                    { value: 150, label: '£150' },
                    { value: 200, label: '£200' },
                    { value: 250, label: '£250' },
                    { value: 300, label: '£300' },
                    { value: 350, label: '£350' },
                    { value: 400, label: '£400' },
                    { value: 450, label: '£450' },
                    { value: 500, label: '£500' },
                ]"
            />
            <FormKit
                type="text"
                name="mortgageProvider"
                label="Mortgage Provider"
            />
            <FormKit
                type="text"
                name="mortgageRollNumber"
                label="Mortgage Roll Number"
            /> -->
        </FormKit>
    </div>
</template>

<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import AppHeader from "@/Components/UI/AppHeader.vue";
import { useRouter } from "vue-router";

const addSecondClient = ref(false);

const form = useForm({
    Client1: {
        Title: "",
        Forenames: "",
        Surname: "",
        DateOfBirth: null,
        TelephoneNumber: null,
        EmailAddress: "",
    },
    Client2: {
        Title: "",
        Forenames: "",
        Surname: "",
        DateOfBirth: "",
    },
});
const router = useRouter();

const submitPolicy = () => {
    console.log(form);
    form.post(route("uinsure-quote.store"));
};
</script>
