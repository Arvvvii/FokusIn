import { defineStore } from 'pinia'

/**
 * Toast Store – production‑ready implementation.
 * Each toast has: id, message, type, duration.
 * Helper actions (success, error, warning, info) provide a clean API.
 */
export const useToastStore = defineStore('toast', {
  state: () => ({
    /** @type {Array<{id:string, message:string, type:string, duration:number}>} */
    toasts: []
  }),

  actions: {
    /**
     * Generic addToast – internal use by helper methods.
     * @param {string} msg
     * @param {'success'|'error'|'warning'|'info'} type
     * @param {number} [duration]
     */
    addToast(msg, type = 'info', duration) {
      // Generate a UUID; fallback to timestamp + random for environments without crypto
      const id = (typeof crypto !== 'undefined' && crypto.randomUUID) ? crypto.randomUUID() : `${Date.now()}${Math.random()}`
      const defaultDurations = { success: 3000, info: 3000, warning: 4000, error: 5000 }
      const dur = duration ?? defaultDurations[type] ?? 3000
      this.toasts.push({ id, message: msg, type, duration: dur })
      // Auto‑remove after duration
      setTimeout(() => this.removeToast(id), dur)
    },

    /** Helper: success toast */
    success(msg, duration) {
      this.addToast(msg, 'success', duration)
    },
    /** Helper: error toast */
    error(msg, duration) {
      this.addToast(msg, 'error', duration)
    },
    /** Helper: warning toast */
    warning(msg, duration) {
      this.addToast(msg, 'warning', duration)
    },
    /** Helper: info toast */
    info(msg, duration) {
      this.addToast(msg, 'info', duration)
    },

    /** Remove a toast by its id */
    removeToast(id) {
      this.toasts = this.toasts.filter(t => t.id !== id)
    }
  }
})
