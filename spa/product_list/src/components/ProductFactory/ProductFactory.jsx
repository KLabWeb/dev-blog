import React from "react";
import { ProductList } from "../ProductList/ProductList";

export const ProductFactory = ({type, products}) => {
  switch(type) {
    case 'IDLow':
      return <ProductList products={products.sort((a, b) => a.id > b.id ? 1 : -1)} type={"IDLow"}/>;
    case 'priceLow':
      return <ProductList products={products.sort((a, b) => a.price > b.price ? 1 : -1)} type={"priceLow"}/>;
    default:
      return <ProductList products={products} type={"default"}/>;
  }
};
