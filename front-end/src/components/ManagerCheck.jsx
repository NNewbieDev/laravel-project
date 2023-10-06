import React from "react";
import Manager from "../pages/Manager";
import { Link } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";

const features = [
  { name: "Người dùng", link: "/approve/user" },
  { name: "Bài viết", link: "/approve/article" },
];

const ManagerCheck = ({ children }) => {
  const { checkItem, setCheckItem } = useStateContext();

  return (
    <Manager>
      <div className="">
        <div className="flex gap-2">
          {features.map((item, index) => {
            return (
              <Link
                to={item.link}
                key={index}
                onClick={() => setCheckItem(index)}
                className={`${
                  checkItem === index && "bg-neutral-200"
                } px-5 py-2 rounded-lg border hover:bg-neutral-200`}
              >
                <div className="">{item.name}</div>
              </Link>
            );
          })}
        </div>
        <div className="mt-5">{children}</div>
      </div>
    </Manager>
  );
};

export default ManagerCheck;
