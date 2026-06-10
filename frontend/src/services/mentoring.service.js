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
  },

  /**
   * Mendapatkan detail sesi mentoring berdasarkan ID.
   * GET /api/mentoring/sessions/{id}
   */
  async getSessionById(id) {
    try {
      const response = await api.get(`/mentoring/sessions/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil detail sesi mentoring.'
    }
  },

  /**
   * Memperbarui status sesi mentoring (misal: disetujui, ditolak, selesai).
   * PATCH /api/mentoring/sessions/{id}/status
   */
  async updateSessionStatus(id, status) {
    try {
      const response = await api.patch(`/mentoring/sessions/${id}/status`, { status })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui status sesi.'
    }
  },

  /**
   * Memperbarui tautan meeting atau rincian jadwal sesi mentoring.
   * PATCH /api/mentoring/sessions/{id}/update-details
   */
  async updateSessionDetails(id, payload) {
    try {
      const response = await api.patch(`/mentoring/sessions/${id}/update-details`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui detail sesi.'
    }
  },

  /**
   * Memberikan ulasan/feedback untuk sesi mentoring yang selesai.
   * POST /api/mentoring/sessions/{id}/feedback
   */
  async submitSessionFeedback(id, payload) {
    try {
      const response = await api.post(`/mentoring/sessions/${id}/feedback`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengirimkan feedback.'
    }
  },

  /**
   * Mendapatkan ulasan/reviews yang diterima tutor.
   * GET /api/tutor/reviews
   */
  async getTutorReviews() {
    try {
      const response = await api.get('/tutor/reviews')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data review.'
    }
  },

  /**
   * Mendapatkan jadwal/ketersediaan tutor.
   * GET /api/tutor/schedule
   */
  async getTutorSchedule() {
    try {
      const response = await api.get('/tutor/schedule')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil jadwal tutor.'
    }
  },

  /**
   * Menyimpan/memperbarui jadwal/ketersediaan tutor.
   * POST /api/tutor/schedule
   */
  async createTutorSchedule(payload) {
    try {
      const response = await api.post('/tutor/schedule', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menyimpan jadwal tutor.'
    }
  }
}
