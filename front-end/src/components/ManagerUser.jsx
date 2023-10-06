import React, { useEffect, useState } from "react";
import Manager from "../pages/Manager";
import Apis, { authApi, endpoints } from "../config/Apis";

const ManagerUser = () => {
  const [userAll, setUserAll] = useState();
  useEffect(() => {
    const load = async () => {
      const res = await authApi().get(endpoints["user-getAll"]);
      setUserAll(res.data.data);
    };
    load();
  }, []);
  if (userAll === undefined) {
    return (
      <Manager>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div class="inline-block mt-3 h-8 w-8 animate-spin rounded-full border-4 border-green-btn border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_2s_linear_infinite]"></div>
        </div>
      </Manager>
    );
  }
  return (
    <Manager>
      <div>ManagerUser</div>
    </Manager>
  );
};

export default ManagerUser;
