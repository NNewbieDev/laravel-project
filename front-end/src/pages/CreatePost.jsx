import React, { useEffect, useRef, useState } from "react";
import Apis, { authApi, endpoints } from "../config/Apis";
import { useQuill } from "react-quilljs";
import "quill/dist/quill.snow.css";
const CreatePost = () => {
  const [category, setCategory] = useState(null);
  const [image, setImage] = useState(null);
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
      console.log(res.data);
      setCategory(res.data);
    };

    load();
    if (quill) {
      quill.clipboard.dangerouslyPasteHTML("");
      quill.on("text-change", (delta, oldDelta, source) => {
        let text = quill.root.innerHTML;
        setArticle((current) => {
          return { ...current, ["content"]: text };
        });
      });
    }
  }, [quill]);

  if (category === null) {
    return (
      <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
    );
  }
  const change = (e, field) => {
    setArticle((current) => {
      return { ...current, [field]: e.target.value };
    });
  };

  const submit = (e) => {
    e.preventDefault();
    const handle = async () => {
      let form = new FormData();

      for (let field in article)
        if (field !== "") form.append(field, article[field]);
      form.append("image", imageUrl.current.files[0]);
      //       form.append("image");
      console.log(form);
      const res = await authApi().post(endpoints["create"], form);
      console.log(res.status);
    };
    handle();
  };

  return (
    <form onSubmit={(e) => submit(e)} className="w-[80%] mx-auto mt-24">
      <div className="text-3xl font-semibold my-5">Tạo bài viết</div>
      <div className="border border-slate-300 rounded-md px-5 py-3">
        {/*  */}
        <div className="flex flex-col gap-2">
          <label htmlFor="name" className="text-slate-500 text-lg">
            Tên bài viết
          </label>
          <input
            value={article.title}
            onChange={(e) => change(e, "title")}
            type="text"
            id="name"
            placeholder="tên bài viết"
            className="border border-slate-300 rounded-md px-3 py-2"
          />
        </div>
        {/*  */}
        <div className="">
          <div className="text-slate-500 text-lg mt-3">Thể loại</div>
          <div className=" flex gap-5 mt-2">
            {category.map((item, index) => {
              return (
                <div
                  onClick={(e) =>
                    setArticle((cate) => {
                      return { ...cate, ["category"]: item.id };
                    })
                  }
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
            onChange={(e) => change(e, "description")}
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
              if (e.target.files || e.target.files[0])
                setImage(URL.createObjectURL(e.target.files[0]));
            }}
            name="image"
            className="border p-2 w-full mt-2 text-slate-500 rounded-lg"
          />
          <div>
            <img
              src={image}
              alt="Ảnh minh họa"
              className="w-96 border h-56 my-3 p-2 rounded-lg"
            />
          </div>
        </div>
        {/*  */}
        <input
          type="submit"
          className="cursor-pointer w-full py-3 bg-blue-500 text-white text-xl font-semibold text-center rounded-md mt-4"
          value={"Tạo bài viết"}
        />
      </div>
    </form>
  );
};

export default CreatePost;
