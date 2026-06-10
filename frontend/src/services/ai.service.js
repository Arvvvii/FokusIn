/**
 * AI Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel di Railway untuk AI Pattern Analyzer
 */
import api from './api' // Menggunakan axios instance dari services/api.js

export const aiService = {
  /**
   * Mendapatkan analisis pola AI berdasarkan categoryId.
   * GET /ai-pattern/summary?category_id={id}
   */
  async getSummary(categoryId) {
    try {
      const response = await api.get(`/ai-pattern/summary?category_id=${categoryId}`)
      return response.data
    } catch (error) {
      // Mengambil pesan error dari Laravel jika ada
      throw error.response?.data?.message || 'Gagal mengambil data analisis AI.'
    }
  },

  /**
   * Memperbarui analisis pola AI secara instan berdasarkan categoryId.
   * POST /ai-pattern/refresh
   */
  async refreshSummary(categoryId) {
    try {
      const response = await api.post('/ai-pattern/refresh', { category_id: categoryId })
      return response.data
    } catch (error) {
      // Mengambil pesan error dari Laravel jika ada
      throw error.response?.data?.message || 'Gagal memperbarui analisis AI.'
    }
  },

  /**
   * Menganalisis dokumen menggunakan AI.
   * POST /ai/analyze
   */
  async analyzeDocument(payload) {
    try {
      const response = await api.post('/ai/analyze', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menganalisis dokumen.'
    }
  },

  /**
   * Mendapatkan wawasan akademis bertenaga AI untuk pelajar.
   * GET /student/ai-insights
   */
  async getStudentAIInsights() {
    try {
      const response = await api.get('/student/ai-insights')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil wawasan akademis AI.'
    }
  }
}

