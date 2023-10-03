import axios from "axios";
import cookie from "react-cookies";

const SERVER = "http://localhost:8000";

export const endpoints = {
  login: "/api/auth/login",
  user: "/api/auth/user",
  update: "/api/auth/update",
  "update-pass": "/api/auth/update/password",
  post: "/api/auth/user/article",
  register: "/api/register",
  article: "/api/article",
  category: "/api/category",
  create: "/api/article/create",
  detail: (id) => `/api/article/${id}`,
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
