import React, { useRef, useState } from 'react'
import { createRoot } from 'react-dom/client'
import CreateReactScript from '../Utils/CreateReactScript'
import OfferCard from '../components/Offer/OfferCard'
import Tippy from '@tippyjs/react'
import 'tippy.js/dist/tippy.css'
import OfferForm from '../components/Offer/OfferForm'
import Modal from 'react-modal';
import { Fetch } from 'sode-extend-react'

Modal.setAppElement('body')

const Offers = ({ offers: offersFromBD }) => {


  const offerFormRef = useRef()

  const [offers, setOffers] = useState(offersFromBD)
  const [offerLoaded, setOfferLoaded] = useState(null)

  const onOpenModalClicked = (data) => {
    setOfferLoaded(data)
  }

  const refreshOffers = async () => {
    location.reload()
    // const { status, result } = await Fetch('/api/offers')
    // if (status) setOffers(result)
  }

  return (<>
    <div className="p-8 flex flex-col gap-6 justify-center items-center min-h-[calc(100vh-64px)] bg-gray-100">
      {/* {
        offers.length > 0 &&
        <form>
          <label htmlFor="search" className="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div className="relative">
            <div className="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg className="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input type="search" id="search" className="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 min-w-80" placeholder="Buscar por producto" required />
            <button type="submit" className="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
          </div>
        </form>
      } */}
      <Tippy content="Agregar combo">
        <button type="button" className="text-blue-700 border border-blue-700 hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-4 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800 dark:hover:bg-blue-500" onClick={onOpenModalClicked}>
          <i className='fa fa-plus'></i>
        </button>
      </Tippy>
      <ul className="flex flex-wrap w-full gap-6 items-center justify-center">
        {offers.length > 0 && offers.map((offer, i) => <OfferCard key={i} item={offer} setItem={setOfferLoaded} onOpenModalClicked={onOpenModalClicked} offers={offers} setOffers={setOffers} />)}
      </ul>
    </div>
    <OfferForm eRef={offerFormRef} data={offerLoaded} setData={setOfferLoaded} refreshOffers={refreshOffers} />
  </>)
}

CreateReactScript((el, properties) => {
  createRoot(el).render(<Offers {...properties} />);
})