<template>
    <div class="footer-container h-52">
        <div class="bg-white/80 h-52 grid grid-cols-4">
            <div class="p-12">
                <h1>Halpern Insurance</h1>
                <h1>The Insurance company you can trust</h1>
            </div>
            <button>
                <a :href="route('quotes.index')">Contact Us</a>
            </button>
            <button>
                <a :href="route('quotes.index')">Support</a>
            </button>
            <button>
                <a :href="route('quotes.index')">Help</a>
            </button>
        </div>
    </div>
</template>

<script setup></script>

<style scoped>
.footer-container {
    position: relative;
    width: 100%;
    height: 200px; /* Adjust the height as needed */
    background: url("/images/wording.png") no-repeat center center;
    background-size: contain;
}
</style>
