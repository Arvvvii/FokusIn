/**
 * Quiz Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel untuk Kuis dan Attempt
 */
import api from './api'

export const quizService = {
  /**
   * Mendapatkan daftar kuis terpaginasi.
   * GET /quizzes
   */
  async getQuizzes() {
    try {
      const response = await api.get('/quizzes')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data kuis.'
    }
  },

  /**
   * Mendapatkan detail kuis beserta soal-soalnya berdasarkan ID.
   * GET /quizzes/{id}
   */
  async getQuizById(id) {
    try {
      const response = await api.get(`/quizzes/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil detail kuis.'
    }
  },

  /**
   * Mengirimkan jawaban kuis untuk dinilai.
   * POST /quizzes/{id}/attempt
   */
  async submitAttempt(id, answers) {
    try {
      const response = await api.post(`/quizzes/${id}/attempt`, { answers })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengirim jawaban kuis.'
    }
  }
}
