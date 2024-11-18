import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    build: {
        outDir: "public/build",
    },
    resolve: {
        alias: {
            ziggy: "node_modules/ziggy", // Ensure Ziggy is resolved correctly
        },
    },
    server: {
        host: "0.0.0.0", // Bind to all interfaces
        port: process.env.PORT || 10000, // Use Render's port or fallback to default 5173
        strictPort: true, // Ensures Vite uses the specified port
    },
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
