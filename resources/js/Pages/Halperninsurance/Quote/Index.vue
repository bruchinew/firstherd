<template>
    <AppHeader></AppHeader>
    <div>
        <Tabs>
            <Tab
                name="tab1"
                label="Your Details"
                :show-next-button="FormFilled"
            >
                <h1 class="text-3xl">Get a Quote</h1>
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
                        <h1>You Address and choice of cover</h1>
                        <div
                            class="p-4 m-6 border border-black bg-gray-200 rounded-xl"
                        >
                            <div class="justify-between grid grid-cols-3">
                                <FormKit
                                    type="text"
                                    name="Address"
                                    label="Your Address"
                                    placeholder="8 Glaserton Road, London"
                                    validation="required"
                                />
                                <FormKit
                                    type="text"
                                    name="Postcode"
                                    label="Your Postcode"
                                    validation="required|postcode"
                                />
                                <button>Find Address</button>
                            </div>
                            <div class="grid grid-cols-3">
                                <FormKit
                                    type="checkbox"
                                    name="owner"
                                    label="Do you own this home?"
                                    validation="required"
                                />
                                <FormKit
                                    type="select"
                                    name="Your coverage"
                                    label="Your coverage"
                                    :options="[
                                        'buildings',
                                        'contents',
                                        'bulding and contents',
                                    ]"
                                />
                                <FormKit
                                    type="date"
                                    label="Cover Start Date"
                                    name="cover_start_date"
                                    validation="required"
                                />
                            </div>
                        </div>
                        <div
                            class="p-4 m-6 border border-black bg-gray-200 rounded-xl"
                        >
                            <div class="justify-between grid grid-cols-3">
                                <FormKit
                                    type="select"
                                    name="Prperty type"
                                    label="Property type"
                                    validation="required"
                                    :options="[
                                        'Detached',
                                        'Semi-detached',
                                        'Terraced',
                                        'Flat',
                                    ]"
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
                            </div>
                            <div class="justify-between grid grid-cols-3">
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
                        </div>
                        <FormKit type="submit" label="Register" />
                    </FormKit>
                    <div v-if="submitted">
                        <h2 class="text-xl text-green-500">
                            Submission successful!
                        </h2>
                    </div>
                </div>
            </Tab>
            <Tab name="tab2" label="Your Quote" :show-next-button="true">
                <h3>Tab 2 Content</h3>
                <p>This is the content for Tab 2.</p>
            </Tab>
            <Tab name="tab3" label="Summary" :show-next-button="false">
                <h3>Tab 3 Content</h3>
                <p>This is the content for Tab 3.</p>
            </Tab>
            <Tab name="tab4" label="Payment" :show-next-button="false">
                <h3>Tab 4 Content</h3>
                <p>This is the content for Tab 4.</p>
            </Tab>
        </Tabs>
    </div>
</template>

<script setup>
import Tab from "@/Components/Tab.vue";
import Tabs from "@/Components/Tabs.vue";
import AppHeader from "@/Components/UI/AppHeader.vue";
import { ref, inject, onMounted } from "vue";

const submitted = ref(false);

const handleSubmit = () => {
    submitted.value = true;
};
const FormFilled = () => {
    return true;
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
