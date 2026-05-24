/**
 * Mock Auth Service
 * Di lingkungan produksi, integrasikan fungsi-fungsi ini dengan `api` axios dari ./api.js
 */

export const authService = {
  async login(email, password) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        // Mock validation
        if (!email || !password) {
          return reject(new Error('Email dan kata sandi harus diisi.'))
        }

        // Mock failure scenario (misal email salah)
        if (password.length < 6) {
          return reject(new Error('Kata sandi minimal 6 karakter.'))
        }

        if (email === 'admin@fokusin.com') {
          return resolve({
            token: 'mock-jwt-admin-token-12345',
            user: { id: 1, name: 'Admin Pusat', email, role: 'admin' }
          })
        }

        if (email.includes('tutor')) {
          return resolve({
            token: 'mock-jwt-tutor-token-12345',
            user: { id: 2, name: 'Tutor Pengajar', email, role: 'tutor' }
          })
        }

        if (!email.includes('@')) {
          return reject(new Error('Format email tidak valid.'))
        }

        // Default: Pelajar
        resolve({
          token: 'mock-jwt-pelajar-token-12345',
          user: { id: 3, name: 'Pelajar Mahasiswa', email, role: 'pelajar' }
        })
      }, 1000) // Simulate network delay
    })
  },

  async register(data) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        if (!data.email || !data.password || !data.role) {
          return reject(new Error('Semua kolom wajib diisi.'))
        }
        
        resolve({
          token: `mock-jwt-${data.role}-token-new`,
          user: { 
            id: Math.floor(Math.random() * 1000), 
            name: data.fullName, 
            email: data.email, 
            role: data.role 
          }
        })
      }, 1200)
    })
  },

  async logout() {
    return new Promise((resolve) => {
      setTimeout(() => {
        resolve({ success: true })
      }, 500)
    })
  },

  async fetchUser(token) {
    return new Promise((resolve, reject) => {
      setTimeout(() => {
        if (!token) return reject(new Error('No token'))
        
        // Mock based on token string for demo purposes
        let role = 'pelajar'
        if (token.includes('admin')) role = 'admin'
        if (token.includes('tutor')) role = 'tutor'

        resolve({
          id: 1,
          name: 'Current User',
          email: `user@${role}.com`,
          role: role
        })
      }, 500)
    })
  }
}
