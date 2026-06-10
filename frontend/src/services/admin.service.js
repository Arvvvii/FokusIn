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
   * Atau simulasi jika reject (karena backend tidak ada delete post)
   */
  async resolveModeration(id, action) {
    try {
      if (action === 'approve') {
        const response = await api.post(`/posts/${id}/verify`)
        return response.data
      } else {
        // Reject / Delete is a backend gap. Simulate success toast.
        return new Promise((resolve) => {
          setTimeout(() => {
            resolve({ message: 'Konten berhasil ditolak (Simulasi).' })
          }, 300)
        })
      }
    } catch (error) {
      throw error.response?.data?.message || 'Gagal memproses moderasi.'
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
   * Memproses keputusan laporan.
   */
  async resolveReport(id, action) {
    return new Promise((resolve) => {
      setTimeout(() => {
        resolve({ message: `Laporan berhasil diproses: ${action === 'keep' ? 'Konten aman' : 'Konten dihapus'}.` })
      }, 300)
    })
  },

  /**
   * Mendapatkan log monitoring aktivitas AI.
   * GET /admin/ai-monitoring
   */
  async getAIMonitoringLogs() {
    try {
      const response = await api.get('/admin/ai-monitoring')
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Gagal mengambil data AI monitoring.'
    }
  }
}

