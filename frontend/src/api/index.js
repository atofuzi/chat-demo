import axios from "axios";

const service = axios.create({
  baseURL: 'http://localhost:8087/api/v1/',
  withCredentials: true
});

export default service;