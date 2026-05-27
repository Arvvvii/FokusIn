<template>
  <div class="fixed top-4 right-4 z-50 flex flex-col gap-2 pointer-events-none">
    <transition-group
      name="toast"
      enter-active-class="transform ease-out duration-300 transition"
      enter-from-class="translate-x-full opacity-0"
      enter-to-class="translate-x-0 opacity-100"
      leave-active-class="transition ease-in duration-200"
      leave-from-class="translate-x-0 opacity-100"
      leave-to-class="translate-x-full opacity-0"
    >
      <div
        v-for="toast in toasts"
        :key="toast.id"
        :class="toastClass(toast.type)"
        class="pointer-events-auto shadow-md rounded-xl border border-slate-200 backdrop-blur-sm p-3 min-w-[280px] flex items-center justify-between space-x-2"
      >
        <span class="text-sm font-medium">{{ toast.message }}</span>
        <button @click="removeToast(toast.id)"
                class="ml-2 text-gray-500 hover:text-gray-700 transition-colors"
                aria-label="Close toast">
          &times;
        </button>
      </div>
    </transition-group>
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useToastStore } from '@/stores/toast'

const store = useToastStore()
// Reactive array from Pinia store
const toasts = computed(() => store.toasts)

const removeToast = (id) => {
  store.removeToast(id)
}

// Map toast type to Tailwind classes (soft academic palette)
const toastClass = (type) => {
  const map = {
    success: 'bg-green-100 border-green-200 text-green-800',
    error: 'bg-red-100 border-red-200 text-red-800',
    warning: 'bg-amber-100 border-amber-200 text-amber-800',
    info: 'bg-[#D0E3FF] border-[#BAD6EB] text-[#081F5C]'
  }
  return map[type] || map.info
}
</script>

<style scoped>
/* Transition‑group handles enter/leave animations */
</style>
