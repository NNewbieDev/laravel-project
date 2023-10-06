import { faXmark } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useEffect, useRef } from "react";

const Toast = ({ content, icon, timeout }) => {
  const time = useRef();
  useEffect(() => {
    time.current = setInterval(() => {
      // xu ly useState
    }, 3000);
    return () => {
      clearInterval(time.current);
    };
  }, []);
  return (
    <div className="fixed z-50 flex items-center">
      <div className="">
        <FontAwesomeIcon icon={icon} />
      </div>
      <div className="px-3">{content}</div>
      <div className="">
        <FontAwesomeIcon icon={faXmark} />
      </div>
    </div>
  );
};

export default Toast;
