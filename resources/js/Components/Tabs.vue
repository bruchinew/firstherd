<template>
    <div>
        <div class="tabs">
            <button
                v-for="tab in tabs"
                :key="tab.name"
                :class="{ active: tab.name === activeTab }"
            >
                <!-- @click="selectTab(tab.name)" -->
                {{ tab.label }}
            </button>
        </div>
        <div class="tab-content">
            <slot></slot>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, onMounted, provide, watch } from "vue";

const tabs = ref([]);
const activeTab = ref("tab1");

const selectTab = (tabName) => {
    activeTab.value = tabName;
};

const goToNextTab = () => {
    const currentIndex = tabs.value.findIndex(
        (tab) => tab.name === activeTab.value
    );
    if (currentIndex !== -1 && currentIndex < tabs.value.length - 1) {
        selectTab(tabs.value[currentIndex + 1].name);
    }
};

provide("registerTab", (tab) => {
    tabs.value.push(tab);
    if (tabs.value.length === 1) {
        activeTab.value = tab.name;
    }
});

provide("activeTab", activeTab);
provide("selectTab", selectTab);
provide("tabs", tabs);
provide("goToNextTab", goToNextTab);

onMounted(() => {
    // Ensure the first tab is active by default
    if (tabs.value.length > 0) {
        activeTab.value = tabs.value[0].name;
    }
});

watch(tabs, (newTabs) => {
    if (!newTabs.some((tab) => tab.name === activeTab.value)) {
        activeTab.value = newTabs.length > 0 ? newTabs[0].name : "";
    }
});
</script>

<style scoped>
.tabs {
    display: flex;
    gap: 1rem;
    justify-content: space-between;
    padding-left: 90px;
    padding-right: 90px;
}

button {
    padding: 0.5rem 1rem;
    cursor: pointer;
}

button.active {
    font-weight: bold;
    border-bottom: 2px solid #000;
    background-color: #ceaf4c;
}

.tab-content {
    margin-top: 1rem;
}
</style>
