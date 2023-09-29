import React, { useEffect, useRef, useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faAddressCard,
  faBars,
  faCaretLeft,
  faDoorOpen,
  faGear,
  faHome,
  faPlusCircle,
  faRightToBracket,
  faUser,
} from "@fortawesome/free-solid-svg-icons";
import { Link } from "react-router-dom";
import { useStateContext } from "../../context/ContextProvider";
//

const Header = () => {
  const [active, setActive] = useState(false);
  const { user, dispatch } = useStateContext();
  const resize = useRef();
  const width = useRef();
  useEffect(() => {
    const load = () => {
      if (width.current > 640) {
        setActive(true);
      }
      if (width.current <= 630) {
        setActive(false);
      }
    };
    window.addEventListener("resize", () => {
      width.current = window.innerWidth;
      load();
    });
    window.addEventListener("load", () => {
      width.current = window.innerWidth;
      load();
    });
  }, [width.current]);

  const logout = () => {
    dispatch({ type: "logout" });
  };

  return (
    <div className="fixed top-0 left-0 right-0 h-20 bg-white z-40 border drop-shadow-lg flex items-center justify-between">
      <div className="px-10 py-2">
        <Link to={"/"}>
          <img src="/logo.png" alt="" className="w-20" />
        </Link>
      </div>
      {active && (
        <div className="absolute sm:relative transition duration-500 w-full sm:max-w-fit bg-white top-[100%] sm:top-0 sm:flex sm:px-10 flex-col sm:flex-row sm:items-center gap-3 z-40">
          <div className="group relative">
            <Link
              to={"/"}
              className="flex gap-2 hover:cursor-pointer px-3 py-2 hover:bg-neutral-200 rounded-lg"
            >
              <div className="">
                <FontAwesomeIcon icon={faHome} />
              </div>
              <div className="">Trang chủ</div>
            </Link>
          </div>
          {/*  */}
          <div className="group relative">
            <div className="flex gap-2 hover:cursor-pointer px-3 py-2 group-hover:bg-neutral-200 rounded-lg">
              <div className="">
                <FontAwesomeIcon icon={faGear} />
              </div>
              <div className="">Tiện ích</div>
            </div>
            {/*  */}
            <div className="group-hover:flex sm:rounded-lg flex-col rounded-lg sm:min-w-[300px] p-3 drop-shadow-xl sm:absolute hidden bg-white sm:top-10 sm:right-0">
              <Link
                to={"/create-post"}
                className="flex gap-2 hover:cursor-pointer px-10 py-2 hover:bg-neutral-200 rounded-lg"
              >
                <div className="">
                  <FontAwesomeIcon icon={faPlusCircle} />
                </div>
                <div className="">Tạo bài viết</div>
              </Link>
              <div className="flex gap-2 hover:cursor-pointer px-10 py-2 hover:bg-neutral-200 rounded-lg">
                <div className="">
                  <FontAwesomeIcon icon={faGear} />
                </div>
                <div className="">Các chức năng quản lý</div>
              </div>
            </div>
          </div>
          {/*  */}
          <div className="group relative">
            <div className="flex gap-2 hover:cursor-pointer px-3 py-2 group-hover:bg-neutral-200 rounded-lg">
              {user === null ? (
                <>
                  <div className="">
                    <FontAwesomeIcon icon={faUser} />
                  </div>
                  <div className="">Tài khoản</div>
                </>
              ) : (
                <>
                  <div className="flex gap-2 items-center">
                    <div className=" rounded-full border border-black flex justify-center items-center p-1">
                      <img
                        src={user.avatar}
                        alt="avatar"
                        className="rounded-full h-8 w-8"
                      />
                    </div>
                    <div className="">{user.username}</div>
                  </div>
                </>
              )}
            </div>
            {user === null ? (
              <div className="group-hover:flex sm:rounded-lg flex-col rounded-lg sm:min-w-[200px] p-3 drop-shadow-xl sm:absolute hidden bg-white sm:top-10 sm:right-0">
                <Link
                  to={"/login"}
                  className="flex gap-2 hover:cursor-pointer px-10 py-2 hover:bg-neutral-200 rounded-lg"
                >
                  <div className="">
                    <FontAwesomeIcon icon={faRightToBracket} />
                  </div>
                  <div className="">Đăng nhập</div>
                </Link>
                <Link
                  to={"/register"}
                  className="flex gap-2 hover:cursor-pointer px-10 py-2 hover:bg-neutral-200 rounded-lg"
                >
                  <div className="">
                    <FontAwesomeIcon icon={faAddressCard} />
                  </div>
                  <div className="">Đăng ký</div>
                </Link>
              </div>
            ) : (
              <div className="group-hover:flex sm:rounded-lg flex-col rounded-lg sm:min-w-[300px] p-3 drop-shadow-xl sm:absolute hidden bg-white sm:top-10 sm:right-0">
                <Link
                  to={"/profile"}
                  className="flex gap-2 hover:cursor-pointer px-10 py-2 hover:bg-neutral-200 rounded-lg"
                >
                  <div className="">
                    <FontAwesomeIcon icon={faUser} />
                  </div>
                  <div className="">Thông tin tài khoản</div>
                </Link>
                <div
                  onClick={logout}
                  className="flex gap-2 hover:cursor-pointer px-10 py-2 hover:bg-neutral-200 rounded-lg"
                >
                  <div className="">
                    <FontAwesomeIcon icon={faDoorOpen} />
                  </div>
                  <div className="">Đăng xuất</div>
                </div>
              </div>
            )}
          </div>
        </div>
      )}
      <div
        onClick={() => setActive((prev) => !prev)}
        className="px-10 py-2 flex sm:hidden items-center justify-center "
      >
        <FontAwesomeIcon
          icon={faBars}
          className="p-3 transition duration-500 text-2xl hover:cursor-pointer text-sky-500 hover:bg-slate-200 rounded-full"
        />
      </div>
    </div>
  );
};

export default Header;
