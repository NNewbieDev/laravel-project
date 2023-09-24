import axios from "axios";
import cookie from "react-cookies";

const SERVER = "http://localhost:8000";

export const endpoints = {
  login: "/api/auth/login",
  user: "/api/auth/user",
  register: "/api/register",
  article: "/api/article",
  category: "/api/category",
  detail: (id) => "/api/article/{id}",
};

export const authApi = () => {
  return axios.create({
    baseURL: SERVER,
    headers: {
      Authorization: cookie.load("token"),
    },
  });
};

export default axios.create({
  baseURL: SERVER,
});
