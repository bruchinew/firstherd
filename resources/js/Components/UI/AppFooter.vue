<template>
    <div class="footer-container">
        <div class="content">
            <button>
                <a :href="route('quotes.index')">Contact Us</a>
            </button>
            <br />
            <button>
                <a :href="route('quotes.index')">Support</a>
            </button>
            <br />
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
    background-size: contain, contain;
    opacity: 0.1; /* Adjust the opacity for watermark effect */
}

.content {
    position: relative;
    z-index: 1;
    /* Add any additional styling for your footer content */
}
</style>
