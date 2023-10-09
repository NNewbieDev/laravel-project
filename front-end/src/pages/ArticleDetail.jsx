import React, { useContext, useEffect, useState } from "react";
import { Form, Link, useParams } from "react-router-dom";
import Apis, { authApi, endpoints } from "../config/Apis";
import {
  TagIcon,
  HandThumbUpIcon,
  FlagIcon,
} from "@heroicons/react/24/outline";
import { MySpinner } from "../components/layout";
import moment from "moment";
import { Button, Rating } from "@material-tailwind/react";
import { useStateContext } from "../context/ContextProvider";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faPaperPlane, faPlusCircle } from "@fortawesome/free-solid-svg-icons";

const ArticleDetail = () => {
  const [article, setArticle] = useState([]);
  const { articleId } = useParams();
  const [comments, setComments] = useState([]);
  const [content, setContent] = useState();
  const [rating, setRating] = useState();
  // const [userRating, setUserRating] = useState();
  const [report, setReport] = useState();
  const { user, dispatch } = useStateContext();

  useEffect(() => {
    const fecthArticle = async () => {
      let { data } = await Apis.get(endpoints["detail"](articleId));
      setArticle(data);
    };
    const loadComments = async () => {
      let { data } = await Apis.get(endpoints["comments"](articleId));
      setComments(data.data);
    };
    const loadRatings = async () => {
      let { data } = await Apis.get(endpoints["getRatings"](articleId));
      setRating(data);
    };
    fecthArticle();
    loadComments();
    loadRatings();
  }, [articleId]);

  // useEffect(() => {
  //   console.log(content);
  // }, [content])

  const addComment = (evt) => {
    evt.preventDefault();
    const process = async () => {
      let response = await authApi().post(endpoints["comments"](articleId), {
        comment: content,
      });
      console.log(response.status);
      if (response.status === 201) {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: "smooth",
        });
      }
      let { data } = await Apis.get(endpoints["comments"](articleId));
      setComments(data.data);
    };
    process();
  };

  const addRating = (evt) => {
    evt.preventDefault();
    const process = async () => {
      let response = await authApi().post(endpoints["addRatings"](articleId), {
        rate: rating,
      });
      if (response.status === 201) {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: "smooth",
        });
      }
      let { data } = await Apis.get(endpoints["getRatings"](articleId));
      setRating(data);
    };
    process();
  };

  const addReport = (evt) => {
    evt.preventDefault();
    const process = async () => {
      let response = await authApi().post(endpoints["addReport"](articleId), {
        content: report,
      });
      console.log(response.status);
      if (response.status === 201) {
        window.scrollTo({
          top: 0,
          left: 0,
          behavior: "smooth",
        });
      }
    };
    process();
  };
  //   console.log(rating);

  if (comments === null) return <MySpinner />;

  let url = `/login?next=/article/${articleId}`;
  return (
    <>
      <section className="mt-20 mx-auto w-full max-w-7xl px-8">
        <div className=" rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:flex-row">
          <div className=" flex flex-col justify-end p-6">
            {/* {article.category.name !== null ? 
                        <span className="mb-10 grid justify-end bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 w-fit rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
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
              <div className="my-5 flex justify-center">
                <MySpinner />
              </div>
            )}
            <div className="lg:pt3 lg:pb-5 inline-flex">
              <span className=" lg:ms-8 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center w-fit px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                <svg
                  className="w-2.5 h-2.5 mr-1.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                </svg>
                {moment(article.updated_at).utc().format("HH:mm DD-MM-YYYY")}
              </span>

              {/* Phần Rating */}
              <div className="flex w-4/6 lg:ms-28 justify-end relative z-50 ">
                <form onSubmit={(e) => addRating(e)}>
                  <div className="flex items-center flex-row-reverse">
                    <button
                      className="transition duration-300 w-4 h-4 text-gray-600 cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 mr-1"
                      type="submit"
                    >
                      <svg
                        onClick={(event) => setRating(event.currentTarget.id)}
                        id="5"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 22 20"
                      >
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                    </button>
                    <button
                      className="transition duration-300 w-4 h-4 text-gray-600 cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 mr-1"
                      type="submit"
                    >
                      <svg
                        onClick={(event) => setRating(event.currentTarget.id)}
                        id="4"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 22 20"
                      >
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                    </button>
                    <button
                      className="transition duration-300 w-4 h-4 text-gray-600 cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 mr-1"
                      type="submit"
                    >
                      <svg
                        onClick={(event) => setRating(event.currentTarget.id)}
                        id="3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 22 20"
                      >
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                    </button>
                    <button
                      className="transition duration-300 w-4 h-4 text-gray-600 cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 mr-1"
                      type="submit"
                    >
                      <svg
                        onClick={(event) => setRating(event.currentTarget.id)}
                        id="2"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 22 20"
                      >
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                    </button>
                    <button
                      className="transition duration-300 w-4 h-4 text-gray-600 cursor-pointer peer peer-hover:text-yellow-400 hover:text-yellow-400 mr-1"
                      type="submit"
                    >
                      <svg
                        onClick={(event) => setRating(event.currentTarget.id)}
                        id="1"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 22 20"
                      >
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                      </svg>
                    </button>

                    {/*  */}
                    {rating !== "" ? (
                      <span className=" me-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        {rating} out of 5
                      </span>
                    ) : (
                      <span className=" me-2 text-sm font-medium text-gray-500 dark:text-gray-400">
                        0 out of 5
                      </span>
                    )}
                  </div>
                </form>
              </div>

              {/*Phần report bài viết*/}
              <form
                onSubmit={(e) => addReport(e)}
                className="group cursor-pointer transition duration-300 border-2 rounded-md p-3 relative -mt-3 ml-3 hover:bg-neutral-100 me-10"
              >
                <FlagIcon className="mx-3" color="Red" width={24} />
                <div className="group-hover:flex sm:rounded-lg flex-col rounded-lg sm:min-w-[300px] p-3 drop-shadow-xl sm:absolute hidden bg-white sm:top-10 sm:right-0">
                  <button
                    type="submit"
                    onClick={(event) =>
                      setReport(event.currentTarget.textContent)
                    }
                    className="flex gap-2 hover:cursor-pointer min-w-[15rem] transition duration-500 px-2 py-2 hover:bg-neutral-200 rounded-lg"
                  >
                    <div className="">
                      <FontAwesomeIcon icon={faPlusCircle} />
                    </div>
                    <div className="">Bài viết có chứa yếu tố phản động!</div>
                  </button>
                  <button
                    type="submit"
                    onClick={(event) =>
                      setReport(event.currentTarget.textContent)
                    }
                    className="flex gap-2 hover:cursor-pointer min-w-[15rem] transition duration-500 px-2 py-2 hover:bg-neutral-200 rounded-lg"
                  >
                    <div className="">
                      <FontAwesomeIcon icon={faPlusCircle} />
                    </div>
                    <div className="">Bài viết có chứa ngôn ngữ đả kích!</div>
                  </button>
                  <button
                    type="submit"
                    onClick={(event) =>
                      setReport(event.currentTarget.textContent)
                    }
                    className="flex gap-2 hover:cursor-pointer min-w-[15rem] transition duration-500 px-2 py-2 hover:bg-neutral-200 rounded-lg"
                  >
                    <div className="">
                      <FontAwesomeIcon icon={faPlusCircle} />
                    </div>
                    <div className="">Bài viết có nội dung ko phù hợp!</div>
                  </button>
                </div>
              </form>
            </div>
          </div>

          {/* Phần comment */}
          {user === null ? (
            <p className=" my-5 ms-5 lg:ms-20 text-xl">
              Vui lòng{" "}
              <Link className="text-sky-500" to={url}>
                đăng nhập
              </Link>{" "}
              để bình luận!
            </p>
          ) : (
            <>
              <div className="flex items-center justify-center shadow-lg mt-3 mx-8 mb-4 max-w-full">
                <form
                  className="w-full max-w-full bg-white rounded-lg px-4 pt-2"
                  onSubmit={(e) => addComment(e)}
                >
                  <div className="flex flex-wrap -mx-3 mb-6">
                    <h2 className="px-4 pt-3 pb-2 text-gray-800 text-xl">
                      Thêm bình luận:
                    </h2>
                    <div className="w-full md:w-full px-3 mb-2 mt-2">
                      <input
                        onChange={(event) => setContent(event.target.value)}
                        className="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full text-base h-16 py-2 px-4 transition duration-300 placeholder-gray-700 focus:outline-none focus:bg-white"
                        name="body"
                        placeholder="Cảm nghĩ của bạn..."
                        required
                        defaultValue={""}
                      />
                    </div>
                    <div className="w-full flex items-start md:w-full px-3">
                      <div className="flex items-start w-1/2 text-gray-700 px-2 mr-auto">
                        <svg
                          fill="none"
                          className="w-5 h-5 text-gray-600 mr-1"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            strokeLinecap="round"
                            strokeLinejoin="round"
                            strokeWidth={2}
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                          />
                        </svg>
                      </div>
                      <div className="-mr-1">
                        <Button
                          type="submit"
                          className="bg-white flex gap-2 text-blue-400 font-normal py-2 px-4 border border-gray-400 rounded-lg mr-1 hover:bg-blue-400 hover:text-white"
                          defaultValue="Post Comment"
                        >
                          <div className=" text-lg ">
                            <FontAwesomeIcon icon={faPaperPlane} />
                          </div>
                          <div className=" text-lg font-semibold "> Gửi</div>
                        </Button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </>
          )}
          {/* Hiển thị comment */}
          <div className="max-lg:mx-5 lg:px-12 mt-8 pb-10">
            {comments.map((c, index) => (
              <div key={index} className="flex justify-start relative top-1/3">
                <div className="relative grid grid-cols-1 min-w-full gap-4 p-4 mb-4 border rounded-lg bg-white shadow-lg">
                  <div className="relative flex items-center gap-3">
                    <img
                      src={c.user.avatar}
                      className="relative rounded-full border-4 border-blue-400 h-20 w-20"
                      alt=""
                      //     loading="lazy"
                    />
                    <div className="flex flex-col w-full">
                      <div className="flex flex-row justify-between">
                        <p className="relative text-xl whitespace-nowrap font-semibold truncate overflow-hidden">
                          {c.user.username}
                        </p>
                        <Link className="text-gray-500 text-xl" to={"#"}>
                          <i className="fa-solid fa-trash" />
                        </Link>
                      </div>
                      <p className="text-gray-400 text-sm">
                        Cập nhật lần cuối:{" "}
                        {moment(c.updated_at).utc().format("HH:mm DD-MM-YYYY")}
                      </p>

                      {c.content === null ? (
                        <p className="text-gray-500">
                          <mark className="italic bg-red-300">
                            Comment này đã bị xóa bởi admin
                          </mark>
                        </p>
                      ) : (
                        <p className="text-lg text-gray-500">{c.content}.</p>
                      )}
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </>
  );
};

export default ArticleDetail;
