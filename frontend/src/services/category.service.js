import api from './api'

export const categoryService = {
  /**
   * Mendapatkan daftar kategori.
   * GET /categories
   */
  async getCategories() {
    try {
      const response = await api.get('/categories')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil daftar kategori.'
    }
  },

  /**
   * Membuat kategori baru.
   * POST /admin/categories
   */
  async createCategory(payload) {
    try {
      const response = await api.post('/admin/categories', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal membuat kategori.'
    }
  },

  /**
   * Memperbarui kategori.
   * PUT /admin/categories/{id}
   */
  async updateCategory(id, payload) {
    try {
      const response = await api.put(`/admin/categories/${id}`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui kategori.'
    }
  },

  /**
   * Menghapus kategori.
   * DELETE /admin/categories/{id}
   */
  async deleteCategory(id) {
    try {
      const response = await api.delete(`/admin/categories/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menghapus kategori.'
    }
  }
}
