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
  faEye,
  faFileSignature,
  faIcons,
  faMessage,
  faWarning,
  faXmark,
} from "@fortawesome/free-solid-svg-icons";
import { useStateContext } from "../context/ContextProvider";
import { useNavigate } from "react-router-dom";

const ManagerArticle = () => {
  const [article, setArticle] = useState();
  const [paginate, setPaginate] = useState();
  const { dispatch } = useStateContext();
  const [reRender, setReRender] = useState(false);
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
  }, [reRender]);

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
    console.log(url);
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

  const filterComment = (e) => {
    e.preventDefault();
    const handle = async () => {
      try {
        const res = await authApi().get(endpoints["article-all-comment"]);
        setArticle(res.data.data);
        setPaginate(res.data.links);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    handle();
  };

  const filterReport = (e) => {
    e.preventDefault();
    const handle = async () => {
      try {
        const res = await authApi().get(endpoints["article-all-report"]);
        setArticle(res.data.data);
        setPaginate(res.data.links);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    handle();
  };

  const filterView = (e) => {
    e.preventDefault();
    const handle = async () => {
      try {
        const res = await authApi().get(endpoints["article-all-view"]);
        setArticle(res.data.data);
        setPaginate(res.data.links);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    handle();
  };

  const cancel = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().delete(endpoints["delete-article"](id));
      console.log(res.status);

      if (res.status === 200) {
        setReRender((prev) => !prev);
      }
    };
    handle();
  };

  return (
    <Manager>
      <div className="flex gap-5 mb-2">
        <form
          onSubmit={(e) => {
            filterComment(e);
          }}
          action=""
        >
          <button
            type="submit"
            className="px-4 py-2 bg-neutral-200 rounded-md hover:bg-blue-400 hover:text-neutral-50 cursor-pointer"
          >
            Bình luận nhiều nhất
          </button>
        </form>
        {/*  */}
        <form
          onSubmit={(e) => {
            filterView(e);
          }}
          action=""
        >
          <button
            type="submit"
            className="px-4 py-2 bg-neutral-200 rounded-md hover:bg-blue-400 hover:text-neutral-50 cursor-pointer"
          >
            Lượt xem nhiều nhất
          </button>
        </form>
        {/*  */}
        <form
          onSubmit={(e) => {
            filterReport(e);
          }}
          action=""
        >
          <button
            type="submit"
            className="px-4 py-2 bg-neutral-200 rounded-md hover:bg-blue-400 hover:text-neutral-50 cursor-pointer"
          >
            Tố cáo nhiều nhất
          </button>
        </form>
      </div>
      {/*  */}
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
                <div className="">
                  {item.category === null
                    ? "Chưa cập nhật"
                    : item.category.name}
                </div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex items-center gap-2">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faMessage} />
                </div>
                <div className="">{item.comments_count}</div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex items-center gap-2">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faWarning} />
                </div>
                <div className="">{item.reports_count}</div>
              </div>
              {/*  */}
              <div className="basis-1/5 flex items-center gap-2">
                <div className="text-xl w-8 text-center text-blue-400">
                  <FontAwesomeIcon icon={faEye} />
                </div>
                <div className="">{item.view}</div>
              </div>
              {/*  */}
              <form onSubmit={(e) => cancel(e, item.id)} className="min-w-fit">
                <button
                  type="submit"
                  className="flex items-center gap-2 bg-red-400 text-neutral-50 px-5 py-2 rounded-lg hover:bg-red-600 cursor-pointer"
                >
                  <div className="">
                    <FontAwesomeIcon icon={faXmark} />
                  </div>
                  <div className="">Bỏ qua bài viết</div>
                </button>
              </form>
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
