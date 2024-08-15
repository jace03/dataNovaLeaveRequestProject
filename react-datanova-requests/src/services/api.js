import axios from 'axios';


const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // Adjust this to match your Laravel API URL
});

export const getLeaveRequests = () => api.get('/leave-requests');
export const createLeaveRequest = (data) => api.post('/leave-requests', data);
export const updateLeaveRequest = (id, data) => api.put(`/leave-requests/${id}`, data);
export const deleteLeaveRequest = (id) => api.delete(`/leave-requests/${id}`);
