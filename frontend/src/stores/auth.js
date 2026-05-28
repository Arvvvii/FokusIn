import { defineStore } from 'pinia'
import { authService } from '@/services/auth.service'
// Import api if you want to use the real API
// import api from '@/services/api' 

export const useAuthStore = defineStore('auth', {
  state: () => ({
    user: null,
    token: null,
    isAuthenticated: false,
    loading: false,
    error: null
  }),

  getters: {
    role: (state) => state.user?.role || null,
  },

  actions: {
    // 1. Initialize session on app load
    initSession() {
      const storedToken = localStorage.getItem('fokusin_token')
      const storedUser = localStorage.getItem('fokusin_user')

      if (storedToken && storedUser) {
        this.token = storedToken
        this.user = JSON.parse(storedUser)
        this.isAuthenticated = true
      }
    },

    // 2. Login
    async login(email, password) {
      this.loading = true
      this.error = null
      
      try {
        const response = await authService.login(email, password)
        
        this.token = response.token
        this.user = response.user
        this.isAuthenticated = true
        
        // Persist session
        localStorage.setItem('fokusin_token', this.token)
        localStorage.setItem('fokusin_user', JSON.stringify(this.user))
        
        return response.user
      } catch (err) {
        this.error = err.message || 'Login gagal'
        this.isAuthenticated = false
        throw err
      } finally {
        this.loading = false
      }
    },

    // 3. Register
    async register(userData) {
      this.loading = true
      this.error = null

      try {
        const response = await authService.register(userData)
        
        this.token = response.token
        this.user = response.user
        this.isAuthenticated = true
        
        // Persist session
        localStorage.setItem('fokusin_token', this.token)
        localStorage.setItem('fokusin_user', JSON.stringify(this.user))
        
        return response.user
      } catch (err) {
        this.error = err.message || 'Registrasi gagal'
        throw err
      } finally {
        this.loading = false
      }
    },

    // 4. Logout
    async logout() {
      try {
        await authService.logout()
      } catch (e) {
        console.error('Logout error', e)
      } finally {
        this.token = null
        this.user = null
        this.isAuthenticated = false
        
        localStorage.removeItem('fokusin_token')
        localStorage.removeItem('fokusin_user')
      }
    }
  }
})
