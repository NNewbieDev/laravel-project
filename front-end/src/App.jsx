import React, { useEffect } from "react";
import { Route, Routes as Router } from "react-router-dom";
import { Header } from "./components/layout";
import { Home, Login, Register } from "./pages";
import { useStateContext } from "./context/ContextProvider";
import Footer from "./components/layout/Footer";
import Apis, { endpoints } from "./config/Apis";
const App = () => {
  const { user } = useStateContext();
  //   useEffect(() => {
  //     const load = async () => {
  //       const res = await Apis.get(endpoints["article"]);
  //       console.log(res.data);
  //     };
  //     load();
  //   }, []);
  return (
    <div >
      <Header />
      <Router>
        <Route path="/" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
      </Router>
      <Footer />
    </div>
  );
};

export default App;
