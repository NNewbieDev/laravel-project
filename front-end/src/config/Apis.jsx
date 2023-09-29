import axios from "axios";
import cookie from "react-cookies";

const SERVER = "http://localhost:8000";

export const endpoints = {
  login: "/api/auth/login",
  user: "/api/auth/user",
  register: "/api/register",
  article: "/api/article",
  category: "/api/category",
<<<<<<< HEAD
  create: "/api/article/create",
  detail: (id) => "/api/article/{id}",
=======
  detail: (id) => `/api/article/${id}`,
>>>>>>> b3e4b3a7415186a2bee9fb5963f65fb682737683
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
