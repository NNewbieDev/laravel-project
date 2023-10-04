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
  "update-article": (id) => `/api/article/${id}/update`,
  "delete-article": (id) => `/api/article/${id}/delete`,
  "article-id": (id) => `/api/article/${id}`,
  "article-wait": "/api/article/wait",
  "user-sent": "/api/auth/user/sent",
  "user-delete": (id) => `/api/auth/${id}/delete`,
  "role-up": (id) => `/api/auth/${id}/role-up`,
  search: "/api/search",
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
