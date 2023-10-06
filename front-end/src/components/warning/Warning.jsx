import React from "react";
import { authApi, endpoints } from "../../config/Apis";
import { useNavigate } from "react-router-dom";

const Warning = () => {
  const nav = useNavigate();
  const submit = (e) => {
    e.preventDefault();
    const handle = async () => {
      const res = await authApi().put(endpoints["user-send"], {
        content: "SENT",
      });
      if (res.status === 201) {
        nav("/");
      }
    };
    handle();
  };
  return (
    <form onSubmit={(e) => submit(e)} className="text-center">
      <div className="text-xl font-semibold">
        Bạn không đủ quyền để sử dụng tiện ích này
      </div>
      <button
        type="submit"
        className="mt-3 bg-blue-600 px-5 py-3 text-white rounded-lg cursor-pointer hover:text-blue-600 hover:bg-white hover:outline hover:outline-blue-600 text-lg font-semibold transition duration-500"
      >
        Gửi yêu cầu nâng cấp quyền
      </button>
    </form>
  );
};

export default Warning;
