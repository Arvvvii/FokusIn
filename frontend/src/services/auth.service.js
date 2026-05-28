/**
 * Auth Service (Real API Integration)
 * Menghubungkan frontend dengan API Laravel di Railway
 */
import api from './api' // Import instance axios yang sudah kamu buat

export const authService = {
  // Login ke server asli
  async login(email, password) {
    try {
      const response = await api.post('/auth/login', { email, password })
      
      // Simpan token dan data user dari response Laravel
      if (response.data.token) {
        localStorage.setItem('fokusin_token', response.data.token)
        localStorage.setItem('fokusin_user', JSON.stringify(response.data.user))
      }
      return response.data
    } catch (error) {
      // Mengambil pesan error dari Laravel jika ada
      throw error.response?.data?.message || 'Login gagal, silakan coba lagi.'
    }
  },

  // Register ke server asli
  async register(data) {
    try {
      const response = await api.post('/auth/register', data)
      return response.data
    } catch (error) {
      throw error.response?.data?.message || 'Registrasi gagal.'
    }
  },

  // Logout (panggil endpoint logout jika ada di Laravel)
  async logout() {
    try {
      await api.post('/auth/logout')
    } finally {
      // Selalu hapus token dari local storage apapun hasil request-nya
      localStorage.removeItem('fokusin_token')
      localStorage.removeItem('fokusin_user')
    }
  },

  // Ambil profil user yang sedang login dari server
  async fetchUser() {
    try {
      const response = await api.get('/auth/user')
      localStorage.setItem('fokusin_user', JSON.stringify(response.data))
      return response.data
    } catch (error) {
      localStorage.removeItem('fokusin_token')
      localStorage.removeItem('fokusin_user')
      throw error
    }
  }
}