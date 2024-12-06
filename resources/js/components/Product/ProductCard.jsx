import Tippy from '@tippyjs/react';
import React, { useState } from 'react';
import 'tippy.js/dist/tippy.css';
import { Swiper, SwiperSlide } from 'swiper/react';
import 'swiper/swiper-bundle.css';
import { Pagination } from 'swiper/modules';

const ProductCard = ({ item, width, bgcolor, is_external = false }) => {
  const [showAmbiente, setShowAmbiente] = useState(false);
  const category = item.category;

  return (
    <div className="flex flex-col flex-1 shrink basis-0 min-w-[240px] relative ">
      {Number(item?.price) > 2000 && <div className='w-full h-full absolute z-30 bg-white bg-opacity-40 text-center'>
        <p className='px-6 py-10 font-mulish_Bold text-[20px] '>Productos mayores a U$s 2000 no estan permitidos por la aduana</p>
      </div>}

      <div className="flex flex-col w-full rounded-none ">
        <Swiper
          modules={[Pagination]}
          pagination={{ clickable: true }}
          className="rounded-xl bg-neutral-100 max-md:px-5 w-full"
          loop={true}
        >
          {item.images.map((image, index) => (
            <SwiperSlide key={index}>
              <img
                loading="lazy"
                src={image}
                alt={item.producto}
                className="object-contain aspect-square w-full text-center"
              />
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
      <div className="flex flex-col mt-6 w-full ">
        <div className="flex flex-col w-full">
          <div className="text-base font-medium text-zinc-950">{category?.name ?? ''}</div>
          <a href={`/producto/${item.id}`} className="flex flex-col mt-2 w-full">
            <div
              className="w-full text-2xl font-bold text-black tippy line-clamp-2 h-[64px]"
              title={item.producto}
            >
              {item.name}
            </div>
            {/* <div className="mt-4 text-sm text-zinc-950 text-opacity-60 line-clamp-2">
              {item.name}
            </div> */}
            <div className="flex gap-8 items-center mt-4 w-full">
              <div className="flex gap-3 items-start self-stretch my-auto">
                <div className="flex shrink-0 w-5 h-5 rounded-full bg-slate-600"></div>
                <div className="flex shrink-0 w-5 h-5 rounded-full bg-zinc-950"></div>
              </div>
            </div>
          </a>
        </div>
        <div className="mt-8 text-2xl font-bold text-zinc-950">S/. {(item.price).toFixed(2)}</div>
      </div>
    </div>
  );
};

export default ProductCard;