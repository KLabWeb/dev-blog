import React from 'react';

import MarkedCode from './components/code-block/markedCode.component';
import generalCode from './generalCode.js';

class GeneralPractice18 extends React.Component{
  constructor(props){
    super(props);

    this.state = {image1: 'boxA.gif',
                  image2: 'boxB.gif',
                  image3: 'boxC.gif',
                  hidden: {display: 'none'},
                  binary: '',
                  hideBinary: false};
  }

  styles = {
    duoImage: {width: '220px',
               height: '200px'},
    textInput: {width: '300px',
                height: '200px',
                marginRight: '5px'}

  }

  //conditional image rendering code start
  imageHandler = (e) => {
    const {src, id} = e.target;

    const upState = src.includes('boxA.gif') ? {[id]: 'boxB.gif'} : {[id]: 'boxA.gif'};
    this.setState(upState, this.displayHidden);
  }

  displayHidden = () => {
    this.state.image1 === this.state.image2 ? this.setState({hidden: {display: 'inline'}}) : this.setState({hidden: {display: 'none'}});
  }
  //conditional image rendering code end

  //rendering multiple elements through list with unique keys start
  list = () => {
    const listStyle = {display: 'flex'};

    const people= [{key: '2920', name: 'Tom', age: 27, city: 'Boston'},
                   {key: '1240', name: 'Mitsuki', age: 33, city: 'Seattle'},
                   {key: '2310', name: 'Tanya', age: 44, city: 'Chicago'}
                  ];
    const listItems = people.map(({key, name, age, city}, index) => <li id="test" key={key}>{name} is {age} years old and lives in {city}</li>);

    const keys = listItems.map(listItem => <li>Unique Key: {listItem.key}</li>);

    return (<span style={listStyle}>
              <ul>{listItems}</ul>
              <ul>{keys}</ul>
            </span>);
  }
  //rendering multiple elements through list with unique keys end

  //controlled elements via form start
  createBinary = string => {
    const binaryOut = string.split('').map(char => char.charCodeAt(0).toString(2)).join(' ');
    this.setState({binary: [binaryOut]});
  }

  textChangeHandle = event => {
    const name = event.target.name;
    this.setState({[name]: event.target.value});

    if(name === 'textarea')
      this.createBinary(event.target.value);
  }

  checkHandle = event =>
    this.setState(state => ({hideBinary: !state.hideBinary}));

  submitHandle = event => {
    this.textChangeHandle(event);
    alert('---WARNING: Binary entering red mode: WARNING---');
    event.preventDefault();
  }

  formSection = () =>
   (<div style={{display: 'flex'}}>
       <form style={{display: 'flex', flexFlow: 'column nowrap'}}>
        <textarea type='text' value={this.state.textarea} name='textarea' onChange={this.textChangeHandle} style={this.styles.textInput} placeholder='enter text to generate binary'/>
        <select value={this.state.binaryColor == 'red' ? 'red' : this.state.binaryColor} name='binaryColor' onChange={this.textChangeHandle} style={{width: '90px', margin: '5px 0'}}>
          <option value='black'>Black</option>
          <option value='red'>Red</option>
          <option value='pink'>Pink</option>
          <option value='blue'>Blue</option>
        </select>
        <label>
          Hide binary:
          <input type='checkbox' checked={this.state.hideBinary} name='hideBinary' onChange={this.checkHandle} />
        </label>
        <label>
          Give binary label:
          <input type='text' value={this.state.binaryLabel} name='binaryLabel' onChange={this.textChangeHandle} style={{marginLeft: '5px'}}/>
        </label>
        <button type='submit' onClick={this.submitHandle} name='binaryColor' value='red' style={{width: '90px'}}>Process</button>

       </form>

       {(this.state.hideBinary === false && this.state.binary[0] != "" && this.state.binary[0] != undefined) &&
         <div style={{color: this.state.binaryColor, flex: '60%'}}>
           <h5>{this.state.binaryLabel}</h5>
             {this.state.binary}
         </div>}
    </div>);

  //controlled elements via form end

  render(){

    const {type: conImgType, code: conImgcode} = generalCode.get('conditionalImage');
    const {type: listKeyType, code: listKeyCode} = generalCode.get('listKeys');
    const {type: formType, code: formCode} = generalCode.get('formCode');

    return (
        <div>
          <h2>Conditional Render of Image Based on Same Image State for First Two Images</h2>
          <img id= 'image1' src={this.state.image1} onClick={this.imageHandler} style={this.styles.duoImage}></img>
          <img id= 'image2' src={this.state.image2} onClick={this.imageHandler} style={this.styles.duoImage}></img>
          <img id= 'image3' src={this.state.image3} onClick={this.imageHandler} style={{...this.state.hidden, ...this.styles.duoImage}}></img>
          <h4>Click on images to switch & Reveal Hidden Image</h4>
          <MarkedCode codeID='conditionalImage' code={conImgcode} type={conImgType} />
          <h2>Rendering a List from an Array of Objects w/ Unique Keys</h2>
          {this.list()}
          <MarkedCode codeId='listKeys' code={listKeyCode} type={listKeyType} />
          <h2>Form Handling with Controlled Components</h2>
          {this.formSection()}
          <MarkedCode codeID='formCode' code={formCode} type={formType} />
      </div>
      );
  }
}

export default GeneralPractice18;
