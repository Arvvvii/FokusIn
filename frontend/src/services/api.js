import axios from 'axios'

const api = axios.create({
  baseURL: import.meta.env.VITE_API_URL || 'http://localhost:3000/api',
  timeout: 10000,
  headers: {
    'Content-Type': 'application/json'
  }
})

// Request Interceptor: Attach token if available
api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('fokusin_token')
    if (token) {
      config.headers.Authorization = `Bearer ${token}`
    }
    
    // Hapus Content-Type jika data adalah FormData agar browser men-generate boundary secara otomatis
    if (config.data instanceof FormData) {
      delete config.headers['Content-Type']
    }
    
    return config
  },
  (error) => {
    return Promise.reject(error)
  }
)

// Response Interceptor: Handle 401 Unauthorized
api.interceptors.response.use(
  (response) => response,
  (error) => {
    if (error.response && error.response.status === 401) {
      // Token is invalid or expired
      localStorage.removeItem('fokusin_token')
      localStorage.removeItem('fokusin_user')
      window.location.href = '/auth/login'
    }
    return Promise.reject(error)
  }
)

export default api
