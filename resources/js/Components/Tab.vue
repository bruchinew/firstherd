<template>
    <div v-if="isActive" class="flex flex-col h-full">
        <slot></slot>
        <transition name="fade" mode="out-in">
            <div class="mt-auto flex justify-end">
                <button
                    class="bg-red-300 p-3 rounded-lg transition duration-300 hover:bg-red-500 hover:text-white mx-5"
                    v-if="showNextButton"
                    @click="handleNextClick"
                >
                    Next
                </button>
            </div>
        </transition>
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
const goToNextTab = inject<() => void>("goToNextTab");

const handleNextClick = () => {
    if (goToNextTab) {
        goToNextTab();
    } else {
        console.error("goToNextTab injection not found.");
    }
};

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

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active in <2.1.8 */ {
    opacity: 0;
}
</style>
