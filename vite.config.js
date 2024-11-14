import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        hmr: {
            host: process.env.GITPOD_WORKSPACE_URL
                ? process.env.GITPOD_WORKSPACE_URL.replace('https://', '7cdb2b9b7de642519219f63af01d3143.vfs.cloud9.us-east-1.amazonaws.com')
                : '7cdb2b9b7de642519219f63af01d3143.vfs.cloud9.us-east-1.amazonaws.com',
        },
        port: 3000,
    },
});
