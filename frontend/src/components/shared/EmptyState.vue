<template>
  <div class="flex flex-col items-center justify-center py-12">
    <div class="w-24 h-24 mb-4 flex items-center justify-center rounded-full bg-[#F7F2EB] shadow-md">
      <!-- Placeholder icon, can be overridden via slot -->
      <slot name="icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[#334EAC]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-3-3v6" />
        </svg>
      </slot>
    </div>
    <h3 class="text-lg font-semibold text-[#081F5C] mb-2">{{ title }}</h3>
    <p class="text-sm text-slate-600 text-center max-w-sm mb-4">{{ description }}</p>
    <slot name="action"></slot>
  </div>
</template>

<script setup lang="ts">
interface Props {
  title: string;
  description: string;
}
const props = defineProps<Props>();
</script>

<style scoped>
/* No extra styles – Tailwind handles everything */
</style>
