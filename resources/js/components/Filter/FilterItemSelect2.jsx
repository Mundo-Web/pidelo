import React, { useEffect, useRef } from "react"

const FilterItemSelect2 = ({ col, label, eRef, required = false, children, dropdownParent, disabled = false, multiple = false, onChange = () => { }, filter, defaultValue = [] , placeholder}) => {

  if (!eRef) eRef = useRef()

  useEffect(() => {
    $(eRef.current).select2({
      dropdownParent,
      placeholder
    })
    $(eRef.current).on('change', onChange)
  }, [filter])

  return <div>
    <h2 className="font-semibold mb-2">
      {label} {(label && required) && <b className="text-danger">*</b>}
    </h2>
    <select ref={eRef} required={required} style={{ width: '100%' }} disabled={disabled} onChange={onChange} multiple={multiple} defaultValue={defaultValue}>
      {children}
    </select>
  </div>
}

export default FilterItemSelect2