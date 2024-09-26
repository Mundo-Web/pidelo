import React from 'react'

const ProductContainer = ({ item }) => {
  const price = Number(item.precio) || 0
  const discount = Number(item.descuento) || 0
  return (<>
    <div className="rounded-lg bg-white border border-white p-1">
      <img src={`/${item.imagen || 'images/img/noimagen.jpg'}`} className="h-[256px] w-full bg-slate-400 object-cover object-center rounded-md" />
      <div className="py-1 px-2">
        <h2 className="font-normal text-[18px] text-[#333333]">{item.producto} {item.color ? `- ${item.color}`: ''}</h2>
        <div className="flex flex-row gap-2 justify-start items-start ">
          <p className="font-bold text-[24px] text-[#006BF6]">S/ {discount > 0 ? discount.toFixed(2) : price.toFixed(2)}</p>
          {discount > 0 && <p className="font-normal text-[16px] text-custom-border line-through">S/ {price.toFixed(2)}</p>}
        </div>
      </div>
    </div>
  </>)
}

export default ProductContainer