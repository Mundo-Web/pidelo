import Tippy from '@tippyjs/react';
import React, { useState } from 'react';
import 'tippy.js/dist/tippy.css';

const ProductCard = ({ item, width, bgcolor, is_reseller }) => {
  const [showAmbiente, setShowAmbiente] = useState(false);
  const category = item.category;

  console.log(item)

  return (
    <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px]">
      <div className="flex flex-col w-full rounded-none">
        <div className="flex flex-col justify-center content-center px-12 py-16 rounded-xl bg-neutral-100 max-md:px-5">
          <img
            loading="lazy"
            src={`/${item.imagen}`}
            alt={item.producto}
            className="object-cover  aspect-square w-full text-center "
          />
        </div>
      </div>
      <div className="flex flex-col mt-6 w-full">
        <div className="flex flex-col w-full">
          <div className="text-base font-medium text-zinc-950">Smartphone</div>
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
        <div className="mt-8 text-2xl font-bold text-zinc-950">S/. {item.precio}</div>
      </div>
    </div>
  );
};

export default ProductCard;