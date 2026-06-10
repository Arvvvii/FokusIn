/**
 * Quiz Service (Hybrid Local-Remote Integration)
 * Fetches seeded quizzes from the Laravel Railway production backend,
 * and merges them with custom quizzes created/edited by the Admin in LocalStorage.
 */
import api from './api'

export const quizService = {
  /**
   * Mendapatkan daftar kuis terpaginasi.
   * GET /quizzes
   *
   * Note: Frontend will consume the paginated payload and use response.data.data as the primary dataset while preserving future pagination support.
   */
  async getQuizzes() {
    try {
      const response = await api.get('/quizzes')
      return response.data?.data || response.data || []
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil daftar kuis.'
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
  },

  /**
   * Membuat kuis baru (Admin).
   * POST /quizzes
   */
  async createQuiz(payload) {
    try {
      const response = await api.post('/quizzes', {
        title: payload.title,
        description: payload.description || 'Tidak ada deskripsi.',
        category_id: payload.category_id || 1,
        questions: payload.questions || []
      })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal membuat kuis.'
    }
  },

  /**
   * Memperbarui data kuis (Admin).
   * PUT /quizzes/{id}
   */
  async updateQuiz(id, payload) {
    try {
      const response = await api.put(`/quizzes/${id}`, {
        title: payload.title,
        description: payload.description || 'Tidak ada deskripsi.',
        category_id: payload.category_id || 1,
        questions: payload.questions || []
      })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui kuis.'
    }
  },

  /**
   * Menghapus kuis (Admin).
   * DELETE /quizzes/{id}
   */
  async deleteQuiz(id) {
    try {
      const response = await api.delete(`/quizzes/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menghapus kuis.'
    }
  }
}

