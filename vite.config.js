import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/js/login.js',
                'resources/css/registrasi.css',
                'resources/css/beranda_masyarakat.css',
                'resources/css/form_laporan.css',
                'resources/js/form_laporan.js',
                'resources/css/beranda_dinas.css',
                'resources/css/laporan_masuk_dinas.css',
                'resources/js/laporan_masuk_dinas.js',
                'resources/css/keloladata_petugas_dinas.css',
                'resources/js/keloladata_petugas_dinas.js',
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
