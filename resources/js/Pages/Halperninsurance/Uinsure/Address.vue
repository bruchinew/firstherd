<template>
    <AppHeader></AppHeader>

    <div class="container mx-auto p-8 bg-gray-100">
        <h1 class="text-center font-bold text-2xl my-3">
            Fill in details for policy
        </h1>
        <FormKit type="form" submit-label="Save" @submit="submitPolicy">
            <div class="grid grid-cols-2 space-x-6">
                <div>
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
                <div>
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

            <button type="submit">Submit Policy</button>
        </FormKit>
    </div>
</template>

<script setup lang="ts">
import { defineProps } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import AppHeader from "@/Components/UI/AppHeader.vue";

const props = defineProps({
    client1: Object,
    client2: Object,
});

const submitPolicy = (formData) => {
    const policyData = useForm({
        Client1: props.client1,
        Client2: props.client2,
        CorrespondenceAddress: {
            AddressLine1: formData.correspondenceAddressLine1,
            AddressLine2: formData.correspondenceAddressLine2,
            AddressLine3: formData.correspondenceAddressLine3,
            AddressLine4: formData.correspondenceAddressLine4,
            Postcode: formData.correspondencePostcode,
            UDPRN: formData.correspondenceUDPRN,
        },
        RiskAddress: {
            AddressLine1: formData.riskAddressLine1,
            AddressLine2: formData.riskAddressLine2,
            AddressLine3: formData.riskAddressLine3,
            AddressLine4: formData.riskAddressLine4,
            Postcode: formData.riskPostcode,
            UDPRN: formData.riskUDPRN,
        },
        PropertyType: formData.propertyType,
        NumberOfBedrooms: formData.numberOfBedrooms,
        YearBuiltRange: formData.yearBuiltRange,
    });
    console.log(policyData);
    policyData.post(route("uinsure-quote.create"));
};
</script>
