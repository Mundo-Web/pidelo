import Tippy from '@tippyjs/react';
import React, { useState } from 'react';
import 'tippy.js/dist/tippy.css';

const ProductCard = ({ item, width, bgcolor, is_external = false }) => {
  const [showAmbiente, setShowAmbiente] = useState(false);
  const category = item.category;

  console.log(item)

  console.log([item.precio, Number(item?.precio)])
  return (
    <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px] relative ">
      {Number(item?.precio) > 2000 && <div className='w-full h-full absolute z-30 bg-white bg-opacity-40 text-center'>
        <p className='px-6 py-10 font-mulish_Bold text-[20px] '>Productos mayores a U$s 2000 no estan permitidos por la aduana</p>
      </div>}

      <div className="flex flex-col w-full rounded-none ">
        <div className="flex flex-col justify-center content-center  rounded-xl bg-neutral-100 max-md:px-5">
          <img
            loading="lazy"
            src={is_external ? item.imagen : `/${item.imagen}`}
            alt={item.producto}
            className="object-contain  aspect-square w-full text-center "
          />
        </div>
      </div>
      <div className="flex flex-col mt-6 w-full ">
        <div className="flex flex-col w-full">
          <div className="text-base font-medium text-zinc-950">{category?.name ?? ''}</div>
          <a href={`/producto/${item.id}`} className="flex flex-col mt-2 w-full">
            <div
              className="w-full text-2xl font-bold text-black tippy line-clamp-2 h-[64px]"
              title={item.producto}
            >
              {item.producto}
            </div>
            <div className="mt-4 text-sm text-zinc-950 text-opacity-60 line-clamp-2">
              {item.extract}
            </div>
            <div className="flex gap-8 items-center mt-4 w-full">
              <div className="flex gap-3 items-start self-stretch my-auto">
                <div className="flex shrink-0 w-5 h-5 rounded-full bg-slate-600"></div>
                <div className="flex shrink-0 w-5 h-5 rounded-full bg-zinc-950"></div>
              </div>
            </div>
          </a>
        </div>
        <div className="mt-8 text-2xl font-bold text-zinc-950">S/. {(item.precio * 3.75).toFixed(2)}</div>
      </div>
    </div>
  );
};

export default ProductCard;