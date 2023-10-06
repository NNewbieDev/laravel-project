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
  const [isLogin, setIsLogin] = useState(false);
  const [checked, setChecked] = useState(0);
  const [checkManager, setCheckManager] = useState(0);
  const [checkItem, setCheckItem] = useState(0);

  return (
    <StateProvider.Provider
      value={{
        user,
        dispatch,
        isLogin,
        setIsLogin,
        checked,
        setChecked,
        checkManager,
        setCheckManager,
        checkItem,
        setCheckItem,
      }}
    >
      {children}
    </StateProvider.Provider>
  );
};

export const useStateContext = () => useContext(StateProvider);

export default ContextProvider;
