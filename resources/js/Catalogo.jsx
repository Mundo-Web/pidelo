import React, { useEffect, useState, useRef } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from './Utils/CreateReactScript'
import FilterContainer from './components/Filter/FilterContainer'
import ProductContainer from './components/Product/ProductContainer'
import { Fetch } from 'sode-extend-react'
import FilterPagination from './components/Filter/FilterPagination'
import arrayJoin from './Utils/ArrayJoin'
import ProductCard from './components/Product/ProductCard'
import { set } from 'sode-extend-react/sources/cookies'
import axios from 'axios'
import { Swiper, SwiperSlide } from 'swiper/react'
import { Navigation } from 'swiper/modules';
import { Pagination } from 'swiper/modules';





const Catalogo = ({ minPrice, maxPrice, categories, tags, attribute_values, id_cat: selected_category, tag_id, subCatId, categoriasAll }) => {
  const take = 12
  const [items, setItems] = useState([]);
  const [filter, setFilter] = useState({});
  const [totalCount, setTotalCount] = useState(0);
  const [currentPage, setCurrentPage] = useState(1);
  const [showModal, setShowModal] = useState(false);
  const is_proveedor = useRef(false);
  const cancelTokenSource = useRef(null);

  useEffect(() => {
    const script = document.createElement('script');
    script.src = "js/notify.extend.min.js";
    script.async = true;
    document.body.appendChild(script);

    return () => {
      document.body.removeChild(script);
    };
  }, []);

  const realizarBusqueda = async (amz) => { // items relacionados 

    console.log(amz)

    if (cancelTokenSource.current) {
      cancelTokenSource.current.cancel('Operation canceled due to new request.');
    }

    // Crear un nuevo token de cancelación
    cancelTokenSource.current = axios.CancelToken.source();

    let url = `127.0.0.1:8080/api/amazon/search?query=${amz}`
    try {
      const response = await axios.get(url)
      const { data, status } = response
      if (status === 200) {
        const datos = data.map(item => {
          return {
            id: item.uuid,
            producto: item.name, imagen: item.img, extract: item.Description ?? '',
            precio: item.price,
            category: { name: item.CategoryNames[0] ?? '' }
          }
        })

        console.log(datos)

        is_proveedor.current = true;
        setItems(datos)
      }
      console.log(response)
    } catch (error) {
      console.log(error)
    }


    /*  imagen
     producto
     extract
     precio */


  }
  const itemsamazon = async (word) => {

    console.log(word)

    if (cancelTokenSource.current) {
      cancelTokenSource.current.cancel('Operation canceled due to new request.');
    }

    // Crear un nuevo token de cancelación
    cancelTokenSource.current = axios.CancelToken.source();

    const options = {
      cancelToken: cancelTokenSource.current.token,
      method: 'GET',
      url: 'http://127.0.0.1:8080/api/amazon/search',
      params: {
        query: word,
        page: '1',
        country: 'US',
        sort_by: 'RELEVANCE',
        product_condition: 'ALL',
        is_prime: 'false',
        deals_and_discounts: 'NONE'
      },
      headers: {
        'x-rapidapi-key': 'fe172f3a7emshd5f1ac69eea5682p1d9dc7jsn5bce9792d4cc',
        'x-rapidapi-host': 'real-time-amazon-data.p.rapidapi.com'
      }
    };

    try {
      const response = await axios.request(options);
      console.log(response.data);
      const data = response.data
      const datos = data.map(item => {
        return {
          id: item.uuid,
          producto: item.name, imagen: item.img, extract: item.Description ?? '',
          precio: item.price,
          // category: { name: item.CategoryNames[0] ?? '' }
        }
      })
      is_proveedor.current = true;
      setItems(datos)
    } catch (error) {
      console.error(error);
    }
  }

  useEffect(() => {
    // Leer el parámetro 'tag' de la URL
    const params = new URLSearchParams(window.location.search);
    const tag = params.get('tag');
    const amz = params.get('amzs');

    // Actualizar el filtro con el 'tag_id' si existe
    if (amz) {
      // realizarBusqueda(amz)
      itemsamazon(amz)
      return
    }
    if (tag) {
      setFilter(prevFilter => ({
        ...prevFilter,
        'txp.tag_id': [tag]
      }));
    }



    // Si hay una categoría seleccionada, agregarla al filtro
    if (selected_category) {
      setFilter(prevFilter => ({
        ...prevFilter,
        category_id: [selected_category]
      }));
    }
  }, [selected_category]);

  useEffect(() => {

    const params = new URLSearchParams(window.location.search);
    const tag = params.get('tag');
    const amz = params.get('amzs');

    // Actualizar el filtro con el 'tag_id' si existe
    if (amz) {
      // realizarBusqueda(amz)
      itemsamazon(amz)
      return
    }

    setCurrentPage(1);
    getItems();
  }, [filter]);

  useEffect(() => {
    const params = new URLSearchParams(window.location.search);
    const tag = params.get('tag');
    const amz = params.get('amzs');

    // Actualizar el filtro con el 'tag_id' si existe
    if (amz) {
      // realizarBusqueda(amz)
      itemsamazon(amz)
      return
    }
    getItems();
  }, [currentPage]);

  useEffect(() => {
    const params = new URLSearchParams(window.location.search);
    const tag = params.get('tag');
    const amz = params.get('amzs');

    // Actualizar el filtro con el 'tag_id' si existe
    if (amz) {
      // realizarBusqueda(amz)
      itemsamazon(amz)
      return
    }
    if (subCatId !== null) {
      setFilter({ ...filter, subcategory_id: [subCatId] });
    }
  }, []);

  const getItems = async () => {
    // Cancelar la solicitud anterior si existe
    if (cancelTokenSource.current) {
      cancelTokenSource.current.cancel('Operation canceled due to new request.');
    }

    // Crear un nuevo token de cancelación
    cancelTokenSource.current = axios.CancelToken.source();

    const filterBody = [];

    if (filter.maxPrice || filter.minPrice) {
      if (filter.maxPrice && filter.minPrice) {
        filterBody.push([
          [
            ['precio', '>=', filter.minPrice],
            'or',
            [
              ['descuento', '>=', filter.minPrice],
              'and',
              ['descuento', '<>', 0]
            ]
          ],
          'and',
          [
            ['precio', '<=', filter.maxPrice],
            'or',
            [
              ['descuento', '<=', filter.maxPrice],
              'and',
              ['descuento', '<>', 0]
            ]
          ]
        ]);
      } else if (filter.minPrice) {
        filterBody.push([
          ['precio', '>=', filter.minPrice],
          'or',
          [
            ['descuento', '>=', filter.minPrice],
            'and',
            ['descuento', '<>', 0]
          ]
        ]);
      } else if (filter.maxPrice) {
        filterBody.push([
          ['precio', '<=', filter.maxPrice],
          'or',
          [
            ['descuento', '<=', filter.maxPrice],
            'and',
            ['descuento', '<>', 0]
          ]
        ]);
      }
    }

    if (filter['txp.tag_id'] && filter['txp.tag_id'].length > 0) {
      const tagsFilter = [];
      filter['txp.tag_id'].forEach((x, i) => {
        if (i === 0) {
          tagsFilter.push(['txp.tag_id', '=', x]);
        } else {
          tagsFilter.push('or', ['txp.tag_id', '=', x]);
        }
      });
      filterBody.push(tagsFilter);
    }

    for (const key in filter) {
      if (!key.startsWith('attribute-')) continue;
      if (filter[key].length === 0) continue;
      const [, attribute_id] = key.split('-');
      const attributeFilter = [];
      filter[key].forEach((x, i) => {
        if (i === 0) {
          attributeFilter.push(['apv.attribute_value_id', '=', x]);
        } else {
          attributeFilter.push('or', ['apv.attribute_value_id', '=', x]);
        }
      });
      filterBody.push([
        ['a.id', '=', attribute_id],
        'and',
        attributeFilter
      ]);
    }

    if (filter['category_id'] && filter['category_id'].length > 0) {
      const categoryFilter = [];
      filter['category_id'].forEach((x, i) => {
        if (i === 0) {
          categoryFilter.push(['categoria_id', '=', x]);
        } else {
          categoryFilter.push('or', ['categoria_id', '=', x]);
        }
      });
      filterBody.push(categoryFilter);
    }

    if (filter['subcategory_id'] && filter['subcategory_id'].length > 0) {
      const subcategoryFilter = [];
      filter['subcategory_id'].forEach((x, i) => {
        if (i === 0) {
          subcategoryFilter.push(['subcategory_id', '=', x]);
        } else {
          subcategoryFilter.push('or', ['subcategory_id', '=', x]);
        }
      });
      filterBody.push(subcategoryFilter);
    }

    try {
      const { status, data: result } = await axios.post('/api/products/paginate', {
        requireTotalCount: true,
        filter: arrayJoin([...filterBody, ['products.visible', '=', true]], 'and'),
        take,
        skip: take * (currentPage - 1)
      }, {
        headers: {
          'Content-Type': 'application/json'
        },
        cancelToken: cancelTokenSource.current.token
      });

      is_proveedor.current = result?.is_proveedor ?? false;

      setItems(result?.data ?? []);
      setTotalCount(result?.totalCount ?? 0);
    } catch (error) {
      if (axios.isCancel(error)) {
        console.log('Request canceled', error.message);
      } else {
        // Manejar otros errores
        console.error(error);
      }
    }
  };

  const attributes = attribute_values.reduce((acc, item) => {
    // If the attribute_id does not exist in the accumulator, create a new array for it
    if (!acc[item.attribute_id]) {
      acc[item.attribute_id] = [];
    }
    // Add the current item to the array corresponding to its attribute_id
    acc[item.attribute_id].push(item);
    return acc;
  }, {});
  const chunkArray = (array, size) => {
    const chunkedArr = [];
    for (let i = 0; i < array.length; i += size) {
      chunkedArr.push(array.slice(i, i + size));
    }
    return chunkedArr;
  };
  const chunkedCategorias = chunkArray(categoriasAll, 2);



  return (<>
    <style>

    </style>
    <section className="mx-[5%] my-16">
      <div className="mt-20 w-full max-md:mt-10 max-md:max-w-full relative">
        <div className="flex flex-row gap-10 justify-between items-center pb-6 w-full border-b border-neutral-200 max-md:max-w-full">
          <div className="self-stretch my-auto text-3xl font-mulish_Bold text-zinc-950">
            Comprar por categorías
          </div>
          <div className="flex gap-3 justify-center items-center self-stretch my-auto">
            <div className="prev-cat flex gap-2.5 items-center self-stretch p-2 my-auto w-8 h-8 bg-[#9AFA26] rounded-lg">
              <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/38dbc3ba3fafac21d9cd9793b6015a45a393c978dc223540590f965ac0b01667?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                className="object-contain w-4 aspect-square"
                alt="Previous"
              />
            </div>
            <div className="next-cat flex gap-2.5 items-center self-stretch py-2 pr-2 pl-2 my-auto w-8 h-8 rounded-lg bg-zinc-50">
              <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d954cd5757b6a0e2575ce9ba5cb67ae9662122dc7e0e72c6babd8f86a1f377c?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                className="object-contain aspect-[1.06] w-[17px]"
                alt="Next"
              />
            </div>
          </div>
        </div>

        <div className="content-center text-center mt-6">
          <Swiper
            className="swiper categorias-slider flex items-center justify-center h-max"
            slidesPerView={1}
            spaceBetween={20}
            loop={true}
            grabCursor={true}
            centeredSlides={false}
            initialSlide={0}

            navigation={{
              nextEl: '.next-cat',
              prevEl: '.prev-cat',
            }}
            breakpoints={{
              0: {
                slidesPerView: 2,
              },
              1024: {
                slidesPerView: 4,
              },
            }}
          >
            {chunkedCategorias.map((chunk, chunkIndex) => (
              <SwiperSlide key={chunkIndex} className="swiper-slide flex items-center justify-center gap-2">
                {chunk.map((item, itemIndex) => (
                  <a
                    key={itemIndex}
                    href={`/catalogo/${item.id}`}
                    className="mt-4 flex gap-2 items-center self-stretch px-4 py-2 my-auto rounded-xl bg-[#F7F7F7] bg-opacity-35 hover:bg-neutral-100 w-full cursor-pointer group"
                  >
                    <img
                      loading="lazy"
                      src={`/${item.url_image}/${item.name_image}`}
                      alt=""
                      className="object-contain shrink-0 self-stretch my-auto aspect-square w-[120px]"
                    />
                    <div className="flex flex-col justify-start self-stretch my-auto text-start">
                      <div className="text-base font-mulish_Bold text-zinc-950">
                        {item.name}
                      </div>
                      <div className="mt-2 text-xs font-mulish_Medium text-[#0A090B] text-opacity-40 group-hover:text-blue-500 group-hover:underline">
                        Ver más
                      </div>
                    </div>
                  </a>
                ))}
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </div>
    </section>
    <form className="flex flex-col md:flex-row gap-6  mx-auto font-mulish_Regular  w-full" style={{ padding: '40px' }}>
      <section className="hidden md:flex md:flex-col gap-4 md:basis-3/12 bg-white p-6 rounded-lg h-max md:sticky top-2">
        <FilterContainer setFilter={setFilter} filter={filter} minPrice={minPrice ?? 0} maxPrice={maxPrice ?? 0} categories={categories} tags={tags} attribute_values={Object.values(attributes)} selected_category={selected_category} tag_id={tag_id} />
      </section>
      <section className="flex flex-col gap-6 md:basis-9/12">
        <div className="w-full bg-white rounded-lg font-mulish_Medium  flex flex-row justify-between items-center px-2 py-3">
          <div className='flex flex-row gap-2'>
            <span className="font-mulish_Regular  text-[17px] text-[#666666] ml-3">
              Mostrando {((currentPage - 1) * take) + 1} - {currentPage * take > totalCount ? totalCount : currentPage * take} de {totalCount} resultados
            </span>
            <button type="button" className='md:hidden text-[#006BF6]' onClick={() => setShowModal(true)}> Mostrar Filtros</button>
          </div>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4 md:pr-4">
          {items.map((item, i) => <ProductCard key={`product-${item.id}`} item={item} bgcolor={'bg-white'} is_external={is_proveedor.current} />)}
        </div>
        <div className="w-full font-mulish_Medium flex flex-row justify-center items-center">
          <FilterPagination current={currentPage} setCurrent={setCurrentPage} pages={Math.ceil(totalCount / take)} />
        </div>
      </section>
      {/* modal */}

      {showModal && (<div className="fixed z-40 top-0 left-0 w-full h-full bg-black bg-opacity-50 flex justify-center items-center max-h-[80vh] " id="modal">
        {/* btn para cerrar modal */}
        <div className="z-50 flex items-center content-center justify-center absolute  p-4 bg-black rounded-full h-6 w-6" style={{ top: '20px', right: '20px' }}>
          <button type='button' onClick={() => setShowModal(false)} className="text-white text-md ">X</button>

        </div>

        <div className='flex flex-col gap-4 md:basis-3/12 bg-white p-6 rounded-lg top-2 overflow-y-auto mt-10' style={{ maxHeight: '90vh', maxWidth: "85vh" }}>
          <FilterContainer setFilter={setFilter} filter={filter} minPrice={minPrice ?? 0} maxPrice={maxPrice ?? 0} categories={categories} tags={tags} attribute_values={Object.values(attributes)} selected_category={selected_category} tag_id={tag_id} />
        </div>

      </div>)}


    </form>
    <section className="mx-[5%] my-16">
      <div className="flex overflow-hidden flex-col">
        <div
          className="pt-16 pl-20 w-full bg-lime-400 rounded-3xl max-md:pl-5 max-md:max-w-full"
        >
          <div className="flex gap-5 max-md:flex-col">
            <div className="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
              <div
                className="flex flex-col justify-center w-full min-w-[320px] max-md:mt-10 max-md:max-w-full"
              >
                <div className="flex flex-col w-full text-zinc-950 max-md:max-w-full">
                  <div className="flex flex-col w-full max-md:max-w-full">
                    <div className="text-2xl font-medium max-md:max-w-full">
                      Pro. Más allá.
                    </div>
                    <div
                      className="mt-3 text-8xl font-bold max-md:max-w-full max-md:text-4xl"
                    >
                      <span className="">IPhone 14</span>
                      Pro
                    </div>
                  </div>
                  <div className="mt-3 text-lg font-medium max-md:max-w-full">
                    Creado para cambiar todo para mejor. Para todo el mundo.
                  </div>
                </div>
                <div
                  className="gap-2.5 self-start px-4 py-3 mt-8 text-base font-bold text-lime-400 rounded-xl bg-zinc-950"
                >
                  Comprar ahora
                </div>
              </div>
            </div>
            <div className="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
              <div
                className="flex flex-col grow items-center px-20 mt-8 w-full bg-lime-500 rounded-full max-md:px-5 max-md:mt-10 max-md:max-w-full"
              >
                <img
                  loading="lazy"
                  srcset="https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=100 100w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=200 200w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=400 400w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=800 800w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1200 1200w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=1600 1600w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3&width=2000 2000w, https://cdn.builder.io/api/v1/image/assets/TEMP/f8cc9693b55a6b6c65b84b13ba7d77b14d28c02c6289d1b619fb8f3e5fd3f855?placeholderIfAbsent=true&apiKey=b6f214df1e0f4f5eae4157d4f12e0ba3"
                  className="object-contain z-10 mt-0 max-w-full aspect-[1.16] w-[406px]"
                />
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
    <section className="mx-[5%] my-16">
      <div className="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-9 md:pr-4">
        {items.map((item, i) => <ProductCard key={`product-${item.id}`} item={item} bgcolor={'bg-white'} is_external={is_proveedor.current} />)}
      </div>
    </section>

  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Catalogo {...properties} />);
})