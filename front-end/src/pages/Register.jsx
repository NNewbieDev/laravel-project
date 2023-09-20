import React from "react";
import { Link } from "react-router-dom";

const Register = () => {
  return (
    <div className="flex justify-center items-center my-4">
      <form className="w-[80%] sm:max-w-2xl bg-gray-form p-12 rounded-md">
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
            required
            placeholder="Tên đăng nhập"
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
            required
            placeholder="Email"
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
