import React from "react";
import cookie from "react-cookies";

const UserReducer = (state, action) => {
  switch (action.type) {
    case "login":
      return action.payload;
    case "logout":
      cookie.remove("token");
      cookie.remove("user");
      return null;
  }

  return state;
};

export default UserReducer;
