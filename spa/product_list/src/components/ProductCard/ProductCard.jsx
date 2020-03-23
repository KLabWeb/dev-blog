import React from "react";
import parse from 'html-react-parser'; //component for parsing in HTML from a string

import "./ProductCard.css";

//check if currency is USD
const checkUSD = currency => currency.toString().toLowerCase() === 'usd' ? true : false;

//if currency is USD, append ''$'' to, plus format to 2 decimals in all cases
const getPrice = (price, currency) =>
  checkUSD(currency) === true ? `$${price.toFixed(2).toString()}` : price.toFixed(2).toString();

export const ProductCard = ({product}) => {
  return (
    <div className='ProductCard'>
      <h3>{product.name}</h3>
      <p>by <b>{product.vendor.name}</b></p>
      <p>{getPrice(product.price, product.currency)}</p>
      <div className="description">{parse(product.description)}</div>
    </div>
  );
}
