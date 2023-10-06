import React, { useEffect, useState } from "react";
import ManagerCheck from "./ManagerCheck";
import Apis, { authApi, endpoints } from "../config/Apis";
import { useStateContext } from "../context/ContextProvider";
import { useNavigate } from "react-router-dom";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faCheck, faXmark } from "@fortawesome/free-solid-svg-icons";

const CheckArticle = () => {
  const [articleWait, setArticleWait] = useState(null);
  const { dispatch } = useStateContext();
  const nav = useNavigate();
  const [reRender, setReRender] = useState(false);
  useEffect(() => {
    const load = async () => {
      try {
        const res = await authApi().get(endpoints["article-wait"]);
        setArticleWait(res.data.data);
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    load();
  }, [reRender]);

  const accept = (e, id) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().put(endpoints["accept-article"](id));
      console.log(res.status);
      if (res.status === 200) {
        setReRender((prev) => !prev);
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

  if (articleWait === null) {
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
        <div className="flex flex-wrap gap-2">
          {articleWait.map((item, index) => {
            return (
              <div
                className="border flex flex-col gap-2 p-3 justify-between rounded-lg shadow-lg"
                key={index}
              >
                <div className="flex flex-col items-center">
                  <div className="text-lg font-semibold">{item.title}</div>
                  <div
                    className="max-w-sm overflow-x-hidden relative -z-10"
                    dangerouslySetInnerHTML={{ __html: item.description }}
                  ></div>
                </div>
                {/*  */}
                <div className="flex gap-5 justify-items-end self-center drop-shadow-lg">
                  <form onSubmit={(e) => accept(e, item.id)} className="">
                    <button
                      type="submit"
                      className="flex gap-2 bg-green-300 text-neutral-50 px-5 py-2 rounded-lg hover:bg-green-500 cursor-pointer"
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faCheck} />
                      </div>
                      <div className="">Chấp nhận</div>
                    </button>
                  </form>
                  <form onSubmit={(e) => cancel(e, item.id)} className="">
                    <button
                      type="submit"
                      className="flex gap-2 bg-red-400 text-neutral-50 px-5 py-2 rounded-lg hover:bg-red-600 cursor-pointer"
                    >
                      <div className="">
                        <FontAwesomeIcon icon={faXmark} />
                      </div>
                      <div className="">Bỏ qua bài viết</div>
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

export default CheckArticle;
