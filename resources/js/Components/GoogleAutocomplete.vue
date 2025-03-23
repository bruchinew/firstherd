<template>
    <div>
        <input id="autocomplete" type="text" placeholder="Search Location" />
    </div>
</template>

<script>
export default {
    mounted() {
        // Load the Google API script dynamically using the API key
        this.loadGoogleScript();
    },
    methods: {
        loadGoogleScript() {
            const script = document.createElement("script");
            script.src = `https://maps.googleapis.com/maps/api/js&libraries=places`;
            script.async = true;
            script.onload = this.initAutocomplete;
            document.head.appendChild(script);
        },
        initAutocomplete() {
            const input = document.getElementById("autocomplete");
            new google.maps.places.Autocomplete(input);
        },
    },
};
</script>
