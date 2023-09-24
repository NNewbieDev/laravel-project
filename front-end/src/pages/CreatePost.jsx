import React, { useEffect } from "react";
import Apis, { endpoints } from "../config/Apis";

const CreatePost = () => {
  useEffect(() => {
    const load = async () => {
      const res = await Apis.get(endpoints["category"]);
      console.log(res.data);
    };
    load();
  }, []);

  return <div>CreatePost</div>;
};

export default CreatePost;
