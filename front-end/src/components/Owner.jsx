import React from "react";

const Owner = () => {
  return (
    <div className="flex items-center gap-5 ml-5">
      <div className="w-10 h-10 bg-white rounded-full">
        <img
          className="w-full h-full rounded-full"
          src="https://images.squarespace-cdn.com/content/v1/5e93825bc3cfc806328fe0b7/1588707469194-QBHGXFG7Z9PXINSYOPB8/Tech-Support-Icon.png"
          alt="Support"
        />
      </div>
      <div className="text-white">
        <div className="text-xl">Unknown</div>
        <div className="text-xs">Người hỗ trợ</div>
      </div>
    </div>
  );
};

export default Owner;
