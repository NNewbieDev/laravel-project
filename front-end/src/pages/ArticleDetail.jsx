import React, { useEffect, useState } from "react";
import { Link, useParams } from "react-router-dom";
import Apis, { endpoints } from "../config/Apis";
import { TagIcon } from "@heroicons/react/24/outline";
import { MySpinner } from "../components/layout";
import moment from "moment";

const ArticleDetail = () => {
  const [article, setArticle] = useState([]);
  const { articleId } = useParams();

  useEffect(() => {
    const fecthArticle = async () => {
      let { data } = await Apis.get(endpoints["detail"](articleId));
      setArticle(data);
    };
    //
    fecthArticle();
  }, [articleId]);

  return (
    <>
      <section className="mt-10 mx-auto w-full max-w-7xl px-8">
        <div className="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:flex-row">
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
              { moment(article.updated_at).utc().format('HH:mm DD-MM-YYYY')}
            </span>
            {/* <p className="text-xs text-neutral-500 dark:text-neutral-300">
                            {article.updated_at}
                        </p> */}
          </div>
        </div>
      </section>
    </>
  );
};

export default ArticleDetail;
