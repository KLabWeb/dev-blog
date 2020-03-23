import React from "react";
import { ProductCard } from "../ProductCard/ProductCard";

import "./ProductList.css";

export const ProductList = ({products}) => {
  return (
    <div className="ProductList">
          {products.map(product => (
            <ProductCard key={product.id} product={product} />
          ))}
    </div>
  );
};
