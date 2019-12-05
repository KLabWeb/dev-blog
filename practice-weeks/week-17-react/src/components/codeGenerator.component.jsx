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
`//login/logout button component

import React from 'react';

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

export default ConditionalRender;`}],
                                    ['markedCode17',
                                      {type: 'language-javascript',
code:
`//Component for holding higlighted code (you're looking at it now). Stateless functional component.

import React from 'react';

const styles = {
  pre: {fontSize: '1.4rem'}
}

const MarkedCode = ({code, codeID, type}) => (
  <div>
      <pre className={type} key={codeID} style={styles.pre}><code>
        {code}
      </code>
    </pre>
  </div>
);

export default MarkedCode;`}],
                              ['codeGenerator17',
                                {type: 'language-javascript',
                                 code:
`//Component manages state for code Highlighted Code Components and renders based on id passed into

import React from 'react';

import Prism from "prismjs";
import MarkedCode from './markedCode.component';

import '../prism.css'

class CodeGenerator extends React.Component{
  constructor(props){
       super(props);

       this.state = {
         codeBlocks: new Map([['codeID-goes-here',
                             {type: 'language-goes-here',
                              code: code-goes-here]],
                           [['next-codeID-goes-here',
                              {type: 'language-goes-here',
                              code: code-goes-here]])
         }
   };

   render(){
     const {codeId} = this.props;
     const {type, code} = this.state.codeBlocks.get(codeId);

     return <MarkedCode codeID={codeId} code={code} type={type} />;
   }
}

export default CodeGenerator;`}],
                                ['generatorUse17',
                                  {type: 'language-javascript',
                                   code:
`const App = () => {
  return (
    <div className="App" style={styles.App}>
      <ConditionalRender />

      <CodeGenerator codeId={'conditional17'} />

      <h2>Highlighted Code Component</h2>
      <CodeGenerator codeId={'markedCode17'} />

      <h2>Highlighted Code Generator Component</h2>
      <CodeGenerator codeId={'codeGenerator17'} />

      <h2>Example of Highlighted Code Use</h2>
      <CodeGenerator codeId={'generatorUse17'} />
    </div>
  );
}`
                                 }]
                  ])};
  }

  render(){
    const {codeId} = this.props;
    const {type, code} = this.state.codeBlocks.get(codeId);

    return <MarkedCode codeID={codeId} code={code} type={type} />;
  }
}

export default CodeGenerator;
