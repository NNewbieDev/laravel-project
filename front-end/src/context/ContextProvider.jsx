import { useContext, createContext, useState, useEffect, useRef } from "react";
const StateProvider = createContext();

const ContextProvider = ({ children }) => {
  return <StateProvider.Provider value={{}}>{children}</StateProvider.Provider>;
};

export const useStateContext = () => useContext(StateProvider);

export default ContextProvider;
