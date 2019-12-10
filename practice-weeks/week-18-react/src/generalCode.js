const generalCode = new Map([['conditionalImage',
                               {type: 'language-javascript',
                                code:
`
class GeneralPractice18 extends React.Component{
  constructor(props){
    super(props);

    this.state = {image1: 'boxA.gif',
                  image2: 'boxB.gif',
                  image3: 'boxC.gif',
                  hidden: {display: 'none'}};
  }

  styles = {
    duoImage: {width: '220px',
               height: '200px'},
  }

  imageHandler = (e) => {
    const {src, id} = e.target;

    const upState = src.includes('boxA.gif') ? {[id]: 'boxB.gif'} : {[id]: 'boxA.gif'};
    this.setState(upState, this.displayHidden);
  }

  displayHidden = () => {
    this.state.image1 === this.state.image2 ? this.setState({hidden: {display: 'inline'}}) : this.setState({hidden: {display: 'none'}});
  }

  render(){
    const {type: conImtype, conImcode} = generalCode.get('conditionalImage');

    return (
        <div>
            <h2>Conditional Render of Image Based on Same Image State for First Two Images</h2>
            <img id= 'image1' key='image1' src={this.state.image1} onClick={this.imageHandler} style={this.styles.duoImage}></img>
            <img id= 'image2' key='image2' src={this.state.image2} onClick={this.imageHandler} style={this.styles.duoImage}></img>
            <img id= 'image3' key='image3' src={this.state.image3} onClick={this.imageHandler} style={{...this.state.hidden, ...this.styles.duoImage}}></img>
            <h4>Click on images to switch & Reveal Hidden Image</h4>
        </div>
      );
  }
}
                                `}]]);

export default generalCode;
