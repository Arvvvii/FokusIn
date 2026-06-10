import api from './api'
import { ref } from 'vue'

export const unreadCount = ref(0)
export const notificationsPreview = ref([])
export const loading = ref(false)

/**
 * Helper to parse the Laravel notification class name into a simpler type string
 */
export const parseNotificationType = (className) => {
  if (!className) return 'system'
  const lower = className.toLowerCase()
  if (lower.includes('mentoring')) return 'mentoring'
  if (lower.includes('post') || lower.includes('reply') || lower.includes('forum') || lower.includes('comment')) return 'forum'
  if (lower.includes('validation') || lower.includes('exam') || lower.includes('upload') || lower.includes('ai')) return 'ai'
  return 'system'
}

/**
 * Helper to get a human-friendly category name based on the notification type
 */
export const getCategoryName = (type) => {
  switch (type) {
    case 'mentoring': return 'Mentoring 1-on-1'
    case 'forum': return 'Forum Diskusi'
    case 'ai': return 'AI Validation'
    default: return 'Sistem'
  }
}

/**
 * Helper to format a timestamp into a relative Indonesian string
 */
export const formatRelativeTime = (dateString) => {
  if (!dateString) return ''
  const date = new Date(dateString)
  const now = new Date()
  const diffMs = now - date
  const diffSec = Math.floor(diffMs / 1000)
  const diffMin = Math.floor(diffSec / 60)
  const diffHr = Math.floor(diffMin / 60)
  const diffDay = Math.floor(diffHr / 24)

  if (diffSec < 60) {
    return 'Baru saja'
  } else if (diffMin < 60) {
    return `${diffMin} menit lalu`
  } else if (diffHr < 24) {
    return `${diffHr} jam lalu`
  } else if (diffDay === 1) {
    return 'Kemarin'
  } else if (diffDay < 7) {
    return `${diffDay} hari lalu`
  } else {
    return date.toLocaleDateString('id-ID', {
      day: 'numeric',
      month: 'short',
      year: 'numeric'
    })
  }
}

export const notificationsService = {
  /**
   * Mengambil daftar notifikasi milik user (paginated).
   * GET /notifications
   */
  async getNotifications(page = 1) {
    loading.value = true
    try {
      const response = await api.get(`/notifications?page=${page}`)
      const rawData = response.data.data || []

      // Sort notifications by created_at descending (newest first)
      const sortedData = [...rawData].sort(
        (a, b) => new Date(b.created_at) - new Date(a.created_at)
      )

      if (page === 1) {
        notificationsPreview.value = sortedData.slice(0, 5)
        unreadCount.value = sortedData.filter(n => !n.read_at).length
      }

      return {
        ...response.data,
        data: sortedData
      }
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data notifikasi.'
    } finally {
      loading.value = false
    }
  },

  /**
   * Menandai satu notifikasi sebagai sudah dibaca.
   * POST /notifications/{id}/read
   */
  async markAsRead(id) {
    try {
      const response = await api.post(`/notifications/${id}/read`)
      
      // Update local state in notificationsPreview
      const item = notificationsPreview.value.find(n => n.id === id)
      if (item && !item.read_at) {
        item.read_at = new Date().toISOString()
        unreadCount.value = Math.max(0, unreadCount.value - 1)
      }
      
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menandai notifikasi sebagai dibaca.'
    }
  },

  /**
   * Menandai semua notifikasi sebagai sudah dibaca.
   * POST /notifications/read-all
   */
  async markAllAsRead() {
    try {
      const response = await api.post('/notifications/read-all')
      
      // Update local state in notificationsPreview
      notificationsPreview.value.forEach(item => {
        if (!item.read_at) {
          item.read_at = new Date().toISOString()
        }
      })
      unreadCount.value = 0
      
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menandai semua notifikasi sebagai dibaca.'
    }
  }
}
