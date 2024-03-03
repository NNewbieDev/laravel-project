import { faEnvelope, faXmark } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useState } from "react";
import Owner from "./Owner";

const Mail = () => {
  const [toggle, setToggle] = useState(false);

  return (
    <div className="fixed left-5 bottom-5">
      <div
        onClick={() => setToggle((prev) => !prev)}
        className="text-3xl w-20 h-20 rounded-full text-white bg-black flex items-center justify-center"
      >
        <FontAwesomeIcon icon={faEnvelope} />
      </div>
      {toggle && (
        <div className="absolute flex flex-col left-10 bottom-20 w-96 h-96 border border-black rounded-md bg-white">
          <div className="bg-blue-500 basis-1/6 flex items-center justify-between w-full h-14 rounded-tl-md rounded-tr-md">
            <div className="">
              <Owner />
            </div>
            <div
              onClick={() => setToggle(false)}
              className="text-2xl text-white font-semibold w-10 h-10 flex items-center justify-center mr-2 hover:bg-neutral-500 duration-500 cursor-pointer rounded-full"
            >
              <FontAwesomeIcon icon={faXmark} />
            </div>
          </div>
          <div className="basis-2/3 bg-white overflow-y-auto"></div>
          <input
            type="text"
            placeholder="Bạn cần hỗ trợ..."
            className="basis-1/6 caret-white placeholder:text-white cursor-wait:text-white w-full focus-within:outline-none px-5 bg-blue-500 h-10 drop-shadow-lg rounded-bl-md rounded-br-md"
          />
        </div>
      )}
    </div>
  );
};

export default Mail;
