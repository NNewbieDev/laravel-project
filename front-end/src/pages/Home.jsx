import React, { useEffect, useState } from "react";
import Apis, { endpoints } from "../config/Apis";
import { MySpinner } from "../components/layout";
import { library, icon } from "@fortawesome/fontawesome-svg-core";
import { faCamera } from "@fortawesome/free-solid-svg-icons";
import { Link, useNavigate, useSearchParams } from "react-router-dom";
import { Button, IconButton } from "@material-tailwind/react";
import { ArrowRightIcon, ArrowLeftIcon } from "@heroicons/react/24/outline";

library.add(faCamera);

const camera = icon({ prefix: "fas", iconName: "camera" });

const Home = () => {
  const [article, setArticle] = useState([]);
  const [q] = useSearchParams();
  const [paginate, setPaginate] = useState([]);
  const [category, setCategory] = useState([]);
  const [kw, setKw] = useState("")
  const nav = useNavigate();

  useEffect(() => {
    async function fecthArticle() {
      try {
        let e = endpoints["article"];
        let cateId = q.get("cateId");
        if (cateId !== null) {
          e = `${e}?cateId=${cateId}`;
        } else {
          let kw = q.get("kw");
          if (kw !== null)
            e = `${e}?kw=${kw}`;
        }

        let res = await Apis.get(e);
        //       // setArticle(res.data);

        const cate = await Apis.get(endpoints["category"]);
        console.log(cate);
        //       cái này là đầy đủ các attribute ông cần
        console.log(res.data);
        //       cái này là để ông lấy phân trang
        console.log(res.data.links);

        console.log(res.data.data);
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
      // e = `${e}/?page=${page}`;
      let cateRes = await Apis.get(cate);
      setCategory(cateRes.data);
      // setCategory(res.data.links);
    };
    loadCategory();

  }, [q]);

  const search = (evt) => {
    evt.preventDefault();

    nav(`/?kw=${kw}`);
  }
  const pagination = async (page) => {
    let e = endpoints["article"];
    e = `${e}/?page=${page}`;
    let res = await Apis.get(e);
    setArticle(res.data.data);
    setPaginate(res.data.links);
  };
  
  if (article === null)
    return <MySpinner />;

  return (

    <>
      <section className="flex justify-center text-lg mt-28 mx-auto w-full max-w-7xl px-8">
        {category.map((c) => {
          let h = `/?cateId=${c.id}`;
          return (
            <div className="inline-flex ">
              <a title={c.name} href={h} className="mx-3 py-2 px-3 hover:bg-neutral-200 rounded-lg"> {c.name}</a>

            </div>
          );
        })}
      </section>

      {/* section content */}
      <section className="mb-10">
        {/* Search engine chưa xử lý */}
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
              type="search"
              onChange={e => setKw(e.target.value)}
              value={kw}
              className="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
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
            <i class="fa-solid fa-question-circle"></i>TIN NÓNG 24H
          </h1>
          <p>Tin nóng, tin nhanh toàn quốc, update liên tục 24h</p>
        </div>

        {/* Menu tin tức chính */}
        <div className="mt-5 grid lg:grid-cols-2 gap-2 mx-auto w-full max-w-7xl px-8">
          {article.map((a) => {
            let url = `/article/${a.id}`;
            return (
              <>
                <div className="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:max-w-xl md:flex-row">
                  <div className="flex flex-col justify-start p-6">
                    <Link to={url} alt={a.title}>
                      <h5 className="mb-3 capitalize text-xl font-medium text-neutral-800 dark:text-neutral-50">
                        {a.title}.
                      </h5>
                      <p className="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                        <div
                          dangerouslySetInnerHTML={{ __html: a.description }}
                        />
                      </p>
                    </Link>
                    <p className="text-xs text-neutral-500 dark:text-neutral-300">
                      {a.updated_at}
                    </p>

                  </div>
                </div>
              </>
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

      <section className="mt-10 mx-auto w-full max-w-7xl px-8 mb-24 ">
        <div className="flex items-center gap-4 justify-center">
          <Button
            variant="text"
            className="flex items-center gap-2"
            onClick=""
            disabled="true"
          >
            <ArrowLeftIcon strokeWidth={2} className="h-4 w-4" /> Previous
          </Button>
          <div className="flex items-center gap-2 justify-center ">
            {paginate.slice(1, -1).map((page) => {
              return (
                <>
                  {page.active === true ? (
                    <Button
                      onClick={() => pagination(page.label)}
                      variant="outlined"
                      className="px-3"
                      style={{ borderColor: "black" }}
                    >
                      {page.label}
                    </Button>
                  ) : (
                    <Button
                      onClick={() => pagination(page.label)}
                      variant="outlined"
                      className="px-3"
                    >
                      {page.label}
                    </Button>
                  )}
                </>
              );
            })}
          </div>
          <Button
            variant="text"
            className="flex items-center gap-2"
            onClick=""
            disabled="true"
          >
            Next
            <ArrowRightIcon strokeWidth={2} className="h-4 w-4" />
          </Button>
        </div>
      </section>
    </>
  );
};

export default Home;
