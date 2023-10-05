import React, { useContext, useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import Apis, { authApi, endpoints } from "../config/Apis";
import { TagIcon, HandThumbUpIcon, FlagIcon } from "@heroicons/react/24/outline";
import { MySpinner } from "../components/layout";
import moment from "moment";
import { Button } from "@material-tailwind/react";
import { useStateContext } from "../context/ContextProvider";

const ArticleDetail = () => {
  const [article, setArticle] = useState([]);
  const { articleId } = useParams();
  const [comments, setComments] = useState([]);
  const [content, setContent] = useState();
  // const [rating, setRating] = useState();
  // const [userRating, setUserRating] = useState();
  const { user, dispatch } = useStateContext();

  useEffect(() => {
    const fecthArticle = async () => {
      let { data } = await Apis.get(endpoints["detail"](articleId));
      setArticle(data);
    };
    const loadComments = async () => {
      let { data } = await Apis.get(endpoints['comments'](articleId));
      setComments(data.data);

    };
    fecthArticle();
    loadComments();
  }, [articleId]);

  useEffect(() => {
    console.log(content);
  }, [content])

  console.log(comments);

  const addComment = (evt) => {
    evt.preventDefault();
    const process = async () => {
      console.log(articleId)
      let response = await authApi().post(endpoints['comments'](articleId), {
        "rate": 1,
      });
      let { data } = await Apis.get(endpoints['comments'](articleId));
      setComments(data.data);
    }
    process();
  }

  // const addRating = (evt) => {
  //   evt.preventDefault();
  //   const process = async () => {
  //     console.log(articleId)
  //     let response = await authApi().post(endpoints['comments'](articleId), {
  //       "rate": content,
  //     });
  //     let { data } = await Apis.get(endpoints['comments'](articleId));
  //     setComments(data.data);
  //   }
  //   process();
  // }

  if (comments === undefined)
    return <MySpinner />

  let url = `/login?next=/article/${articleId}`;
  return (
    <>
      <section className="mt-20 mx-auto w-full max-w-7xl px-8">
        <div className=" rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:flex-row">
          <div className=" flex flex-col justify-end p-6">
            {/* {article.category.name !== null ? 
                        <span class="mb-10 grid justify-end bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 w-fit rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                            {article.category.name}
                        </span>: null
                        } */}
            <h5 className="flex justify-center mt-5 mb-8 capitalize text-2xl text-neutral-800 dark:text-neutral-50">
              {article.title}
            </h5>
            <Link aria-disabled="true">
              <p className=" lg:px-10 mb-4 text-lg text-neutral-600 dark:text-neutral-200">
                <div
                  dangerouslySetInnerHTML={{ __html: article.description }}
                />
              </p>
            </Link>
            {article.content !== null ? (
              <p className=" lg:px-10 mb-4 text-lg text-neutral-600 dark:text-neutral-200">
                <div dangerouslySetInnerHTML={{ __html: article.content }} />
              </p>
            ) : (
              <MySpinner />
            )}
            <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center w-fit px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
              <svg
                class="w-2.5 h-2.5 mr-1.5"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
              </svg>
              {moment(article.updated_at).utc().format('HH:mm DD-MM-YYYY')}
            </span>
          </div>
          <div class="mt-10 ms-14 flex">
            <Button>
              <HandThumbUpIcon width={20} color="#1877f2" />
            </Button>

            <FlagIcon className="ms-2" width={20} />
            <h1 className="ms-3 text-2xl">Thảo Luận: </h1>
          </div>

          {user === null ? <p className=" pb-5 mb-5 ms-20 text-xl">Vui lòng <Link className="text-sky-500" to={url}>đăng nhập</Link> để bình luận!</p>
            : <>
              <div className="flex items-center justify-center shadow-lg mt-3 mx-8 mb-4 max-w-full">
                <form className="w-full max-w-full bg-white rounded-lg px-4 pt-2" onSubmit={addComment}>
                  <div className="flex flex-wrap -mx-3 mb-6">
                    <h2 className="px-4 pt-3 pb-2 text-gray-800 text-xl">Thêm bình luận mới:</h2>
                    <div className="w-full md:w-full px-3 mb-2 mt-2">
                      <input onChange={(event) => setContent(event.target.value)} className="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full text-base h-16 py-2 px-2 placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder="Cảm nghĩ của bạn..." required defaultValue={""} />
                    </div>
                    <div className="w-full flex items-start md:w-full px-3">
                      <div className="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                        <svg fill="none" className="w-5 h-5 text-gray-600 mr-1" viewBox="0 0 24 24" stroke="currentColor">
                          <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                      </div>
                      <div className="-mr-1">
                        <Button type="submit" className="bg-white text-gray-700 font-normal py-1 px-4 border border-gray-400 rounded-lg mr-1 hover:bg-gray-100" defaultValue="Post Comment">
                          Thêm Ý kiến
                        </Button>
                      </div>
                    </div>
                  </div></form>
              </div>
            </>}


          <div className="lg:px-12 mt-14">
            {comments.map(c =>
              <div key={c.id} className="flex justify-start relative top-1/3">
                <div className="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg">
                  <div className="relative flex gap-3">
                    <img src="https://icons.iconarchive.com/icons/diversity-avatars/avatars/256/charlie-chaplin-icon.png" className="relative rounded-lg  -mb-4 bg-white border h-20 w-20" alt loading="lazy" />
                    <div className="flex flex-col w-full">
                      <div className="flex flex-row justify-between">
                        <p className="relative text-xl whitespace-nowrap truncate overflow-hidden">User Id: {c.userID}</p>
                        <a className="text-gray-500 text-xl" href="#"><i className="fa-solid fa-trash" /></a>
                      </div>
                      <p className="text-gray-400 text-sm">Cập nhật lần cuối: {moment(c.updated_at).utc().format('HH:mm DD-MM-YYYY')}</p>

                      {c.content === null ? (
                        <p className="ps-3 mt-4 text-gray-500"><mark className="italic bg-red-300">Comment này đã bị xóa bởi admin</mark></p>
                      ) : (
                        <p className="ps-3 text-lg mt-4 text-gray-500">{c.content}</p>
                      )}
                    </div>
                  </div>

                </div>
              </div>
            )}
          </div>
        </div>

        {/* Phần comment */}

      </section>
    </>
  );
};

export default ArticleDetail;
