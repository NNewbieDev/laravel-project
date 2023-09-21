import React, { useRef, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import Apis, { endpoints } from "../config/Apis";

const Register = () => {
  const [user, setUser] = useState({
    username: "",
    password: "",
    email: "",
    phone: "",
    confirmPass: "",
  });
  const avatar = useRef();
  const nav = useNavigate();

  const register = (e) => {
    e.preventDefault();

    const process = async () => {
      let form = new FormData();

      for (let field in user) if (field !== "") form.append(field, user[field]);

      //       form.append("avatar", avatar.current.files[0]);

      let res = await Apis.post(endpoints["register"], form);
      console.log(res.data);
      if (res.status === 201) {
        nav("/login");
      }
    };

    if (user.password === user.confirmPass) process();
  };

  const change = (e, field) => {
    setUser((current) => {
      return { ...current, [field]: e.target.value };
    });
  };

  return (
    <div className="flex justify-center items-center my-4">
      <form
        onSubmit={register}
        className="w-[80%] sm:max-w-2xl bg-gray-form p-12 rounded-md"
      >
        <div className="text-3xl font-semibold mb-8">Tạo tài khoản</div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="username" className="">
            Tên đăng nhập
          </label>
          <input
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="text"
            name="username"
            id="username"
            value={user.username}
            required
            placeholder="Tên đăng nhập"
            onChange={(e) => change(e, "username")}
          />
        </div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="email" className="">
            Email
          </label>
          <input
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="text"
            name="email"
            id="email"
            value={user.email}
            required
            placeholder="Email"
            onChange={(e) => change(e, "email")}
          />
        </div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="phone" className="">
            Số điện thoại
          </label>
          <input
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="text"
            name="phone"
            id="phone"
            placeholder="+08xxxxx"
          />
        </div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="password">Mật khẩu</label>
          <input
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="password"
            name="password"
            id="password"
            required
            placeholder="*****"
          />
        </div>
        <div className="flex flex-col my-4 text-gray-600">
          <label htmlFor="confirm">Xác nhận mật khẩu</label>
          <input
            className="rounded-md py-2 px-4 my-2 italic focus-within:outline"
            type="password"
            name="confirm"
            id="confirm"
            required
            placeholder="*****"
          />
        </div>
        {/* <div className="flex flex-col my-4 text-gray-600">
          <input type="file" ref={avatar} />
        </div> */}
        <div className="flex flex-col sm:flex-row sm:items-center justify-between">
          <div className="">
            <input
              className="bg-green-btn text-white font-semibold px-14 py-3 rounded-md my-4 cursor-pointer hover:bg-green-700 transition-colors duration-300"
              type="submit"
              value={"Đăng ký"}
            />
          </div>
          <div className="">
            Đã có tài khoản
            <Link to={"/login"} className="text-blue-800 ml-2 underline">
              Đăng nhập
            </Link>
          </div>
        </div>
      </form>
    </div>
  );
};

export default Register;
