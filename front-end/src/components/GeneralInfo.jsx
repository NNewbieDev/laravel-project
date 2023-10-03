import {
  faChartColumn,
  faFile,
  faHeart,
  faUserGroup,
} from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useEffect, useRef, useState } from "react";
import { useStateContext } from "../context/ContextProvider";
import Profile from "../pages/Profile";
import { Link, useNavigate } from "react-router-dom";
import { authApi, endpoints } from "../config/Apis";

const GeneralInfo = () => {
  const [username, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const { user, dispatch } = useStateContext();
  const [avatarURL, setAvatarURL] = useState("");
  const avatar = useRef();
  const nav = useNavigate();
  const [password, setPassword] = useState({
    current: "",
    newPass: "",
    confirm: "",
  });

  useEffect(() => {
    if (user !== null) {
      setUsername(user.username);
      setEmail(user.email);
      setPhone(user.phone);
    }
  }, []);

  const change = (e, field) => {
    setPassword((current) => {
      return { ...current, [field]: e.target.value };
    });
  };

  const updateInfo = (e) => {
    e.preventDefault();
    const implement = async () => {
      const form = new FormData();
      form.append("_method", "PUT");
      form.append("email", email);
      form.append("phone", phone);
      form.append("avatar", avatar.current.files[0]);
      //   console.log(form);
      try {
        const res = await authApi().post(endpoints["update"], form);
        console.log(res.status);
        if (res.status === 200) {
          dispatch({ type: "logout" });
          nav("/login");
        }
      } catch (err) {}
    };
    implement();
  };

  const updatePass = (e) => {
    e.preventDefault();
    if (password.confirm === password.newPass) {
      const implement = async () => {
        const form = new FormData();
        form.append("_method", "PUT");
        form.append("newPass", password.newPass);
        try {
          const res = await authApi().post(endpoints["update-pass"], form);
          if (res.status === 200) {
            dispatch({ type: "logout" });
            nav("/login");
          }
        } catch (err) {}
      };
      implement();
    }
  };
  //
  if (user === null) {
    return (
      <Profile>
        <div className="mt-24 sm:w-3/4 h-96 mx-auto flex justify-center items-center bg-slate-200 rounded-md">
          <Link
            to={"/login"}
            className="bg-blue-600 px-5 py-3 text-white rounded-lg cursor-pointer hover:text-blue-600 hover:bg-white hover:outline hover:outline-blue-600 text-lg font-semibold transition duration-500"
          >
            Vui lòng đăng nhập
          </Link>
        </div>
      </Profile>
    );
  }
  return (
    <Profile>
      {/* other */}
      <div className="mt-8 mx-auto md:w-2/3 flex flex-col gap-5 sm:flex-row flex-wrap sm:justify-evenly">
        <div className="flex gap-5 border border-slate-400 p-3 rounded-lg ">
          <div className="bg-green-100 text-green-400 text-3xl rounded-lg w-20 h-20 flex items-center justify-center">
            <FontAwesomeIcon icon={faUserGroup} />
          </div>
          <div className="flex flex-col justify-center pr-5 text-neutral-800 font-semibold text-2xl">
            <div className="">124K</div>
            <div className="">Lượt xem </div>
          </div>
        </div>
        {/*  */}
        <div className="flex gap-5 border border-slate-400 p-3 rounded-lg ">
          <div className="bg-blue-100 text-blue-400 text-3xl rounded-lg w-20 h-20 flex items-center justify-center">
            <FontAwesomeIcon icon={faFile} />
          </div>
          <div className="flex flex-col justify-center pr-5 text-neutral-800 font-semibold text-2xl">
            <div className="">124</div>
            <div className="">Bài viết</div>
          </div>
        </div>
        {/*  */}
        <div className="flex gap-5 border border-slate-400 p-3 rounded-lg ">
          <div className="bg-pink-100 text-pink-400 text-3xl rounded-lg w-20 h-20 flex items-center justify-center">
            <FontAwesomeIcon icon={faHeart} />
          </div>
          <div className="flex flex-col justify-center pr-5 text-neutral-800 font-semibold text-2xl">
            <div className="">100</div>
            <div className="">Lượt thích </div>
          </div>
        </div>
        {/*  */}
        <div className="flex gap-5 border border-slate-400 p-3 rounded-lg ">
          <div className="bg-sky-100 text-sky-400 text-3xl rounded-lg w-20 h-20 flex items-center justify-center">
            <FontAwesomeIcon icon={faChartColumn} />
          </div>
          <div className="flex flex-col justify-center pr-5 text-neutral-800 font-semibold text-2xl">
            <div className="">10k</div>
            <div className="">Follewers </div>
          </div>
        </div>
      </div>
      {/* info */}
      <form
        onSubmit={(e) => updateInfo(e)}
        className="mt-8 mx-auto md:w-2/3 border border-slate-400 rounded-md "
      >
        <div className="border-b border-slate-400 text-xl font-semibold p-4">
          Profile
        </div>
        <div className="p-3 flex flex-col gap-4">
          <div className="flex flex-col gap-2">
            <label htmlFor="username">Tên người dùng</label>
            <input
              type="text"
              name="username"
              id="username"
              value={username}
              onChange={(e) => setUsername(e.target.value)}
              className="border py-1 px-3  rounded-md border-slate-400"
              disabled
            />
          </div>
          <div className="">
            <div className="mb-2">Avatar</div>
            <div className="">
              <label
                htmlFor="avatar"
                className="w-24 h-24 flex justify-center items-center"
              >
                <img
                  src={avatarURL || user.avatar}
                  alt="avatar"
                  className="border border-slate-400 p-1 w-full h-full  cursor-pointer rounded-full "
                />
              </label>
            </div>
            <input
              ref={avatar}
              type="file"
              onChange={(e) => {
                //       const reader = new FileReader();
                //       console.log(reader.readAsDataURL(e.target.files[0]));
                if (e.target.files || e.target.files[0])
                  setAvatarURL(URL.createObjectURL(e.target.files[0]));
              }}
              name="avatat"
              id="avatar"
              className="hidden"
            />
          </div>
          <div className="flex flex-col gap-2">
            <label htmlFor="email">Email</label>
            <input
              type="email"
              name="email"
              id="email"
              value={email || ""}
              onChange={(e) => setEmail(e.target.value)}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div>
          <div className="flex flex-col gap-2">
            <label htmlFor="phone">Số điện thoại</label>
            <input
              type="text"
              name="phone"
              id="phone"
              max={12}
              value={phone || ""}
              onChange={(e) => setPhone(e.target.value)}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div>
          <div className="flex justify-end">
            <input
              type="submit"
              value={"Lưu thay đổi"}
              className="text-right cursor-pointer mr-4 mt-4 px-8 py-3 rounded-lg text-lg font-semibold bg-blue-400 text-white"
            />
          </div>
        </div>
      </form>
      {/* update password */}
      <form
        onSubmit={(e) => updatePass(e)}
        className="mt-8 mx-auto md:w-2/3 border border-slate-400 rounded-md "
      >
        <div className="border-b border-slate-400 text-xl font-semibold p-4">
          Cập nhật mật khẩu
        </div>
        <div className="p-3 flex flex-col gap-4">
          {/* <div className="flex flex-col gap-2">
            <label htmlFor="current-pass">Mật khẩu hiện tại</label>
            <input
              type="password"
              name="current-pass"
              id="current-pass"
              value={password.current || ""}
              onChange={(e) => change(e, "current")}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div> */}
          <div className="flex flex-col gap-2">
            <label htmlFor="new-pass">Mật khẩu mới</label>
            <input
              type="password"
              name="new-pass"
              id="new-pass"
              value={password.newPass || ""}
              onChange={(e) => change(e, "newPass")}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div>
          <div className="flex flex-col gap-2">
            <label htmlFor="confirm-pass">Xác nhận mật khẩu</label>
            <input
              type="password"
              name="cònirm-pass"
              id="confirm-pass"
              value={password.confirm || ""}
              onChange={(e) => change(e, "confirm")}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div>
          <div className="flex justify-end">
            <input
              type="submit"
              value={"Cập nhật"}
              className="text-right cursor-pointer mr-4 mt-4 px-8 py-3 rounded-lg text-lg font-semibold bg-blue-400 text-white"
            />
          </div>
        </div>
      </form>
    </Profile>
  );
};

export default GeneralInfo;
