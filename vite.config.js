import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
    ],
    server: {
        https: false,
        host: true,
        hmr: {host: 'localhost', protocol: 'ws'},
    },
    ssr: {
        noExternal: ['lodash'],
    },
});
