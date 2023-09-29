import React, { useEffect, useRef, useState } from "react";
import { useStateContext } from "../context/ContextProvider";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCalendar } from "@fortawesome/free-regular-svg-icons";
import {
  faChartBar,
  faChartColumn,
  faFile,
  faHeart,
  faUser,
  faUserGroup,
} from "@fortawesome/free-solid-svg-icons";

const Profile = () => {
  const { user } = useStateContext();

  const [username, setUsername] = useState("");
  const [email, setEmail] = useState("");
  const [phone, setPhone] = useState("");
  const [password, setPassword] = useState({
    current: "",
    new: "",
    confirm: "",
  });
  const [avatarURL, setAvatarURL] = useState("");
  const avatar = useRef();

  useEffect(() => {
    if (user !== null) {
      setUsername(user.username);
      setEmail(user.email);
      setPhone(user.phone);
    }
  }, []);

  const formatTime = (time) => {
    const d = new Date(time);
    const year = d.getFullYear();
    const month = d.getMonth() + 1;
    const day = d.getDate();
    return `${day}/${month}/${year}`;
  };

  const change = (e, field) => {
    setPassword((current) => {
      return { ...current, [field]: e.target.value };
    });
  };

  if (user === null) {
    return (
      <div className="animate-pulse">
        <div className="bg-blue-400 w-full h-40 rounded-lg"></div>
        <div className="-translate-y-5">
          <div className="flex justify-center">
            <div className="w-14 h-14 bg-slate-400 border rounded-full "></div>
          </div>
          <div className="text-center">Loading...</div>
        </div>
      </div>
    );
  }

  return (
    <div className="p-4 mt-24">
      {/* thumnail */}
      <div className="lg:w-3/4 lg:mx-auto">
        <div className="bg-blue-400 w-full h-40 md:h-52 rounded-lg"></div>
        <div className="-translate-y-5 md:-translate-y-7 flex flex-col md:flex-row items-center md:justify-between md:mx-10">
          <div className="flex flex-col md:flex-row items-center md:gap-20">
            <div className=" rounded-full ">
              <img
                src={
                  user.avatar === null
                    ? "data:image/png;base64,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"
                    : user.avatar
                }
                alt=""
                className="rounded-full w-20 h-20 md:w-32 md:h-32 p-1 bg-white"
              />
            </div>
            <div className="flex flex-col items-center md:items-start">
              <div className="font-semibold text-3xl">{user.username}</div>
              <div className="">
                <FontAwesomeIcon icon={faCalendar} className="mr-3" />
                Tham gia vào ngày {formatTime(user.created_at)}
              </div>
            </div>
          </div>
          <div className="flex justify-center gap-5 mt-4">
            <div className="bg-blue-400 hover:bg-blue-600 cursor-pointer text-white py-2 px-8 rounded-lg font-semibold text-lg">
              Theo dõi
            </div>
          </div>
        </div>
      </div>
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
      <form className="mt-8 mx-auto md:w-2/3 border border-slate-400 rounded-md ">
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
              value={phone || ""}
              onChange={(e) => setPhone(e.target.value)}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div>
          <div className="flex justify-end">
            <div className="text-right mr-4 mt-4 px-8 py-3 rounded-lg text-lg font-semibold bg-blue-400 text-white">
              Lưu thay đổi
            </div>
          </div>
        </div>
      </form>
      {/* update password */}
      <form className="mt-8 mx-auto md:w-2/3 border border-slate-400 rounded-md ">
        <div className="border-b border-slate-400 text-xl font-semibold p-4">
          Cập nhật mật khẩu
        </div>
        <div className="p-3 flex flex-col gap-4">
          <div className="flex flex-col gap-2">
            <label htmlFor="current-pass">Mật khẩu hiện tại</label>
            <input
              type="password"
              name="current-pass"
              id="current-pass"
              value={password.current || ""}
              onChange={(e) => change(e, "current")}
              className="border py-1 px-3  rounded-md border-slate-400"
            />
          </div>
          <div className="flex flex-col gap-2">
            <label htmlFor="new-pass">Mật khẩu mới</label>
            <input
              type="password"
              name="new-pass"
              id="new-pass"
              value={password.new || ""}
              onChange={(e) => change(e, "new")}
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
            <div className="text-right mr-4 mt-4 px-8 py-3 rounded-lg text-lg font-semibold bg-blue-400 text-white">
              cập nhật
            </div>
          </div>
        </div>
      </form>
    </div>
  );
};

export default Profile;
