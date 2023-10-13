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
  "accept-article": (id) => `/api/article/${id}/accept`,
  "article-id": (id) => `/api/article/${id}`,
  "article-wait": "/api/article/wait",
  "article-all": "/api/article/all",
  "article-all-comment": "/api/article/all/comment",
  "article-all-report": "/api/article/all/report",
  "article-all-view": "/api/article/all/view",
  "user-sent": "/api/auth/user/sent",
  "user-getAll": "/api/auth/user/get",
  "user-send": "/api/auth/send",
  "user-reject": (id) => `/api/auth/${id}/cancel`,
  "role-up": (id) => `/api/auth/${id}/role-up`,
  "role-down": (id) => `/api/auth/${id}/role-down`,
  "user-delete": (id) => `/api/auth/${id}/delete`,
  search: "/api/search",
  articleByCate: (id) => `/api/article/category/${id}`,
  comments: (id) => `/api/article/${id}/comment`,
  addRatings: (id) => `/api/rating/${id}/add`,
  getRatings: (id) => `/api/rating/${id}/get`,
  addReport: (id) => `/api/report/${id}/add`,
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
