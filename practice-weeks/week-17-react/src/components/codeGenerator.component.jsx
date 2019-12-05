import React from 'react';

import Prism from "prismjs";
import MarkedCode from './markedCode.component';

import '../prism.css'

class CodeGenerator extends React.Component{
  constructor(props){
    super(props);

    this.state = {
      codeBlocks: new Map([['conditional17',
                    {type: 'language-javascript',
                    code:
`import React from 'react';

class ConditionalRender extends React.Component{
  constructor(){
    super();

    this.state = { loggedIn: false };

    this.styles = {buttonContainer:{
                      margin: '0 auto',
                      width: '500px',
                      background: '#e05915',
                      padding: '5px 10px',
                      textAlign: 'center'
                    }}
  }

  logout() { this.setState({loggedIn: false}) };
  login() { this.setState({loggedIn: true}) };

  render(){
    let button;
    
    if(this.state.loggedIn){
      button = <button onClick={() => this.logout()}>Log Out</button>;}
    else{
      button = <button onClick={() => this.login()}>Log In</button>;}

    return (
      <div className="buttonContainer" style={this.styles.buttonContainer}>
        <h2>Login/out Button Component</h2>
        <p>Conditionally renders either LoginButton or LogoutButton depending on its current state.</p>
        {button}
      </div>
    );
  }
}

export default ConditionalRender;`}]
                    ])
        }
  }

  render(){
    const {codeId} = this.props;
    const {type, code} = this.state.codeBlocks.get(codeId);

    return <MarkedCode codeID={codeId} code={code} type={type} />;
  }
}

export default CodeGenerator;
