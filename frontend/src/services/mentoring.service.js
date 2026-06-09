/**
 * Mentoring Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel untuk Tutor, Booking, dan Sesi Mentoring
 */
import api from './api'

export const mentoringService = {
  /**
   * Mendapatkan daftar tutor yang tersedia (publik/terverifikasi).
   * GET /tutors
   */
  async getTutors() {
    try {
      const response = await api.get('/tutors')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil daftar tutor.'
    }
  },

  /**
   * Mendapatkan detail profil tutor beserta ulasan berdasarkan ID.
   * GET /tutors/{id}
   */
  async getTutorById(id) {
    try {
      const response = await api.get(`/tutors/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil profil tutor.'
    }
  },

  /**
   * Mendapatkan daftar sesi mentoring milik user yang login.
   * GET /mentoring/sessions
   */
  async getSessions() {
    try {
      const response = await api.get('/mentoring/sessions')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil sesi mentoring.'
    }
  },

  /**
   * Mengajukan/membuat permintaan booking mentoring baru.
   * POST /mentoring/requests
   */
  async createMentoringRequest(payload) {
    try {
      const response = await api.post('/mentoring/requests', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengirim permintaan mentoring.'
    }
  }
}
