import axios from "axios";


const service = axios.create({
  baseURL: process.env.BASE_URL,
  withCredentials: true
});


export const login = (userName, password) => {
  const body = {
    'grant_type': process.env.VUE_APP_AUTH_GRANT_TYPE, 
    'client_id': process.env.VUE_APP_AUTH_CLIENT_ID,
    'client_secret': process.env.VUE_APP_AUTH_CLIENT_SECRET,
    'username': userName,
    'password': password,
    'scope': '*'
  }  
  return service.post('oauth/token', body);
}

export const setAuthToLocalStorage = (auth) => {
  localStorage.setItem('expires_in', auth.expires_in);
  localStorage.setItem('access_token', auth.access_token);
  localStorage.setItem('refresh_token', auth.refresh_token);
}

