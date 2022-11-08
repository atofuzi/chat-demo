import axios from "axios";

axios.defaults.baseURL = process.env.VUE_APP_API_URL;
axios.defaults.withCredentials = true;

// ヘッダー情報設定
axios.defaults.headers.common = {
  'Authorization': 'Bearer ' + localStorage.getItem('access_token'),
  'X-Requested-With': 'XMLHttpRequest'
}

export default axios;