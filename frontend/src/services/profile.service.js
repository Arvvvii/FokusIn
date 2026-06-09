/**
 * Profile Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel untuk Profil User
 */
import api from './api'

export const profileService = {
  /**
   * Mendapatkan data profil lengkap user berdasarkan ID.
   * GET /api/users/{id}/profile
   */
  async getProfile(id) {
    try {
      const response = await api.get(`/users/${id}/profile`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data profil.'
    }
  }
}
