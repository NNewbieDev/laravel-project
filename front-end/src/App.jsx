import React, { useEffect } from "react";
import { Route, Routes as Router } from "react-router-dom";
import { Header } from "./components/layout";
import { CreatePost, Home, Login, Profile, Register } from "./pages";
import { useStateContext } from "./context/ContextProvider";
import Footer from "./components/layout/Footer";
import Apis, { endpoints } from "./config/Apis";
const App = () => {
  return (
    <div className="font-mono">
      <Header />
      <Router>
        <Route path="/" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/profile" element={<Profile />} />
        <Route path="/create-post" element={<CreatePost />} />
      </Router>
      <Footer />
    </div>
  );
};

export default App;
