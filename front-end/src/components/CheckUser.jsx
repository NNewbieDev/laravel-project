import React, { useEffect, useRef, useState } from "react";
import ManagerCheck from "./ManagerCheck";
import { authApi, endpoints } from "../config/Apis";
import { useStateContext } from "../context/ContextProvider";
import { useNavigate } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCheck, faXmark } from "@fortawesome/free-solid-svg-icons";

const CheckUser = () => {
  const [userSent, setUserSent] = useState(null);
  const { user, dispatch } = useStateContext();
  const [reRender, setReRender] = useState(false);
  const nav = useNavigate();
  useEffect(() => {
    const load = async () => {
      try {
        const res = await authApi().get(endpoints["user-sent"]);
        console.log(res.data);
        setUserSent(res.data.data);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
      console.log(reRender);
    };
    load();
  }, [reRender]);
  console.log(user);
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

  const accept = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().post(endpoints["role-up"](id), {
        _method: "PUT",
      });

      if (res.status === 200) {
        setReRender((prev) => !prev);
      }
    };
    handle();
  };
  const cancel = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().post(endpoints["user-reject"](id), {
        _method: "PUT",
      });

      if (res.status === 200) {
        setReRender((prev) => !prev);
      }
    };
    handle();
  };

  if (userSent === null) {
    return (
      <ManagerCheck>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div class="inline-block mt-3 h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
        </div>
      </ManagerCheck>
    );
  }
  return (
    <ManagerCheck>
      <div className="">
        <div className="flex flex-wrap gap-5">
          {userSent.map((item, index) => {
            return (
              <div
                className="border p-2 rounded-lg w-fit flex gap-5 items-center shadow-lg"
                key={index}
              >
                <div className="p-1 border border-neutral-400 rounded-full drop-shadow-lg">
                  <img
                    src={item.avatar}
                    alt=""
                    className="h-14 w-14 rounded-full"
                  />
                </div>
                {/*  */}
                <div className="">
                  <div className="flex gap-10 items-center justify-between">
                    <div className="text-xl font-semibold">{item.username}</div>
                    <div className="italic text-sm self-start">
                      Vào lúc {formatDate(item.updated_at)}
                    </div>
                  </div>
                  <div className="">Yêu cầu được nâng cấp vai trò</div>
                </div>
                {/*  */}
                <div className="flex flex-col gap-3">
                  <form onSubmit={(e) => accept(e, item.id)} className="">
                    <button
                      type="submit"
                      className="flex gap-2 px-5 py-2 cursor-pointer bg-green-300 text-slate-50 rounded-lg hover:bg-green-600"
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faCheck} />
                      </div>
                      <div className="">Xác nhận</div>
                    </button>
                  </form>
                  <form onSubmit={(e) => cancel(e, item.id)} className="">
                    <button
                      type="submit"
                      className="flex gap-2 px-5 py-2 cursor-pointer bg-red-400 text-slate-50 rounded-lg hover:bg-red-700"
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faXmark} />
                      </div>
                      <div className="">Từ chối</div>
                    </button>
                  </form>
                </div>
              </div>
            );
          })}
        </div>
      </div>
    </ManagerCheck>
  );
};

export default CheckUser;
