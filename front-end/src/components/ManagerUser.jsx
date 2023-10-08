import React, { useEffect, useState } from "react";
import Manager from "../pages/Manager";
import Apis, { authApi, endpoints } from "../config/Apis";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faAngleLeft,
  faAngleRight,
  faAnglesDown,
  faAnglesUp,
  faXmark,
} from "@fortawesome/free-solid-svg-icons";
import { useStateContext } from "../context/ContextProvider";
import { useNavigate } from "react-router-dom";

const ManagerUser = () => {
  const [userAll, setUserAll] = useState();
  const [reRender, setReRender] = useState(false);
  const { dispatch } = useStateContext();
  const [paginate, setPaginate] = useState();
  const nav = useNavigate();
  useEffect(() => {
    const load = async () => {
      try {
        const res = await authApi().get(endpoints["user-getAll"]);
        setUserAll(res.data.data);
        setPaginate(res.data.links);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    load();
  }, [reRender]);

  const formatDate = (date) => {
    let d = new Date(date);
    let day = d.getDate() < 10 ? "0" + d.getDate() : d.getDate();
    let month =
      d.getMonth() + 1 < 10 ? "0" + d.getMonth() + 1 : d.getMonth() + 1;
    let year = d.getFullYear() < 10 ? "0" + d.getFullYear() : d.getFullYear();
    let hour = d.getHours() < 10 ? "0" + d.getHours() : d.getHours();
    let minute = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
    let second = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
    return `${day}/${month}/${year} - ${hour}:${minute}:${second}`;
  };

  const levelUp = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().put(endpoints["role-up"](id));
      console.log(res.status);
      if (res.status === 200) {
        setReRender((prev) => !prev);
      }
    };
    handle();
  };

  const onPaginate = (e, url) => {
    e.preventDefault();
    const handle = async () => {
      if (url !== null) {
        const res = await authApi().get(url);
        setUserAll(res.data.data);
        setPaginate(res.data.links);
        window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
      }
    };
    handle();
  };

  const levelDown = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().put(endpoints["role-down"](id));
      console.log(res.status);
      if (res.status === 200) {
        setReRender((prev) => !prev);
      }
    };
    handle();
  };

  const deleteUser = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().delete(endpoints["user-delete"](id));
      console.log(res.status);
      if (res.status === 202) {
        setReRender((prev) => !prev);
      }
    };
    handle();
  };

  if (userAll === undefined) {
    return (
      <Manager>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div class="inline-block mt-3 h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
        </div>
      </Manager>
    );
  }

  return (
    <Manager>
      <div className="">
        <div className="">
          {userAll.map((item, index) => {
            return (
              <div
                key={index}
                className="flex flex-col md:flex-row items-center gap-5 border rounded-lg p-3 shadow-lg mb-3 justify-evenly"
              >
                <div className="basis-1/5 flex flex-col justify-center  overflow-x-hidden">
                  <div className="drop-shadow-xl self-center ">
                    <img
                      src={item.avatar}
                      alt=""
                      className="rounded-full w-14 h-14 border-blue-400 border-4 "
                    />
                  </div>
                  <div className="max-w-[8rem] truncate mt-2 lg:self-center ">
                    Email: {item.email === null ? "Chưa cập nhật" : item.email}
                  </div>
                </div>
                {/*  */}
                <div className="basis-2/5">
                  <div className="flex flex-col md:flex-row md:gap-10">
                    <div className="text-lg font-semibold text-center">
                      {item.username}
                    </div>
                    <div className="justify-items-start italic text-sm">
                      Đăng ký vào ngày {formatDate(item.created_at)}
                    </div>
                  </div>
                  <div className="text-center mt-2 md:text-left md:mt-0">
                    {item.role.name}
                  </div>
                </div>
                {/*  */}
                <div className="flex flex-row md:flex-col lg:flex-row gap-5 basis-2/5">
                  <form onSubmit={(e) => levelUp(e, item.id)} className="">
                    <button
                      type="submit"
                      disabled={item.role_id !== 1 ? true : false}
                      className={`${
                        item.role_id === 1
                          ? "bg-green-400 hover:bg-green-600"
                          : "bg-neutral-500 hover:bg-neutral-700 cursor-not-allowed"
                      } flex items-center gap-2 text-neutral-50 px-3 py-2 rounded-lg cursor-pointer `}
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faAnglesUp} />
                      </div>
                      <div className="">Nâng cấp role</div>
                    </button>
                  </form>
                  {/*  */}
                  <form onSubmit={(e) => levelDown(e, item.id)} className="">
                    <button
                      type="submit"
                      disabled={item.role_id === 1 ? true : false}
                      className={`${
                        item.role_id === 1
                          ? "bg-neutral-500 hover:bg-neutral-700 cursor-not-allowed"
                          : "bg-green-400 hover:bg-green-600"
                      } flex items-center gap-2 text-neutral-50 px-3 py-2 rounded-lg cursor-pointer `}
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faAnglesDown} />
                      </div>
                      <div className="">Giảm cấp role</div>
                    </button>
                  </form>
                  {/*  */}
                  <form onSubmit={(e) => deleteUser(e, item.id)} className="">
                    <button
                      type="submit"
                      className="flex items-center gap-2 bg-red-400 text-neutral-50 px-3 py-2 rounded-lg cursor-pointer hover:bg-red-600"
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faXmark} />
                      </div>
                      <div className="">Xóa tài khoản</div>
                    </button>
                  </form>
                </div>
              </div>
            );
          })}
          {/*  */}
          <div className="flex justify-center w-full">
            <div className="flex gap-5">
              {paginate.map((item, index) => {
                return (
                  <form
                    onSubmit={(e) => onPaginate(e, item.url)}
                    className=""
                    key={index}
                  >
                    <button
                      type="submit"
                      className={` ${
                        item.active && "bg-neutral-400 text-neutral-50"
                      } border px-3 py-1 rounded-lg hover:bg-blue-400 cursor-pointer hover:text-neutral-50`}
                    >
                      {index === 0 ? (
                        <FontAwesomeIcon icon={faAngleLeft} />
                      ) : index === paginate.length - 1 ? (
                        <FontAwesomeIcon icon={faAngleRight} />
                      ) : (
                        item.label
                      )}
                    </button>
                  </form>
                );
              })}
            </div>
          </div>
        </div>
      </div>
    </Manager>
  );
};

export default ManagerUser;
