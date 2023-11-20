import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resource/css/app.css",
                "resource/css/bootstrap.min.css",
                "resource/css/style.css",
                "resource/js/app.js",
                "resource/js/bootstrap.js",
            ],
            refresh: true,
        }),
    ],
});
