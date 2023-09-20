import React from "react";
import { Route, Routes as Router } from "react-router-dom";
import { Header } from "./components/layout";
import { Login, Register } from "./pages";
import { useStateContext } from "./context/ContextProvider";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faUser } from "@fortawesome/free-solid-svg-icons";
const App = () => {
  const { user } = useStateContext();
  return (
    <div className="font-serif">
      <FontAwesomeIcon icon={faUser} />
      {/* <div className="">{user.username}</div> */}
      <Header />
      <Router>
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
      </Router>
    </div>
  );
};

export default App;
