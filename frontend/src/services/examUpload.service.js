/**
 * Exam Upload Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel untuk Unggah, Detail, dan Validasi Arsip Ujian
 */
import api from './api'

export const examUploadService = {
  /**
   * Mendapatkan daftar arsip ujian terpaginasi.
   * GET /api/exam-uploads
   */
  async getExamUploads(params = {}) {
    try {
      const response = await api.get('/exam-uploads', { params })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data arsip ujian.'
    }
  },

  /**
   * Mendapatkan detail satu arsip ujian berdasarkan ID.
   * GET /api/exam-uploads/{id}
   */
  async getExamUploadById(id) {
    try {
      const response = await api.get(`/exam-uploads/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil detail arsip ujian.'
    }
  },

  /**
   * Memperbarui status validasi dan catatan arsip ujian.
   * PUT /api/exam-uploads/{id}
   */
  async updateExamUpload(id, payload) {
    try {
      const response = await api.put(`/exam-uploads/${id}`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui status validasi.'
    }
  },

  /**
   * Mengunggah arsip ujian baru.
   * POST /api/exam-uploads
   */
  async createExamUpload(formData, onUploadProgress) {
    const response = await api.post('/exam-uploads', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      },
      onUploadProgress
    })
    return response.data
  },

  /**
   * Menyimpan perubahan hasil teks OCR yang diekstrak.
   * PUT /exam-uploads/{id}/extracted-text
   */
  async updateExtractedText(id, payload) {
    try {
      const response = await api.put(`/exam-uploads/${id}/extracted-text`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menyimpan hasil edit teks OCR.'
    }
  }
}

