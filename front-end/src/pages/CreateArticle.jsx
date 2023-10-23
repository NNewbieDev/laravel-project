import React, { useEffect, useRef, useState } from "react";
import Apis, { authApi, endpoints } from "../config/Apis";
import { useQuill } from "react-quilljs";
import "quill/dist/quill.snow.css";
import { useStateContext } from "../context/ContextProvider";
import { Toast, Warning } from "../components/warning";
import { Link, useNavigate } from "react-router-dom";
import { faCheck } from "@fortawesome/free-solid-svg-icons";
//
const CreateArticle = () => {
  const { user } = useStateContext();
  const [category, setCategory] = useState(null);
  const [image, setImage] = useState(null);
  const [loading, setLoading] = useState(false);
  const [toast, setToast] = useState(false);
  const nav = useNavigate();
  const timeout = useRef();
  const { quill, quillRef } = useQuill({
    placeholder: "Viết nội dung ở đây...",
  });
  const [article, setArticle] = useState({
    title: "",
    category: "",
    description: "",
    content: "",
  });
  const imageUrl = useRef();
  //------------------
  useEffect(() => {
    const load = async () => {
      const res = await Apis.get(endpoints["category"]);
      setCategory(res.data);
    };

    load();
    if (quill) {
      quill.clipboard.dangerouslyPasteHTML("");
      quill.on("text-change", (delta, oldDelta, source) => {
        let text = quill.root.innerHTML;
        setArticle((current) => {
          setLoading(false);
          return { ...current, ["content"]: text };
        });
      });
    }
  }, [quill]);

  if (user === null) {
    return (
      <div className="mt-24 sm:w-3/4 h-96 mx-auto flex justify-center items-center bg-slate-200 rounded-md">
        <Link
          to={"/login"}
          className="bg-blue-600 px-5 py-3 text-white rounded-lg cursor-pointer hover:text-blue-600 hover:bg-white hover:outline hover:outline-blue-600 text-lg font-semibold transition duration-500"
        >
          Vui lòng đăng nhập
        </Link>
      </div>
    );
  }

  if (user.role_id === 1) {
    return (
      <div className="mt-24 sm:w-3/4 w-full h-96 sm:mx-auto flex justify-center items-center bg-slate-100 rounded-md">
        <Warning />
      </div>
    );
  }

  if (category === null) {
    return (
      <div className="inline-block h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
    );
  }
  const change = (e, field) => {
    setArticle((current) => {
      setLoading(false);
      return { ...current, [field]: e.target.value };
    });
  };

  const submit = (e) => {
    e.preventDefault();
    const handle = async () => {
      setLoading(true);
      let form = new FormData();

      for (let field in article)
        if (field !== "") form.append(field, article[field]);
      form.append("image", imageUrl.current.files[0]);
      try {
        const res = await authApi().post(endpoints["create"], form);
        if (res.status === 200) {
          window.scrollTo({ top: 0, left: 0, behavior: "smooth" });
          setToast(true);
        }
      } catch (err) {
        console.log(article);
      }
    };
    handle();
  };

  return (
    <form onSubmit={(e) => submit(e)} className="w-[80%] mx-auto mt-24">
      {toast && (
        <Toast
          icon={faCheck}
          content={"Đã tạo một bài báo mới"}
          Timeout={setToast}
          color={"green-400"}
        />
      )}
      <div className="text-3xl font-semibold my-5">Tạo bài viết</div>
      <div className="border border-slate-300 rounded-md px-5 py-3">
        {/*  */}
        <div className="flex flex-col gap-2">
          <label htmlFor="name" className="text-slate-500 text-lg">
            Tên bài viết
          </label>
          <input
            value={article.title}
            onChange={(e) => {
              setLoading(false);
              change(e, "title");
            }}
            type="text"
            id="name"
            placeholder="tên bài viết"
            className="border border-slate-300 rounded-md px-3 py-2"
          />
        </div>
        {/*  */}
        <div className="">
          <div className="text-slate-500 text-lg mt-3">Thể loại</div>
          <div className=" flex gap-5 mt-2 flex-wrap">
            {category.map((item, index) => {
              return (
                <div
                  onClick={(e) => {
                    setLoading(false);
                    setArticle((cate) => {
                      return { ...cate, ["category"]: item.id };
                    });
                  }}
                  className={`border border-slate-300 px-8 py-3 rounded-md hover:border-blue-600 ${
                    index === article.category - 1 &&
                    "border-blue-500 bg-slate-100"
                  } cursor-pointer`}
                  key={item.id}
                >
                  {item.name}
                </div>
              );
            })}
          </div>
        </div>
        {/*  */}
        <div className="flex flex-col mb-4">
          <label htmlFor="descript" className="text-slate-500 text-lg mt-3">
            Mô tả ngắn
          </label>
          <textarea
            value={article.description}
            name=""
            id="descript"
            cols="30"
            rows="5"
            onChange={(e) => {
              setLoading(false);
              change(e, "description");
            }}
            placeholder="Mô tả ngắn..."
            className=" outline-none rounded-md outline-slate-300 border-none px-5 py-2 mt-3"
          ></textarea>
        </div>
        {/*  */}
        <div className="mb-4 border h-40 overflow-y-auto" ref={quillRef}></div>
        {/*  */}
        <div className="">
          <div className="text-slate-500 text-lg mt-3">Ảnh minh họa</div>
          <input
            ref={imageUrl}
            type="file"
            onChange={(e) => {
              setLoading(false);
              if (e.target.files || e.target.files[0])
                setImage(URL.createObjectURL(e.target.files[0]));
            }}
            name="image"
            className="border p-2 w-full mt-2 text-slate-500 rounded-lg"
          />
          <div className=" flex justify-center">
            <img
              src={image}
              alt="Ảnh minh họa"
              className="w-96 border h-56 my-3 p-2 rounded-lg"
            />
          </div>
        </div>
        {/*  */}
        {loading ? (
          <div className="w-full flex justify-center">
            <div className="inline-block mt-3 h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
          </div>
        ) : (
          <input
            type="submit"
            className="cursor-pointer w-full py-3 bg-blue-500 text-white text-xl font-semibold text-center rounded-md mt-4"
            value={"Tạo bài viết"}
          />
        )}
      </div>
    </form>
  );
};

export default CreateArticle;
