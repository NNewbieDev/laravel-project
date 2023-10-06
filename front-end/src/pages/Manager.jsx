import { faBook, faGears, faUser } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useEffect } from "react";
import { Link } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";

const navManager = [
  { name: "Kiểm duyệt", link: "/approve/user", icon: faGears },
  { name: "Quản lý người dùng", link: "/manager/user", icon: faUser },
  { name: "Quản lý bài viết", link: "/manager/article", icon: faBook },
];

const Manager = ({ children }) => {
  const { checkManager, setCheckManager, setCheckItem } = useStateContext();
  useEffect(() => {}, []);
  return (
    <div className="mt-24 flex gap-5">
      {/*  */}
      <div className="basis-1/5 flex flex-col gap-2">
        {navManager.map((item, index) => {
          return (
            <Link
              to={item.link}
              key={index}
              onClick={() => {
                setCheckManager(index);
                setCheckItem(0);
              }}
              className={`${
                checkManager === index && "bg-blue-500 text-white"
              } flex gap-2 border transition duration-500 border-neutral-300 rounded-tr-xl rounded-br-xl text-xl font-semibold hover:cursor-pointer hover:bg-neutral-400 hover:text-white px-3 py-2 `}
            >
              <div className="">
                <FontAwesomeIcon icon={item.icon} />
              </div>
              <div className="">{item.name}</div>
            </Link>
          );
        })}
      </div>
      {/*  */}
      <div className="basis-4/5">{children}</div>
    </div>
  );
};

export default Manager;
