import React, { useEffect, useState } from "react";
import Apis, { endpoints } from "../config/Apis";

const CreatePost = () => {
  const [category, setCategory] = useState(null);
  const [article, setArticle] = useState({
    title: "",
    category: "",
    description: "",
    content: "",
  });
  useEffect(() => {
    const load = async () => {
      const res = await Apis.get(endpoints["category"]);
      console.log(res.data);
      setCategory(res.data);
    };
    load();
  }, []);

  if (category === null) {
    return (
      <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
    );
  }

  return (
    <form className="w-[80%] mx-auto">
      <div className="text-3xl font-semibold my-5">Tạo bài viết</div>
      <div className="border border-slate-300 rounded-md px-5 py-3">
        {/*  */}
        <div className="flex flex-col gap-2">
          <label htmlFor="name" className="text-slate-500 text-lg">
            Tên bài viết
          </label>
          <input
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
                  key={item.id}
                  className="border border-slate-300 px-8 py-3 rounded-md"
                >
                  {item.name}
                </div>
              );
            })}
          </div>
        </div>
        {/*  */}
        <div className="flex flex-col">
          <label htmlFor="descript" className="text-slate-500 text-lg mt-3">
            Mô tả ngắn
          </label>
          <textarea
            name=""
            id="descript"
            cols="30"
            rows="5"
            placeholder="Mô tả ngắn..."
            className=" outline-none rounded-md outline-slate-300 border-none px-5 py-2 mt-3"
          ></textarea>
        </div>
        {/*  */}
        <input
          className=" w-full py-3 bg-blue-500 text-white text-xl font-semibold text-center rounded-md mt-4"
          value={"Tạo bài viết"}
        />
      </div>
    </form>
  );
};

export default CreatePost;
