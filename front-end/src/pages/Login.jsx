import React, { useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";
import Apis, { authApi, endpoints } from "../config/Apis";
import cookie from "react-cookies";
const Login = () => {
  const { dispatch } = useStateContext();
  const [username, setUsername] = useState("");
  const [password, setPassword] = useState("");
  const nav = useNavigate();

  const login = (evt) => {
    evt.preventDefault();

    const process = async () => {
      try {
        let res = await Apis.post(endpoints["login"], {
          username: username,
          password: password,
        });
        cookie.save("token", res.data.token_type + " " + res.data.access_token);

        let { data } = await authApi().get(endpoints["user"]);
        cookie.save("user", data);

        dispatch({
          type: "login",
          payload: data,
        });
        if (res.status === 200) {
          nav("/");
        }
      } catch (err) {
        console.error(err);
      }
    };
    process();
  };

  return (
    <div className="flex justify-center items-center my-4">
      <form
        onSubmit={login}
        className="w-[80%] sm:max-w-2xl bg-gray-form p-12 rounded-md"
      >
        <div className="text-3xl font-semibold mb-8">Đăng nhập</div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="username" className="">
            Tên đăng nhập
          </label>
          <input
            onChange={(e) => setUsername(e.target.value)}
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="text"
            name="username"
            id="username"
            value={username}
            required
            placeholder="Tên đăng nhập"
          />
        </div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="password">Mật khẩu</label>
          <input
            onChange={(e) => setPassword(e.target.value)}
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="password"
            name="password"
            id="password"
            value={password}
            placeholder="*****"
            required
          />
        </div>
        <div className="flex gap-4">
          <input
            type="checkbox"
            id="keep-login"
            className="outline-none bg-gray-300"
          />
          <label htmlFor="keep-login">Ghi nhớ đăng nhập</label>
        </div>
        <div className="flex flex-col sm:flex-row sm:items-center justify-between">
          <div className="">
            <input
              className="bg-green-btn text-white font-semibold px-10 py-3 rounded-md my-4 cursor-pointer hover:bg-green-700 transition-colors duration-300"
              type="submit"
              value={"Đăng nhập"}
            />
          </div>
          <div className="">
            Bạn chưa có tài khoản?
            <Link to={"/register"} className="text-blue-800 ml-2 underline">
              Đăng ký
            </Link>
          </div>
        </div>
      </form>
    </div>
  );
};

export default Login;
