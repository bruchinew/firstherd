<template>
    <div class="footer-container h-52 relative pt-56">
        <div class="bg-navy/90 h-52 grid grid-cols-1 md:grid-cols-3 gap-4 p-4">
            <div class="flex flex-col items-center">
                <h1 class="text-mustard text-3xl font-extrabold mb-2">
                    Halpern Insurance
                </h1>
                <p class="text-mustard text-center text-sm">
                    The Insurance company you can trust
                </p>
            </div>
            <div class="flex flex-col items-center">
                <h1 class="text-mustard text-3xl font-extrabold mb-2">About</h1>
                <p class="text-mustard text-center text-sm">
                    33 West Bank, London, NW1 2LT
                </p>
                <p class="text-mustard text-center text-sm">020 8800 1211</p>
            </div>
            <div class="flex flex-col items-center">
                <h1 class="text-mustard text-3xl font-extrabold mb-2">
                    Company
                </h1>
                <a
                    :href="route('quotes.index')"
                    class="text-mustard text-sm mb-1"
                    >Contact Us</a
                >
                <a :href="route('quotes.index')" class="text-mustard text-sm"
                    >Support</a
                >
            </div>
        </div>
    </div>
</template>

<script setup>
import { route } from "ziggy-js";
</script>

<style scoped>
.footer-container {
    background: url("/images/wording.png") no-repeat center center;
    background-size: contain;
}
</style>
