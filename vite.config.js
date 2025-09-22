import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/vendor/landing',
        emptyOutDir: true,
        rollupOptions: {
            input: {
                app: resolve(__dirname, 'resources/js/app.js'),
                style: resolve(__dirname, 'resources/sass/app.scss'),
            },
            output: {
                entryFileNames: 'js/[name].js',
                chunkFileNames: 'js/[name]-[hash].js',
                assetFileNames: (assetInfo) => {
                    const info = assetInfo.name.split('.');
                    const extType = info[info.length - 1];
                    if (/\.(css)$/.test(assetInfo.name)) {
                        return 'css/[name].[ext]';
                    }
                    if (/\.(png|jpe?g|svg|gif|tiff|bmp|ico)$/i.test(assetInfo.name)) {
                        return 'images/[name]-[hash].[ext]';
                    }
                    if (/\.(woff2?|eot|ttf|otf)$/i.test(assetInfo.name)) {
                        return 'fonts/[name]-[hash].[ext]';
                    }
                    return `assets/[name]-[hash].[ext]`;
                },
            },
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";`,
            },
        },
    },
    resolve: {
        alias: {
            '@': resolve(__dirname, 'resources'),
            '@sass': resolve(__dirname, 'resources/sass'),
            '@js': resolve(__dirname, 'resources/js'),
            '@views': resolve(__dirname, 'resources/views'),
        },
    },
    server: {
        hmr: {
            host: 'localhost',
        },
        watch: {
            usePolling: true,
        },
    },
    optimizeDeps: {
        include: ['alpinejs'],
    },
});
