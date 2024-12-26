import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                mustard: "#ceaf4c",
                navy: "rgb(1, 51, 101)",
            },
            zIndex: {
                9999: 9999,
            },
            transitionDelay: {
                750: "750ms",
                400: "400ms",
                800: "800ms",
                850: "850ms",
                900: "900ms",
                950: "950ms",
                1050: "1050ms",
                1100: "1100ms",
                1200: "1200ms",
                1300: "1300ms",
                1400: "1400ms",
                1500: "1500ms",
                1600: "1600ms",
                1750: "1750ms",
            },
        },
    },

    plugins: [forms],
};
