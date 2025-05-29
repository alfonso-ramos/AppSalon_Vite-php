import { defineConfig } from 'vite'
import { resolve } from 'path'

export default defineConfig({
  build: {
    outDir: '../public/build',
    assetsDir: 'assets',
    manifest: true,
    rollupOptions: {
      input: {
        main: resolve(__dirname, 'src/main.js'),
      }
    },
    emptyOutDir: true,
    sourcemap: true
  },
  server: {
    origin: 'http://localhost:5173'
  }
})
