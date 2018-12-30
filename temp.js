import React, {Component} from 'react';
import './App.css';

class App extends Component {
  constructor(props){
    super(props);
    this.state = urlList: [{url: '/images/stocks/1.jpg',
                             index: 0},
                            {url: '/images/stocks/2.jpg',
                             index: 1},
                            {url: '/images/stocks/3.jpg',
                             index: 2},
                            {url: '/images/stocks/4.jpg',
                             index: 3},
                            {url: '/images/stocks/5.jpg',
                             index: 4},
                            {url: '/images/stocks/6.jpg',
                             index: 5},
                            {url: '/images/stocks/7.jpg',
                             index: 6},
                            {url: '/images/stocks/8.jpg',
                             index: 7},
                            {url: '/images/stocks/9.jpg',
                             index: 8},
                            {url: '/images/stocks/10.jpg',
                             index: 9}],
                   currentIndex: 0,
                   alt: "wojack"
                  };
    this.switchImage();   //starts time when class created
  }

  //incriments this.CurrentIndex by +1 until going to breach array range, then resets to 0
  nextImage(){
    if(this.state.currentIndex >= this.state.urlList.length-1)
      this.setState({currentIndex: 0});
    else
      this.setState({currentIndex: this.state.currentIndex+1});
  }

  //updates image every second
  switchImage(){
        setInterval(()=> this.nextImage(), 3000);
  }

  //create image and set default photo to play
  getImage(index){
      let pic = <img src={this.state.urlList[this.state.currentIndex]} alt="wojack" style={{width:"100%", height: "100%"}}></img>;

      //different image sizes for larger and smaller viewports
      if(document.documentElement.clientWidth > 900){
        pic.props.style.width="30vw";
        pic.props.style.height="30vw";
      }
      else{
        pic.props.style.width="90vw";
        pic.props.style.height="90vw";
      }

      return pic;
  }

  getImageGroup(size){
    let images = [];
    for(let i = 0; i < size; i++){
      images[i] = this.getImage(i);
    }
    return images;
  }


  render() {

    return (
      <div id="container" style={{margin: "10px", display: "flex", flexWrap: "wrap"}}>
         {this.getImageGroup(this.state.urlList.length).map(oneImage =>
                                                              <div style={{margin: "auto"}}>
                                                                 {oneImage} </div>)}
      </div>
    );
  }
}


export default App;
