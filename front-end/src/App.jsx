import React from "react";
import { Route, Routes as Router } from "react-router-dom";
import { Header } from "./components/layout";
import {
  CreatePost,
  Home,
  Login,
  Profile,
  Register,
  ArticleDetail,
  CreateArticle,
  UpdateArticle,
} from "./pages";
import Footer from "./components/layout/Footer";
import {
  CheckArticle,
  CheckUser,
  GeneralInfo,
  ManagerArticle,
  ManagerCheck,
  ManagerUser,
  YourPost,
} from "./components";
import Manager from "./pages/Manager";

const App = () => {
  return (
    <div className="font-display">
      <Header />
      <Router>
        <Route path="/" element={<Home />} />
        <Route path="/login" element={<Login />} />
        <Route path="/register" element={<Register />} />
        <Route path="/profile" element={<GeneralInfo />} />
        <Route path="/article" element={<YourPost />} />
        <Route path="/article/create" element={<CreateArticle />} />
        <Route path="/article/update" element={<UpdateArticle />} />
        <Route path="/article/:articleId" element={<ArticleDetail />} />
        <Route path="/manager/user" element={<ManagerUser />} />
        <Route path="/manager/article" element={<ManagerArticle />} />
        <Route path="/approve/user" element={<CheckUser />} />
        <Route path="/approve/article" element={<CheckArticle />} />
      </Router>
      <Footer />
    </div>
  );
};

export default App;
