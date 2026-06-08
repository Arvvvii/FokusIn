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
  }
}

