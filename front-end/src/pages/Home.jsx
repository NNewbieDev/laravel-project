import React, { useEffect, useState } from 'react'
import Apis, { endpoints } from '../config/Apis';


const Home = () => {
  const [article, setArticle] = useState([]);

  useEffect(() => {
    async function fecthArticle() {
      const e = endpoints['article'];
      const res = await Apis.get(e);
      setArticle(res.data);
    }
    fecthArticle()
  }, [])
  console.log(article);


  if (article === null)
    <div>Loading</div>;

  return (
    <>
    <div className="mt-10 grid grid-cols-2 gap-2 mx-auto w-full max-w-7xl px-8">
      {article.map(a => {
        let url = `/detail/${a.id}`;
        return (
          <>
            {/* <section className='p-5 flex'>
              <div className="max-w-sm rounded overflow-hidden shadow-lg p-2">
                <div className="px-6 py-4">
                  <div className="font-bold text-xl mb-2">{a.title}</div>
                  <section className="text-gray-700 text-base">{a.description}</section>
                </div>
                <div className="px-6 pt-4 pb-2">
                  <span className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#tin-nhanh</span>
                  <span className="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#tin-nóng</span>
                </div>
              </div>
            </section> */}
            <div
              className="rounded-lg bg-white shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700 md:max-w-xl md:flex-row">
              {/* <img
                className="h-96 w-full rounded-t-lg object-cover md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                src="https://tecdn.b-cdn.net/wp-content/uploads/2020/06/vertical.jpg"
                alt="" /> */}
              <div className="flex flex-col justify-start p-6">
                <h5
                  className="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                  {a.title}
                </h5>
                <p className="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                  <div dangerouslySetInnerHTML={{ __html: a.description }} />
                </p>
                <p className="text-xs text-neutral-500 dark:text-neutral-300">
                  {a.updated_at}
                </p>
              </div>
            </div>

          </>
        );

      })
      }
        </div>
      
    </>
  )
}

export default Home