import axios from 'axios';

const api = axios.create({
    baseURL: '/api',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
    },
    timeout: 15000,
});

// ── Request Interceptor ─────────────────────────────────────────────
api.interceptors.request.use(
    (config) => {
        const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (token) {
            config.headers['X-CSRF-TOKEN'] = token;
        }
        return config;
    },
    (error) => Promise.reject(error)
);

// ── Response Interceptor ────────────────────────────────────────────
api.interceptors.response.use(
    (response) => response.data, // Unwrap to { success, data, message }
    (error) => {
        const message =
            error.response?.data?.message ||
            error.message ||
            'Terjadi kesalahan pada server.';

        console.error('[API Error]', message);
        return Promise.reject({ message, errors: error.response?.data?.errors || {} });
    }
);

// ── Profile Endpoint ────────────────────────────────────────────────
export const profileApi = {
    get: () => api.get('/profile'),
};

// ── Skills Endpoint ─────────────────────────────────────────────────
export const skillsApi = {
    getAll: (params) => api.get('/skills', { params }),
};

// ── Portfolio Endpoints ─────────────────────────────────────────────
export const portfolioApi = {
    getAll:   (params) => api.get('/portfolios', { params }),
    getOne:   (id)     => api.get(`/portfolios/${id}`),
    create:   (data)   => api.post('/portfolios', data),
    update:   (id, data) => api.put(`/portfolios/${id}`, data),
    delete:   (id)     => api.delete(`/portfolios/${id}`),
};

// ── Blog Endpoints ──────────────────────────────────────────────────
export const blogApi = {
    getAll:   (params) => api.get('/blogs', { params }),
    getOne:   (id)     => api.get(`/blogs/${id}`),
    create:   (data)   => api.post('/blogs', data),
    update:   (id, data) => api.put(`/blogs/${id}`, data),
    delete:   (id)     => api.delete(`/blogs/${id}`),
};

// ── Contact Endpoint ────────────────────────────────────────────────
export const contactApi = {
    send: (data) => api.post('/contact', data),
};

export default api;
