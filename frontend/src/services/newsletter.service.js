import api from './api'

export const newsletterService = {
  /**
   * Subscribe an email to the newsletter.
   * POST /newsletter/subscribe
   */
  async subscribe(email) {
    try {
      const response = await api.post('/newsletter/subscribe', { email })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal berlangganan. Silakan coba lagi.'
    }
  }
}
