import React, { useEffect, useState } from "react";
import { Profile } from "../pages";
import { useStateContext } from "../context/ContextProvider";
import { authApi, endpoints } from "../config/Apis";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import {
  faAngleLeft,
  faAngleRight,
  faPen,
  faTrash,
} from "@fortawesome/free-solid-svg-icons";
import { Link, useNavigate } from "react-router-dom";
import { Warning, WarningDelete } from "./warning";

const YourPost = () => {
  const { user } = useStateContext();
  const [article, setArticle] = useState();
  const [dialogDel, setDialogDel] = useState(false);
  const [paginate, setPaginate] = useState();
  const { dispatch } = useStateContext();
  const nav = useNavigate();

  useEffect(() => {
    const load = async () => {
      try {
        const res = await authApi().get(endpoints["post"]);
        setArticle(res.data.data);
        setPaginate(res.data.links);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    load();
  }, []);

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

  if (user.role_id === 1) {
    return (
      <Profile>
        <div className="mt-10 sm:w-3/4 w-full h-96 sm:mx-auto flex justify-center items-center bg-slate-100 rounded-md">
          <Warning />
        </div>
      </Profile>
    );
  }
  if (article === undefined) {
    return (
      <Profile>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div class="inline-block mt-3 h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
        </div>
      </Profile>
    );
  }

  if (article.length === 0) {
    return (
      <Profile>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div className="">Không có dữ liệu</div>
        </div>
      </Profile>
    );
  }

  return (
    <Profile>
      <div className="mt-8 mx-auto md:w-2/3 flex flex-col gap-5">
        {article.data.map((item, index) => {
          return (
            <div
              className="flex gap-5 border border-neutral-300 shadow-lg p-3 rounded-md"
              key={index}
            >
              <div className="rounded-md border flex justify-center items-center p-2 drop-shadow-xl shadow-lg">
                <img
                  className="sm:w-72 lg:h-40 w-52 h-24 rounded-md "
                  src={
                    item.image === null
                      ? "https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/1665px-No-Image-Placeholder.svg.png"
                      : item.image
                  }
                  alt="ảnh"
                />
              </div>
              <div className="flex w-full flex-row sm:flex-col justify-between">
                <div className="">
                  <div className="font-semibold text-2xl px-5 ">
                    {item.title}
                  </div>
                  <div className="font-normal text-lg px-5 max-w-[12rem] lg:max-w-fit text-ellipsis overflow-x-hidden">
                    {item.description}
                  </div>
                </div>
                <div className="flex gap-5 flex-col sm:flex-row justify-end">
                  <Link
                    to={`update?id=${item.id}`}
                    className="flex justify-center items-center gap-2 transition duration-600 hover:drop-shadow-2xl hover:bg-green-400 bg-green-300 sm:px-5 lg:px-10 py-3 text-white font-semibold rounded-lg drop-shadow-lg cursor-pointer"
                  >
                    <div className="px-4 sm:px-0">
                      <FontAwesomeIcon icon={faPen} />
                    </div>
                    <div className="hidden sm:block">Chỉnh sửa</div>
                  </Link>
                  <div
                    onClick={() => setDialogDel(true)}
                    className="flex justify-center items-center gap-2 transition duration-700 hover:drop-shadow-2xl hover:bg-red-500 bg-red-400 sm:px-5 lg:px-10 py-3 text-white font-semibold rounded-lg drop-shadow-lg cursor-pointer"
                  >
                    <div className="px-4 sm:px-0">
                      <FontAwesomeIcon icon={faTrash} />
                    </div>
                    <div className="hidden sm:block">Xóa</div>
                  </div>
                </div>
              </div>
              {dialogDel && (
                <WarningDelete
                  onHandleClose={() => setDialogDel(false)}
                  articleID={item.id}
                />
              )}
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
    </Profile>
  );
};

export default YourPost;
