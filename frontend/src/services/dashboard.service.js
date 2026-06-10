import api from './api'

export const dashboardService = {
  /**
   * Mendapatkan data dashboard untuk student yang login.
   * GET /student/dashboard
   */
  async getStudentDashboard() {
    try {
      const response = await api.get('/student/dashboard')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memuat dashboard pelajar.'
    }
  },

  /**
   * Mendapatkan data dashboard untuk tutor yang login.
   * GET /tutor/dashboard
   */
  async getTutorDashboard() {
    try {
      const response = await api.get('/tutor/dashboard')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memuat dashboard tutor.'
    }
  },

  /**
   * Mendapatkan data analitik untuk tutor yang login.
   * GET /tutor/analytics
   */
  async getTutorAnalytics() {
    try {
      const response = await api.get('/tutor/analytics')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memuat analitik tutor.'
    }
  }
}
