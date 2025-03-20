<template>
    <AppHeader></AppHeader>
    <div class="container mx-auto p-8">
        <h1 class="text-center font-bold text-2xl mb-4">
            Eligibility Questions
        </h1>
        <div class="bg-white shadow-md rounded p-6">
            <div
                v-for="(question, index) in eligibility.EligibilityQuestions"
                :key="index"
                class="mb-4"
            >
                <h2 class="font-bold text-xl mb-2">
                    Question {{ question.Number }}
                </h2>
                <p class="mb-2">{{ question.Question }}</p>
                <p v-if="question.HelpText" class="text-gray-600 mb-2">
                    {{ question.HelpText }}
                </p>
                <div v-if="index + 1" class="flex space-x-4">
                    <button
                        class="text-black border px-4 py-2 rounded"
                        :class="{
                            'bg-black': agreedQuestions[index],
                            'text-white': agreedQuestions[index],
                        }"
                        @click="agree(index)"
                    >
                        Agree
                    </button>
                    <button
                        class="bg-red-500 text-white px-4 py-2 rounded"
                        @click="disagree(index)"
                    >
                        Disagree
                    </button>
                </div>
            </div>
            <div class="mt-8">
                <h2 class="font-bold text-xl mb-2">
                    Additional Eligibility Question
                </h2>
                <p class="mb-2">
                    {{ eligibility.AdditionalEligibilityQuestion }}
                </p>
                <p class="text-gray-600 mb-2">
                    {{ eligibility.AdditionalEligibilityHelpText }}
                </p>
                <button
                    class="border px-4 py-2 rounded active:bg-black"
                    :class="{
                        'bg-black': agreedAdditional,
                        'text-white': agreedAdditional,
                    }"
                    @click="agreeAdditional"
                >
                    Agree
                </button>
            </div>
            <div class="mt-8">
                <h2 class="font-bold text-xl mb-2">Endorsement Questions</h2>
                <div
                    v-for="(
                        question, index
                    ) in eligibility.EndorsementQuestions"
                    :key="index"
                    class="mb-4"
                >
                    <p class="mb-2">
                        Question {{ question.Number }}: {{ question.Question }}
                    </p>
                    <button
                        class="text-black border px-4 py-2 rounded"
                        :class="{
                            'bg-black': agreedEndorsements[index],
                            'text-white': agreedEndorsements[index],
                        }"
                        @click="agreeEndorsement(index)"
                    >
                        Agree
                    </button>
                </div>
            </div>
        </div>
        <a :href="route('uinsure-quote.summary', quote_reference)">
            <button
                class="bg-blue-500 text-white px-4 py-2 rounded mt-8"
                :class="{ 'opacity-50': !allAgreed }"
                :disabled="!allAgreed"
            >
                Continue
            </button>
        </a>
    </div>

    <!-- Modal -->
    <div
        v-if="showModal"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50"
    >
        <div class="bg-white p-6 rounded shadow-md flex flex-col items-center">
            <h2 class="text-xl font-bold mb-4">Disagreement</h2>
            <p class="mb-4 text-center">
                You have disagreed with a question.<br />
                Please contact support for further assistance on 020 8800 1211.
            </p>
            <button
                class="bg-blue-500 text-white px-4 py-2 rounded"
                @click="closeModal"
            >
                Close
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import AppHeader from "@/Components/UI/AppHeader.vue";
import { defineProps, ref, computed } from "vue";

const props = defineProps({
    quote_reference: {
        type: String,
        required: true,
    },
    eligibility: {
        type: Object,
        required: true,
    },
});

const agreedQuestions = ref(
    new Array(props.eligibility.EligibilityQuestions.length).fill(false)
);
const showModal = ref(false);

const agree = (index: number) => {
    agreedQuestions.value[index] = true;
};

const disagree = (index: number) => {
    agreedQuestions.value[index] = false;
    showModal.value = true;
};

const agreedAdditional = ref(false);
const agreedEndorsements = ref(
    new Array(props.eligibility.EndorsementQuestions.length).fill(false)
);
const agreeAdditional = () => {
    agreedAdditional.value = true;
};

const agreeEndorsement = (index: number) => {
    agreedEndorsements.value[index] = true;
};
const closeModal = () => {
    showModal.value = false;
};

const allAgreed = computed(() => {
    return (
        agreedQuestions.value.every((agreed) => agreed) &&
        agreedAdditional.value &&
        agreedEndorsements.value.every((agreed) => agreed)
    );
});
</script>

<style scoped>
.container {
    max-width: 800px;
}
.bg-white {
    background-color: white;
}
.shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.rounded {
    border-radius: 0.375rem;
}
.p-6 {
    padding: 1.5rem;
}
.mb-4 {
    margin-bottom: 1rem;
}
.mb-2 {
    margin-bottom: 0.5rem;
}
.mt-8 {
    margin-top: 2rem;
}
.text-gray-600 {
    color: #718096;
}
.bg-blue-500 {
    background-color: #4299e1;
}
.bg-red-500 {
    background-color: #f56565;
}
.text-white {
    color: white;
}
.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}
.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.rounded {
    border-radius: 0.375rem;
}
.opacity-50 {
    opacity: 0.5;
}
</style>
