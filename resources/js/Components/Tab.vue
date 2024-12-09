<template>
    <div v-if="isActive">
        <slot></slot>
        <button v-if="showNextButton" @click="goToNextTab">Next</button>
    </div>
</template>

<script setup lang="ts">
import { inject, onMounted, ref, watch, defineProps } from "vue";

const props = defineProps({
    name: {
        type: String,
        required: true,
    },
    label: {
        type: String,
        required: true,
    },
    showNextButton: {
        type: Boolean,
        default: false,
    },
});

const isActive = ref(false);
const registerTab = inject("registerTab");
const activeTab = inject("activeTab");
const goToNextTab = inject("goToNextTab");

onMounted(() => {
    if (registerTab) {
        registerTab({
            name: props.name,
            label: props.label,
        });
    } else {
        console.error("registerTab injection not found.");
    }

    if (activeTab) {
        watch(activeTab, (newActiveTab) => {
            isActive.value = newActiveTab === props.name;
        });

        isActive.value = activeTab.value === props.name;
    } else {
        console.error("activeTab injection not found.");
    }
});
</script>
