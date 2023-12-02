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
  build: {
    rollupOptions: {
      external: ['algoliasearch-helper'],
      // Añade aquí cualquier otro módulo externo si es necesario
    },
  },
  server: {
    // Agrega la configuración del servidor para Vite
    proxy: {
      '/': {
        target: 'http://localhost', // Cambia esto según la configuración de tu aplicación Laravel
        ws: true,
      },
    },
  },
});
