import api from './api'

export const adminService = {
  /**
   * Mendapatkan daftar pengguna.
   * GET /users
   *
   * Note: Frontend will consume the paginated payload and use response.data.data as the primary dataset while preserving future pagination support.
   */
  async getUsers() {
    try {
      const response = await api.get('/users')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data pengguna.'
    }
  },

  // Alias for backward compatibility
  async getAdminUsers() {
    return this.getUsers()
  },

  /**
   * Membuat pengguna baru.
   * POST /users
   */
  async createUser(payload) {
    try {
      // Validate and adjust payload structure
      const response = await api.post('/users', {
        name: payload.name,
        email: payload.email,
        role: payload.role ? payload.role.toLowerCase() : 'pelajar',
        status: payload.status || 'Active',
        password: payload.password
      })
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal membuat pengguna.'
    }
  },

  // Alias for backward compatibility
  async createAdminUser(payload) {
    return this.createUser(payload)
  },

  /**
   * Memperbarui data pengguna.
   * PUT /admin/users/{id}
   */
  async updateUser(id, payload) {
    try {
      const response = await api.put(`/admin/users/${id}`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui data pengguna.'
    }
  },

  // Alias for backward compatibility
  async updateAdminUser(id, payload) {
    return this.updateUser(id, payload)
  },

  /**
   * Menghapus pengguna.
   * DELETE /admin/users/{id}
   */
  async deleteUser(id) {
    try {
      const response = await api.delete(`/admin/users/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menghapus pengguna.'
    }
  },

  // Alias for backward compatibility
  async deleteAdminUser(id) {
    return this.deleteUser(id)
  },

  /**
   * Mendapatkan antrean moderasi forum.
   * GET /admin/moderation
   */
  async getModerationQueue() {
    try {
      const response = await api.get('/admin/moderation')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil antrean moderasi.'
    }
  },

  /**
   * Memproses keputusan moderasi.
   * POST /posts/{id}/verify (untuk approve)
   * DELETE /admin/moderation/posts/{id} (untuk reject)
   */
  async resolveModeration(id, action) {
    try {
      if (action === 'approve') {
        const response = await api.post(`/posts/${id}/verify`)
        return response.data
      } else {
        const response = await api.delete(`/admin/moderation/posts/${id}`)
        return response.data
      }
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memproses moderasi.'
    }
  },

  /**
   * Menghapus postingan sebagai keputusan moderasi reject (alias jika dibutuhkan).
   * DELETE /admin/moderation/posts/{id}
   */
  async deleteModerationPost(id) {
    try {
      const response = await api.delete(`/admin/moderation/posts/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal menolak postingan.'
    }
  },

  /**
   * Mendapatkan laporan postingan forum.
   * GET /admin/reports
   */
  async getReports() {
    try {
      const response = await api.get('/admin/reports')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil laporan.'
    }
  },

  /**
   * Membuat laporan baru.
   * POST /reports
   */
  async submitReport(payload) {
    try {
      const response = await api.post('/reports', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengirimkan laporan.'
    }
  },

  /**
   * Memproses keputusan laporan.
   * PATCH /admin/reports/{id}/resolve
   */
  async resolveReport(id) {
    try {
      const response = await api.patch(`/admin/reports/${id}/resolve`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memproses keputusan laporan.'
    }
  },

  /**
   * Mendapatkan data dashboard admin.
   * GET /admin/dashboard
   */
  async getAdminDashboard() {
    try {
      const response = await api.get('/admin/dashboard')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data dashboard admin.'
    }
  },

  /**
   * Mendapatkan data AI monitoring.
   * GET /admin/ai-monitoring
   */
  async getAIMonitoring() {
    try {
      const response = await api.get('/admin/ai-monitoring')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data AI monitoring.'
    }
  },

  /**
   * Mendapatkan log monitoring aktivitas AI (alias).
   * GET /admin/ai-monitoring
   */
  async getAIMonitoringLogs() {
    return this.getAIMonitoring()
  },

  /**
   * Mendapatkan daftar tutor.
   * GET /admin/tutors
   */
  async getTutors() {
    try {
      const response = await api.get('/admin/tutors')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil daftar tutor.'
    }
  },

  /**
   * Membuat tutor baru.
   * POST /admin/tutors
   */
  async createTutor(payload) {
    try {
      const response = await api.post('/admin/tutors', payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal membuat tutor baru.'
    }
  },

  /**
   * Mendapatkan detail tutor.
   * GET /admin/tutors/{id}
   */
  async getTutorDetail(id) {
    try {
      const response = await api.get(`/admin/tutors/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil detail tutor.'
    }
  },

  /**
   * Mendapatkan daftar mentoring.
   * GET /admin/mentoring
   */
  async getAdminMentoring() {
    try {
      const response = await api.get('/admin/mentoring')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil daftar mentoring.'
    }
  },

  /**
   * Mendapatkan detail mentoring.
   * GET /admin/mentoring/{id}
   */
  async getAdminMentoringDetail(id) {
    try {
      const response = await api.get(`/admin/mentoring/${id}`)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil detail mentoring.'
    }
  },

  /**
   * Memperbarui status mentoring.
   * PATCH /admin/mentoring/{id}/status
   */
  async updateAdminMentoringStatus(id, payload) {
    try {
      const response = await api.patch(`/admin/mentoring/${id}/status`, payload)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memperbarui status mentoring.'
    }
  },

  /**
   * Mendapatkan timeline analitik admin.
   * GET /admin/analytics/timeline
   */
  async getAdminAnalyticsTimeline() {
    try {
      const response = await api.get('/admin/analytics/timeline')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data timeline analitik admin.'
    }
  }
}


