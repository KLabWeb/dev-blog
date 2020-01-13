import React from 'react';

class generalPractice17 extends React.Component{
  constructor(){
    super();

    this.state = {imageUrl: './images/lainlines.gif',
                  switchImageUrl: './images/bluescreen.gif',
                  showClicked: 0,
                  switchClicked: 0};
  }

  styles = {
      lainlines: {width:'200px',
                  height: '200px'},
      buttons: {margin: '200px 20px 0 20px'}
    };

  showImgHandler = (e) => {
    const target = e.target;
    this.setState(state => ({showClicked: ++state.showClicked}), () =>
      {if(this.state.showClicked ===3) target.style.display = 'none'});
  }

  switchImgHandler = (e) => {
    this.setState(state => ({switchClicked: ++state.switchClicked}))
  }

  render(){

    return (
      <div>
        <button onClick={this.showImgHandler} style={this.styles.buttons}>Click 3x to show image: {this.state.showClicked}</button>

        {this.state.showClicked === 3 &&
          <div>
           <button onClick={this.switchImgHandler} style={this.styles.buttons}>Counter at increments of 3 show lain: {this.state.switchClicked}</button>
           {this.state.switchClicked % 3 === 0 & this.state.switchClicked !== 0 ?
             (<img src={this.state.imageUrl} style={this.styles.lainlines}/>) :
             (<img src={this.state.switchImageUrl} style={this.styles.lainlines}/>)
           }
         </div>
        }
      </div>
    );
  }
}

export default generalPractice17;
