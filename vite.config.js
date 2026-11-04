import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
<<<<<<< HEAD
                'resources/css/auth.css',
                'resources/css/dinas.css',
                'resources/css/petugas.css',
                'resources/css/masyarakat.css',
                'resources/js/app.js',
=======
                'resources/js/app.js',
                'resources/css/registrasi.css',
                'resources/js/registrasi.js',
>>>>>>> fb77bb798ca2e33a3d34cf345052a51739ffff2a
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});