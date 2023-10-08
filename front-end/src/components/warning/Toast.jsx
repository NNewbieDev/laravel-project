import { faXmark } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useEffect, useRef } from "react";

const Toast = ({ content, icon, Timeout, color }) => {
  const time = useRef();
  useEffect(() => {
    time.current = setInterval(() => {
      Timeout(false);
    }, 3000);
    return () => {
      clearInterval(time.current);
    };
  }, []);
  return (
    <div className="fixed z-50 min-w-[20rem] flex justify-evenly items-center gap-5 rounded-full shadow-lg top-24 right-10 border-2 bg-white p-3">
      <div
        className={`font-semibold w-10 h-10 flex items-center justify-center rounded-full bg-${color} text-neutral-50`}
      >
        <FontAwesomeIcon icon={icon} />
      </div>
      <div className={`text-${color} font-semibold`}>{content}</div>
      <div
        className="hover:cursor-pointer hover:text-red-600 transition duration-300"
        onClick={() => Timeout(false)}
      >
        <FontAwesomeIcon icon={faXmark} />
      </div>
    </div>
  );
};

export default Toast;
