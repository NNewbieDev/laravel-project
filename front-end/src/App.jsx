import React from "react";
import { Route, Routes as Router } from "react-router-dom";
import { Header } from "./components/layout";
import { CreatePost, Home, Login, Profile, Register, ArticleDetail } from "./pages";
import Footer from "./components/layout/Footer";

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
        <Route path="/article/:articleId" element={<ArticleDetail />} />

      </Router>
      <Footer />
    </div>
  );
};

export default App;
