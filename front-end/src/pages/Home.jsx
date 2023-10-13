import React, { Fragment, useEffect, useState } from "react";
import Apis, { authApi, endpoints } from "../config/Apis";
import { MySpinner } from "../components/layout";
import { library, icon } from "@fortawesome/fontawesome-svg-core";
import {
  faAngleLeft,
  faAngleRight,
  faCamera,
} from "@fortawesome/free-solid-svg-icons";
import { Form, Link, useNavigate, useSearchParams } from "react-router-dom";
import { Button, IconButton } from "@material-tailwind/react";
import { ArrowRightIcon, ArrowLeftIcon } from "@heroicons/react/24/outline";
import moment from "moment";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

library.add(faCamera);

const camera = icon({ prefix: "fas", iconName: "camera" });

const Home = () => {
  const [article, setArticle] = useState([]);
  const [q] = useSearchParams();
  const [paginate, setPaginate] = useState([]);
  const [category, setCategory] = useState([]);
  const [param, setParam] = useState({
    title: "",
    cateId: "",
  });
  const nav = useNavigate();

  useEffect(() => {
    async function fecthArticle() {
      try {
        let e = endpoints["article"];
        let kw = q.get("kw");
        let res = await Apis.get(e);
        // console.log(cate);
        // //       cái này là đầy đủ các attribute ông cần
        // console.log(res.data);
        // //       cái này là để ông lấy phân trang
        // console.log(res.data.links);
        // console.log(res.data.data);

        setPaginate(res.data.links);
        setArticle(res.data.data);
      } catch (ex) {
        console.error(ex);
      }
    }
    fecthArticle();

    //danh mục
    const loadCategory = async () => {
      let cate = endpoints["category"];
      let cateRes = await Apis.get(cate);
      setCategory(cateRes.data);
    };
    loadCategory();
  }, [q]);

  const search = (evt) => {
    evt.preventDefault();
    const process = async () => {
      try {
        let res = await Apis.post(endpoints["search"], {
          title: param.title,
        });
        setPaginate(res.data.links);
        setArticle(res.data.data);
      } catch (err) {
        console.error("Loi ne:" + err);
      }
    };
    process();
  };

  const articleByCate = (evt, id) => {
    //     console.log(cateId);
    evt.preventDefault();
    const process = async () => {
      try {
        let res = await Apis.post(endpoints["articleByCate"](id));
        setPaginate(res.data.links);
        setArticle(res.data.data);
        //         console.log(res.data.data);
      } catch (err) {
        console.error("Loi ne:" + err);
      }
    };
    process();
  };

  const onPaginate = (e, url) => {
    e.preventDefault();
    const handle = async () => {
      let form = new FormData();

      if (param.title !== "") {
        form.append("title", param.title);
        const res = await authApi().post(url, form);
        setArticle(res.data.data);
        setPaginate(res.data.links);
        window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
      }
      //
      else if (param.cateId !== "") {
        form.append("cateId", param.cateId);
        const res = await authApi().post(url, form);
        setArticle(res.data.data);
        setPaginate(res.data.links);
        window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
      }
      //       console.log(form);
      else {
        const res = await authApi().get(url);
        setArticle(res.data.data);
        setPaginate(res.data.links);
        window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
        //         nav(`/?kw=${}`);
      }
    };
    handle();
  };

  if (article.length === 0)
    return (
      <>
        <div className="mt-32 mx-auto text-center w-3/4 flex justify-center">
          <MySpinner />
        </div>
        <h1 className="mt-6 flex justify-center">Đang tải tài nguyên...</h1>
      </>
    );

  return (
    <>
      <div className="bg-sky-50 mt-28">
        <hr />
        <section className=" p-3 lg:flex max-lg:inline-grid grid-cols-3 gap-5 justify-center text-lg  mx-auto w-fit px-8">
          {category.map((c, index) => {
            return (
              <div key={index}>
                <div
                  title={c.name}
                  onClick={(e) => {
                    setParam((prev) => {
                      return { title: "", cateId: c.id };
                    });
                    articleByCate(e, c.id);
                  }}
                  className=" mx-3 -my-2 py-2 px-3 hover:bg-slate-200 cursor-pointer rounded-lg transition duration-500"
                >
                  {c.name}
                </div>
              </div>
            );
          })}
        </section>
        <hr />
      </div>
      <section className="mb-10">
        <form onSubmit={search} className="mt-7 mx-auto w-full max-w-7xl">
          <label
            htmlFor="default-search"
            className="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white"
          >
            Search
          </label>
          <div className="relative">
            <div className="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg
                className="w-4 h-4 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                clipRule={""}
                fillRule=""
                viewBox="0 0 20 20"
              >
                <path
                  stroke="currentColor"
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                />
              </svg>
            </div>
            <input
              type="text"
              onChange={(e) =>
                setParam((prev) => {
                  return { cateId: "", title: e.target.value };
                })
              }
              value={param.title}
              className="block w-full p-4 pl-10 text-xl text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Tìm kiếm..."
              required
            />
            <button
              type="submit"
              className="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
              Tìm kiếm
            </button>
          </div>
        </form>

        <div className="mt-10 mx-auto w-full max-w-7xl pl-16">
          <h1 className="text-2xl">
            <i className="fa-solid fa-question-circle"></i>TIN NÓNG 24H
          </h1>
          <span>Tin nóng, tin nhanh toàn quốc, update liên tục 24h</span>
        </div>

        {/* Menu tin tức chính */}
        <div className="mt-5 grid lg:grid-cols-2 gap-2 mx-auto w-full max-w-7xl px-8">
          {article.map((a, index) => {
            let url = `/article/${a.id}`;
            return (
              <div
                key={index}
                className="transition hover:scale-105 hover:-translate-y-6 duration-300 rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:max-w-xl md:flex-row"
              >
                <div className="flex flex-col justify-start p-6 ">
                  <Link to={url} alt={a.title}>
                    <h5 className="mb-3 capitalize text-xl font-medium text-neutral-800 dark:text-neutral-50">
                      {a.title}.
                    </h5>
                    <span className="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                      <div
                        dangerouslySetInnerHTML={{ __html: a.description }}
                      />
                    </span>
                  </Link>
                  <span className="text-xs text-neutral-500 dark:text-neutral-300">
                    {moment(a.updated_at).utc().format("HH:mm DD-MM-YYYY")}
                  </span>
                </div>
              </div>
            );
          })}
        </div>

        {/* Cái này là sidebar bên phải mà chưa biết set sao cho nó bên phải */}
        {/* <div> 
          <h4 className="mt-4 mb-3">Trending topics</h4>
          
          <div className="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style={{ backgroundImage: 'url(assets/images/blog/4by3/01.jpg)', backgroundPosition: 'center left', backgroundSize: 'cover' }}>
            <div className="p-3">
              <a href="#" className="stretched-link btn-link fw-bold text-white h5">Travel</a>
            </div>
          </div>
          
          <div className="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style={{ backgroundImage: 'url(assets/images/blog/4by3/02.jpg)', backgroundPosition: 'center left', backgroundSize: 'cover' }}>
            <div className="bg-dark-overlay-4 p-3">
              <a href="#" className="stretched-link btn-link fw-bold text-black h5">Business</a>
            </div>
          </div>
          
          <div className="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style={{ backgroundImage: 'url(assets/images/blog/4by3/03.jpg)', backgroundPosition: 'center left', backgroundSize: 'cover' }}>
            <div className="bg-dark-overlay-4 p-3">
              <a href="#" className="stretched-link btn-link fw-bold text-black h5">Marketing</a>
            </div>
          </div>
          
          <div className="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style={{ backgroundImage: 'url(assets/images/blog/4by3/04.jpg)', backgroundPosition: 'center left', backgroundSize: 'cover' }}>
            <div className="bg-dark-overlay-4 p-3">
              <a href="#" className="stretched-link btn-link fw-bold text-black h5">Photography</a>
            </div>
          </div>
          
          <div className="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style={{ backgroundImage: 'url(assets/images/blog/4by3/05.jpg)', backgroundPosition: 'center left', backgroundSize: 'cover' }}>
            <div className="bg-dark-overlay-4 p-3">
              <a href="#" className="stretched-link btn-link fw-bold text-black h5">Sports</a>
            </div>
          </div>
          
          <div className="text-center mt-3">
            <a href="#" className="fw-bold text-body text-primary-hover"><u>View all categories</u></a>
          </div>
        </div> */}
      </section>

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

      {/* Back to top */}
      {/* <div>
        <Button type="button" data-te-ripple-init data-te-ripple-color="light" className="!fixed bottom-5 right-5 hidden rounded-full bg-red-600 p-3 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg" id="btn-back-to-top">
          <svg aria-hidden="false" focusable="false" data-prefix="fas" className="h-4 w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
            <path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z" />
          </svg>
        </Button >
      </div> */}
    </>
  );
};

export default Home;
