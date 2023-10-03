import React from "react";

const Warning = () => {
  return (
    <div className="text-center">
      <div className="text-xl font-semibold">
        Bạn không đủ quyền để sử dụng tiện ích này
      </div>
      <div className="mt-3 bg-blue-600 px-5 py-3 text-white rounded-lg cursor-pointer hover:text-blue-600 hover:bg-white hover:outline hover:outline-blue-600 text-lg font-semibold transition duration-500">
        Gửi yêu cầu nâng cấp quyền
      </div>
    </div>
  );
};

export default Warning;
