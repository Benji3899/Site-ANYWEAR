import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
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
    build: {
        manifest: true, // Générer un fichier manifest.json
        outDir: 'public/build', // Répertoire de sortie pour les fichiers générés
        rollupOptions: {
            input: {
                app: 'resources/js/app.js', // Point d'entrée principal
            },
        },
    },
});
