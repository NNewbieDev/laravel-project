import {
  useContext,
  createContext,
  useState,
  useEffect,
  useRef,
  useReducer,
} from "react";
import UserReducer from "../reducer/UserReducer";
import cookie from "react-cookies";
const StateProvider = createContext();

const ContextProvider = ({ children }) => {
  const [user, dispatch] = useReducer(UserReducer, cookie.load("user") || null);
  return (
    <StateProvider.Provider value={{ user, dispatch }}>
      {children}
    </StateProvider.Provider>
  );
};

export const useStateContext = () => useContext(StateProvider);

export default ContextProvider;
