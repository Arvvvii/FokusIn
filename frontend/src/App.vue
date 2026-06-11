<script setup>
import { RouterView } from 'vue-router'
import GlobalToast from '@/components/shared/GlobalToast.vue'
</script>

<template>
  <GlobalToast />
  <RouterView />
</template>

<style scoped></style>
