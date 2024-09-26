import { createInertiaApp } from '@inertiajs/react'
import { Cookies, FetchParams } from 'sode-extend-react'

const CreateReactScript = (render) => {

  createInertiaApp({
    resolve: name => `/${name}.jsx`,
    setup: ({ el, props }) => {
      const properties = props.initialPage.props
      const can = (page, ...keys) => {
        keys = keys.map(x => `${page}.${x}`)
        if (properties?.session?.permissions?.find(x => keys.includes(x.name))) return true
        const roles = properties?.session?.roles ?? []
        for (const rol of roles) {
          if (rol?.permissions?.find(x => keys.includes(x.name))) return true
        }
        return false
      }
      FetchParams.headers = {
        Accept: 'application/json',
        'Content-Type': 'application/json',
        'X-Xsrf-Token': decodeURIComponent(Cookies.get('XSRF-TOKEN'))
      }
      render(el, { ...properties, can })
    },
  });
}

export default CreateReactScript