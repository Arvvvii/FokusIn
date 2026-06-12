import api from './api'

export const forumService = {
  /**
   * Mendapatkan daftar semua kategori.
   * GET /categories
   */
  async getCategories() {
    try {
      const response = await api.get('/categories')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data kategori.'
    }
  },

  /**
   * Mendapatkan daftar postingan terpaginasi.
   * GET /posts
   * Mendukung filter category_id dan page
   */
  async getPosts(params = {}) {
    try {
      const response = await api.get('/posts', { params })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil daftar postingan.'
    }
  },

  /**
   * Membuat postingan baru.
   * POST /posts
   * Payload: { category_id, title, content }
   */
  async createPost(payload) {
    try {
      const response = await api.post('/posts', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mempublikasikan postingan baru.'
    }
  },

  /**
   * Membuat jawaban baru untuk postingan tertentu.
   * POST /posts/{id}/answers
   * Payload: { content }
   */
  async createAnswer(postId, content) {
    try {
      const response = await api.post(`/posts/${postId}/answers`, { content })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengirimkan jawaban.'
    }
  },

  /**
   * Mendapatkan detail postingan berdasarkan ID.
   * GET /posts/{id}
   */
  async getPostById(id) {
    try {
      const response = await api.get(`/posts/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data postingan.'
    }
  },

  /**
   * Melakukan vote pada postingan.
   * POST /posts/{id}/vote
   * Payload: { vote_type }
   */
  async votePost(id, voteType) {
    try {
      const response = await api.post(`/posts/${id}/vote`, { vote_type: voteType })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal melakukan voting.'
    }
  },

  /**
   * Memverifikasi jawaban postingan (tutor side).
   * POST /posts/{id}/verify
   */
  async verifyPost(id, payload = {}) {
    try {
      const response = await api.post(`/posts/${id}/verify`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memverifikasi jawaban.'
    }
  },

  /**
   * Menandai komentar terbaik sebagai jawaban terbaik.
   * POST /posts/{id}/best-answer
   */
  async setBestAnswer(id, commentId) {
    try {
      const response = await api.post(`/posts/${id}/best-answer`, { comment_id: commentId })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menandai jawaban terbaik.'
    }
  },

  /**
   * Mengoptimalkan teks postingan menggunakan AI.
   * POST /ai/optimize-post
   * Payload: { content, title? }
   */
  async optimizePost(payload) {
    try {
      const response = await api.post('/ai/optimize-post', payload, { timeout: 60000 })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengoptimalkan teks dengan AI.'
    }
  }
}

