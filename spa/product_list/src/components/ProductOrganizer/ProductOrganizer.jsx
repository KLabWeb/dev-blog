import React from 'react';
import { SearchBox } from '../SearchBox/SearchBox';

export const ProductOrganizer = ({sortHandler, filterHandler}) => {
  return(
    <div className="ProductOrganizer">
      <button key="IDLow" data-sort="IDLow" onClick={sortHandler}>Sort by Increasing ID</button>
      <button key="priceLow" data-sort="priceLow" onClick={sortHandler}>Sort by Increasing Price</button>
      <SearchBox
        placeholder="search product names"
        handleChange={filterHandler}
      />
    </div>
  )
}
