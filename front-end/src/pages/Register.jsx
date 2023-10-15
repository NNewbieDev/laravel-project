import React, { useRef, useState } from "react";
import { Link, useNavigate } from "react-router-dom";
import Apis, { endpoints } from "../config/Apis";
import {
  faCheck,
  faTriangleExclamation,
  faWarning,
} from "@fortawesome/free-solid-svg-icons";
import { Toast } from "../components/warning";

const Register = () => {
  const [user, setUser] = useState({
    username: "",
    password: "",
    email: "",
    phone: "",
    confirmPass: "",
  });
  const [loading, setLoading] = useState(false);
  const avatar = useRef();
  const nav = useNavigate();
  const [toast, setToast] = useState(false);
  const [toastInfo, setToastInfo] = useState({
    icon: "",
    content: "",
    color: "",
  });
  const timeout = useRef();

  // hàm xử lý đăng ký
  const register = (e) => {
    e.preventDefault();

    const process = async () => {
      setLoading(true);
      let form = new FormData();

      for (let field in user) if (field !== "") form.append(field, user[field]);

      let res = await Apis.post(endpoints["register"], form);
      if (res.status === 201) {
        setToastInfo(() => {
          return {
            icon: faCheck,
            content: "Đăng ký thành công",
            color: "green-400",
          };
        });
        setToast(true);
        timeout.current = setTimeout(() => {
          clearTimeout(timeout.current);
          nav("/login");
        }, 1000);
      }
    };

    if (user.password === user.confirmPass) process();
    else {
      setToastInfo(() => {
        return {
          icon: faTriangleExclamation,
          content: "Kiểm tra lại thông tin",
          color: "orange-300",
        };
      });
      console.log(toastInfo);
      setToast(true);
    }
  };

  const change = (e, field) => {
    setLoading(false);
    setUser((current) => {
      return { ...current, [field]: e.target.value };
    });
  };

  return (
    <div className="flex justify-center items-center mb-4 mt-24">
      {toast && (
        <Toast
          icon={toastInfo.icon}
          content={toastInfo.content}
          Timeout={setToast}
          color={toastInfo.color}
        />
      )}
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
            value={user.password}
            onChange={(e) => change(e, "password")}
            //   minLength={8}
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
            value={user.confirmPass}
            onChange={(e) => change(e, "confirmPass")}
            //   minLength={8}
            required
            placeholder="*****"
          />
        </div>
        {/* <div className="flex flex-col my-4 text-gray-600">
          <input type="file" ref={avatar} />
        </div> */}
        <div className="flex flex-col sm:flex-row sm:items-center justify-between">
          <div className="">
            {loading ? (
              <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
            ) : (
              <input
                className="bg-green-btn text-white font-semibold px-14 py-3 rounded-md my-4 cursor-pointer hover:bg-green-700 transition-colors duration-300"
                type="submit"
                value={"Đăng ký"}
              />
            )}
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
