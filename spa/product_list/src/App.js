//import components
import React, { Component } from 'react';
import { ProductFactory } from './components/ProductFactory/ProductFactory';
import { ProductOrganizer } from './components/ProductOrganizer/ProductOrganizer';

//import data
import DATA from './data/data.const';

//import CSS
import './App.css';

class App extends Component {

  constructor(props){
    super(props);
    this.state = {products: DATA, sort: "default", nameSearch: ""};
  }

  //handling function for sort
  sortHandler = event => this.setState({sort: event.target.dataset.sort});
  filterHandler = event => this.setState({ nameSearch: event.target.value });

  render(){
    const { products, sort, nameSearch } = this.state;

    //to dynamically filters products onChange of SearchBox text
    const filteredProducts =
      products.filter(product => product.name.toLowerCase().includes(nameSearch.toLowerCase()));

    return (
      <div className="App">
        <ProductOrganizer sortHandler={this.sortHandler} filterHandler={this.filterHandler} />
        <ProductFactory products={filteredProducts} type={sort}/>
      </div>
    );
  }
}

export default App;
