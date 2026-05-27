import { fileURLToPath, URL } from 'node:url'
import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueDevTools from 'vite-plugin-vue-devtools'
import tailwindcss from '@tailwindcss/vite'

// https://vite.dev/config/
export default defineConfig({
  plugins: [
    tailwindcss(),
    vue(),
    vueDevTools(),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    },
  },
  // TAMBAHKAN BLOK SERVER INI:
  server: {
    proxy: {
      '/api': {
        target: 'https://fokusin-production.up.railway.app',
        changeOrigin: true,
        secure: false,
      }
    }
  }
})