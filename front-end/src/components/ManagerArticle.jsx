import React, { useEffect } from "react";
import Manager from "../pages/Manager";
import { authApi, endpoints } from "../config/Apis";
import { useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faAngleLeft,
  faAngleRight,
  faCalendar,
  faCalendarAlt,
  faCalendarCheck,
  faFileSignature,
  faIcons,
} from "@fortawesome/free-solid-svg-icons";
import { useStateContext } from "../context/ContextProvider";
import { useNavigate } from "react-router-dom";

const ManagerArticle = () => {
  const [article, setArticle] = useState();
  const [paginate, setPaginate] = useState();
  const { dispatch } = useStateContext();
  const nav = useNavigate();
  useEffect(() => {
    const load = async () => {
      try {
        const res = await authApi().get(endpoints["article-all"]);
        setArticle(res.data.data);
        setPaginate(res.data.links);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    load();
  }, []);

  const formatDate = (date) => {
    let d = new Date(date);
    let day = d.getDate() < 10 ? "0" + d.getDate() : d.getDate();
    let month = d.getMonth() + 1;
    let year = d.getFullYear() < 10 ? "0" + d.getFullYear() : d.getFullYear();
    let hour = d.getHours() < 10 ? "0" + d.getHours() : d.getHours();
    let minute = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
    let second = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
    return `${day}/${month}/${year} - ${hour}:${minute}:${second}`;
  };

  if (article === undefined && paginate === undefined) {
    return (
      <Manager>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div class="inline-block mt-3 h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
        </div>
      </Manager>
    );
  }

  const onPaginate = (e, url) => {
    e.preventDefault();
    const handle = async () => {
      if (url !== null) {
        const res = await authApi().get(url);
        setArticle(res.data.data);
        setPaginate(res.data.links);
        window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
      }
    };
    handle();
  };

  return (
    <Manager>
      <div className="flex flex-col md:flex-row md:flex-wrap gap-3">
        {article.map((item, index) => {
          return (
            <div
              className="border hover:bg-neutral-400/50 cursor-pointer p-5 md:w-full rounded-lg flex flex-col lg:flex-row justify-evenly gap-2"
              key={index}
            >
              <div className="basis-1/5 flex gap-2 items-center ">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faFileSignature} />
                </div>
                <div className="max-w-[10rem] truncate">{item.title}</div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex gap-2 items-center">
                <div className="">
                  <img
                    className="w-8 h-8 border-4 border-blue-400 rounded-full p-1"
                    src={
                      item.user === null
                        ? "https://static.thenounproject.com/png/82455-200.png"
                        : item.user.avatar
                    }
                    alt=""
                  />
                </div>
                <div className="">
                  {item.user === null ? "Chưa xác định" : item.user.username}
                </div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex items-center gap-2">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faIcons} />
                </div>
                <div className="">{item.category.name}</div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex items-center gap-2">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faCalendar} />
                </div>
                <div className="">{formatDate(item.created_at)}</div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex items-center gap-2">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faCalendarCheck} />
                </div>
                <div className="">{formatDate(item.updated_at)}</div>
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
    </Manager>
  );
};

export default ManagerArticle;
