/**
 * Material Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel untuk Materi Akademik dan Kategori
 */
import api from './api'

export const materialService = {
  /**
   * Mendapatkan daftar semua kategori (subjek).
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
   * Mendapatkan daftar materi terpaginasi.
   * GET /materials
   */
  async getMaterials() {
    try {
      const response = await api.get('/materials')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data materi akademik.'
    }
  },

  /**
   * Mendapatkan detail materi akademik berdasarkan ID.
   * GET /materials/{id}
   */
  async getMaterialById(id) {
    try {
      const response = await api.get(`/materials/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil detail materi akademik.'
    }
  },

  /**
   * Membuat/mengunggah materi akademik baru.
   * POST /materials
   * Menggunakan multipart/form-data untuk upload file secara otomatis.
   */
  async createMaterial(formData, onUploadProgress) {
    try {
      const response = await api.post('/materials', formData, {
        onUploadProgress
      })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengunggah materi akademik baru.'
    }
  }
}
