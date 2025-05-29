import axios from 'axios'

const api = axios.create({
  baseURL: 'http://localhost:8000/api', // Adjust as needed
  withCredentials: true,
  headers: {
    'Content-Type': 'application/json'
  },
 // ⚠️ Important to avoid CSRF 419 errors
})
api.defaults.withCredentials = true;
api.defaults.withXSRFToken = true;
export default api