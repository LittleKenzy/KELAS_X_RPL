import { useState, useEffect } from 'react';

/**
 * Custom hook untuk mengambil data dari API Laravel.
 *
 * @param {Function} apiFn  - Fungsi API yang mengembalikan Promise, misal: () => profileApi.get()
 * @param {Array}    deps   - Dependency array (opsional), mirip useEffect deps
 * @returns {{ data: any, loading: boolean, error: string|null, refetch: Function }}
 */
const useApi = (apiFn, deps = []) => {
    const [data, setData] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const fetchData = async () => {
        setLoading(true);
        setError(null);
        try {
            const response = await apiFn();
            setData(response.data);
        } catch (err) {
            console.error('[useApi]', err);
            setError(err.message || 'Gagal memuat data.');
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchData();
    }, deps);

    return { data, loading, error, refetch: fetchData };
};

export default useApi;
