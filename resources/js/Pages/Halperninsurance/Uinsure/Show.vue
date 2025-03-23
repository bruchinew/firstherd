<template>
    <AppHeader />
    <div class="container mx-auto p-8 relative">
        <h1 class="text-center font-bold text-2xl mb-4">Policy Details</h1>
        <div class="bg-white shadow-md rounded p-6">
            <h2 class="font-bold text-xl mb-2">
                Below is your home insurance policy
            </h2>

            <div class="border bg-mustard rounded-xl p-5 fixed top-6 right-0">
                <div class="text-xl font-bold mb-5">
                    Quote Reference: {{ policy.quote_reference }}
                </div>
                <div class="flex">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0-8 0M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"
                        />
                    </svg>
                    <p class="text-center mb-4">
                        {{ policyData.Client1.Title }}
                        {{ policyData.Client1.Forenames }}
                        {{ policyData.Client1.Surname }}
                        - {{ formatDate(policyData.Client1.DateOfBirth) }}
                    </p>
                </div>

                <p class="flex items-center mb-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                    >
                        <path
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"
                        />
                    </svg>
                    {{ policyData.Client1.TelephoneNumber }}
                </p>

                <p class="flex items-center space-x-3 mb-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                    >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        >
                            <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0-6 0" />
                            <path
                                d="M17.657 16.657L13.414 20.9a2 2 0 0 1-2.827 0l-4.244-4.243a8 8 0 1 1 11.314 0"
                            />
                        </g>
                    </svg>
                    {{ policyData.RiskAddress.AddressLine1 }}
                </p>

                <p class="flex items-center space-x-3 mb-4">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                    >
                        <g
                            fill="none"
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        >
                            <path
                                d="M5 12H3l9-9l9 9h-2M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-7"
                            />
                            <path
                                d="M9 21v-6a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v6"
                            />
                        </g>
                    </svg>
                    {{ policyData.NumberOfBedrooms }} bedrooms,{{
                        policyData.PropertyType
                    }},
                    {{ policyData.YearBuilt }}
                </p>

                <div class="justify-end flex space-x-3">
                    <button class="border rounded-xl p-2">
                        Save For Later
                    </button>
                    <a
                        :href="
                            route('uinsure-quote.get-eligibility', {
                                quote: policy.quote_reference,
                                selectedPremiumId: selectedPremiumId,
                            })
                        "
                    >
                        <button class="border rounded-xl p-2 bg-white">
                            Continue
                            {{ selectedPremiumId }}
                        </button>
                    </a>
                </div>
            </div>
            <p>
                <strong>Building Excess:</strong
                >{{ policyData.BuildingsExcess }}
            </p>
            <p>
                <strong>Includes contents:</strong
                >{{ policyData.IncludesContents }}
            </p>
            <p>
                <strong>is a first time buyer:</strong
                >{{ policyData.IsFirstTimeBuyer }}
            </p>
            <p>
                <strong>Number of bedrooms:</strong>
                {{ policyData.NumberOfBedrooms }}
            </p>
            <NumberField v-model="policyData.BuildingsExcess" />
            <NumberField v-model="policyData.BuildingsExcess" />
            <FormKit
                v-model="policyData.IncludesContentsAccidentalCover"
                type="checkbox"
                label="Includes Contents Accidental Cover"
            />
            {{ policyData }}
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Provider</th>
                        <th class="px-4 py-2">Monthly Insurance Premium</th>
                        <th class="px-4 py-2">Annual Insurance Premium</th>
                        <th class="px-4 py-2">Total Monthly Premium</th>
                        <th class="px-4 py-2">Total Annual Premium</th>
                        <th class="px-4 py-2">
                            Requires Additional Eligibility
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="item in policyData.PremiumListItems"
                        :key="item.PremiumId"
                        @click="selectedPremiumId = item.PremiumId"
                    >
                        <td
                            class="border px-4 py-2"
                            v-if="item.CommissionRate == 27.5"
                        >
                            {{ item.Provider }}
                        </td>
                        <td
                            class="border px-4 py-2"
                            v-if="
                                item.MonthlyInsurancePremium > 0 &&
                                item.CommissionRate == 27.5
                            "
                        >
                            {{ item.MonthlyInsurancePremium }}
                        </td>
                        <td
                            class="border px-4 py-2"
                            v-if="
                                item.AnnualInsurancePremium > 0 &&
                                item.CommissionRate == 27.5
                            "
                        >
                            {{ item.AnnualInsurancePremium }}
                        </td>
                        <td
                            class="border px-4 py-2"
                            v-if="
                                item.TotalMonthlyPremium > 0 &&
                                item.CommissionRate == 27.5
                            "
                        >
                            {{ item.TotalMonthlyPremium }}
                        </td>
                        <td
                            class="border px-4 py-2"
                            v-if="
                                item.TotalAnnualPremium > 0 &&
                                item.CommissionRate == 27.5
                            "
                        >
                            {{ item.TotalAnnualPremium }}
                        </td>
                        <td
                            class="border px-4 py-2"
                            v-if="
                                item.RequiresAdditionalEligibility > 0 &&
                                item.CommissionRate == 27.5
                            "
                        >
                            {{ item.RequiresAdditionalEligibility }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script setup lang="ts">
import AppHeader from "@/Components/UI/AppHeader.vue";
import { defineProps } from "vue";
import NumberField from "@/Components/NumberField.vue";
import { ref } from "vue";

const props = defineProps({
    policy: {
        type: Object,
        required: true,
    },
});
const selectedPremiumId = ref(0);
const policyData = JSON.parse(props.policy.policy_data);
const formatDate = (dateString: string) => {
    const timestamp = parseInt(
        dateString.replace(/\/Date\((\d+)-\d+\)\//, "$1")
    );
    const date = new Date(timestamp);
    return date.toLocaleDateString();
};
</script>

<style scoped>
.container {
    max-width: 800px;
}
</style>
