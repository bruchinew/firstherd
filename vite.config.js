import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    base: "/",
    build: {
        outDir: "public/build",
    },
    resolve: {
        alias: {
            ziggy: "node_modules/ziggy", // Ensure Ziggy is resolved correctly
        },
    },
    server: {
        host: "0.0.0.0", // Bind to all interfaces (use 'localhost' for local dev)
        port: process.env.PORT || 5173, // Use Render's port or fallback to 5173
        strictPort: true, // Ensures Vite uses the specified port
        hmr: {
            protocol: "ws", // WebSocket protocol for HMR
            host: "localhost", // Change this if working on a remote server
        },
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
