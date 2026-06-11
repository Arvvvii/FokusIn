/**
 * Stats Service
 * Menghubungkan frontend dengan API backend untuk mengambil statistik global.
 */
import api from './api'

export const statsService = {
  /**
   * Mendapatkan data statistik global dari backend.
   * GET /global-stats
   */
  async getGlobalStats() {
    try {
      const response = await api.get('/global-stats')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data statistik.'
    }
  }
}
