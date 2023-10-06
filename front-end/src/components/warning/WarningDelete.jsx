import { faCheck, faXmark } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React from "react";
import { authApi, endpoints } from "../../config/Apis";
import { useNavigate } from "react-router-dom";

const WarningDelete = (props) => {
  const nav = useNavigate();
  const submit = (e) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().delete(
        endpoints["delete-article"](props.articleID)
      );
      if (res.status === 200) nav("/profile");
    };
    handle();
  };
  return (
    <form
      onSubmit={(e) => submit(e)}
      className="fixed top-0 bottom-0 left-0 right-0 drop-shadow-xl bg-neutral-300/20 flex items-center justify-center"
    >
      <div className="bg-white h-72 w-96 rounded-lg box-border">
        {/* Close btn */}
        <div className="bg-orange-300 h-14 flex rounded-tr-lg rounded-tl-lg items-center justify-end ">
          <div
            onClick={props.onHandleClose}
            className=" text-white text-3xl font-semibold flex items-center mr-3 cursor-pointer "
          >
            <FontAwesomeIcon
              icon={faXmark}
              className="rounded-full hover:bg-neutral-400/50 px-3 py-2 transition duration-500 "
            />
          </div>
        </div>
        {/*  */}
        <div className="flex flex-col justify-evenly items-center h-full ">
          <div className="text-xl font-semibold">
            Bạn chắc chắn muốn xóa bái viết này?
          </div>
          <div className="flex justify-around w-full">
            <div
              onClick={props.onHandleClose}
              className="flex gap-2 px-5 hover:bg-neutral-400/50 transition duration-500 py-1 bg-orange-300 text-white rounded-md drop-shadow-lg text-lg cursor-pointer"
            >
              <div className="">
                <FontAwesomeIcon icon={faXmark} />
              </div>
              <div className="">Hủy</div>
            </div>
            <button
              type="submit"
              className="flex gap-2 px-5 hover:bg-neutral-400/50 transition duration-500 py-1 bg-red-400 text-white rounded-md drop-shadow-lg text-lg cursor-pointer"
            >
              <div className="">
                <FontAwesomeIcon icon={faCheck} />
              </div>
              <div className="">Xác nhận</div>
            </button>
          </div>
        </div>
      </div>
    </form>
  );
};

export default WarningDelete;
