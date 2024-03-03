import React, { useEffect, useState } from "react";
import Manager from "../pages/Manager";
import { Bar, Pie } from "react-chartjs-2";
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from "chart.js";
import { authApi, endpoints } from "../config/Apis";
import { useNavigate } from "react-router-dom";
import { useStateContext } from "../context/ContextProvider";

ChartJS.register(ArcElement, Tooltip, Legend);

const Statistic = () => {
  const [data, setData] = useState();
  const { dispatch } = useStateContext();
  const nav = useNavigate();

  useEffect(() => {
    const load = async () => {
      try {
        const res = await authApi().get(endpoints["statisArticle"]);
        if (res.status === 200) {
          setData(res.data);
        }
      } catch (err) {
        dispatch({ type: "logout" });
        nav("/login");
      }
    };
    load();
  }, [data]);
  if (data === undefined) {
    return (
      <Manager>
        <div className="sm:w-3/4 mt-10 w-full sm:mx-auto flex justify-center">
          <div className="">Đang load...</div>
        </div>
      </Manager>
    );
  } else {
    return (
      <Manager>
        <div className="w-96 h-96 drop-shadow-lg">
          <Pie
            data={{
              labels: data.map((c) => c.category_name),
              datasets: [
                {
                  label: "Tổng số báo",
                  data: data.map((c) => c.category_count),
                  backgroundColor: [
                    "rgba(255, 99, 132, 0.2)",
                    "rgba(54, 162, 235, 0.2)",
                    "rgba(255, 206, 86, 0.2)",
                    "rgba(75, 192, 192, 0.2)",
                    "rgba(153, 102, 255, 0.2)",
                    "rgba(255, 159, 64, 0.2)",
                  ],
                  borderColor: [
                    "rgba(255, 99, 132, 1)",
                    "rgba(54, 162, 235, 1)",
                    "rgba(255, 206, 86, 1)",
                    "rgba(75, 192, 192, 1)",
                    "rgba(153, 102, 255, 1)",
                    "rgba(255, 159, 64, 1)",
                  ],
                  borderWidth: 1,
                },
              ],
            }}
          />
        </div>
      </Manager>
    );
  }
};

export default Statistic;
