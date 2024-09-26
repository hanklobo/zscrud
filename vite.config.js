import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'src/Resources/css/app.css'
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'dist',
    },
});
