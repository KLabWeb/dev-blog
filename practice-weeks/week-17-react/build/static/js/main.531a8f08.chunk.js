(this["webpackJsonpweek-17-react"]=this["webpackJsonpweek-17-react"]||[]).push([[0],{13:function(e,t,n){},14:function(e,t,n){},17:function(e,t,n){},18:function(e,t,n){"use strict";n.r(t);var o=n(0),s=n.n(o),a=n(7),i=n.n(a),l=(n(13),n(14),n(1)),r=n(2),c=n(4),d=n(3),h=n(5),u=function(e){function t(){var e;return Object(l.a)(this,t),(e=Object(c.a)(this,Object(d.a)(t).call(this))).state={loggedIn:!1},e.styles={buttonContainer:{margin:"0 auto",width:"500px",background:"#e05915",padding:"5px 10px",textAlign:"center"}},e}return Object(h.a)(t,e),Object(r.a)(t,[{key:"logout",value:function(){this.setState({loggedIn:!1})}},{key:"login",value:function(){this.setState({loggedIn:!0})}},{key:"render",value:function(){var e,t=this;return e=this.state.loggedIn?s.a.createElement("button",{onClick:function(){return t.logout()}},"Log Out"):s.a.createElement("button",{onClick:function(){return t.login()}},"Log In"),s.a.createElement("div",{className:"buttonContainer",style:this.styles.buttonContainer},s.a.createElement("h2",null,"Login/out Button Component"),s.a.createElement("p",null,"Conditionally renders either login or",s.a.createElement("br",null)," logout button depending on its current state."),e)}}]),t}(s.a.Component),g=(n(15),{pre:{fontSize:"1.4rem"}}),p=function(e){var t=e.code,n=e.codeID,o=e.type;return s.a.createElement("div",null,s.a.createElement("pre",{className:o,key:n,style:g.pre},s.a.createElement("code",null,t)))},m=(n(17),function(e){function t(e){var n;return Object(l.a)(this,t),(n=Object(c.a)(this,Object(d.a)(t).call(this,e))).state={codeBlocks:new Map([["conditional17",{type:"language-javascript",code:"//login/logout button component\n\nimport React from 'react';\n\nclass ConditionalRender extends React.Component{\n  constructor(){\n    super();\n\n    this.state = { loggedIn: false };\n\n    this.styles = {buttonContainer:{\n                      margin: '0 auto',\n                      width: '500px',\n                      background: '#e05915',\n                      padding: '5px 10px',\n                      textAlign: 'center'\n                    }}\n  }\n\n  logout() { this.setState({loggedIn: false}) };\n  login() { this.setState({loggedIn: true}) };\n\n  render(){\n    let button;\n    if(this.state.loggedIn){\n      button = <button onClick={() => this.logout()}>Log Out</button>;}\n    else{\n      button = <button onClick={() => this.login()}>Log In</button>;}\n\n    return (\n      <div className=\"buttonContainer\" style={this.styles.buttonContainer}>\n        <h2>Login/out Button Component</h2>\n        <p>Conditionally renders either LoginButton or LogoutButton depending on its current state.</p>\n        {button}\n      </div>\n    );\n  }\n}\n\nexport default ConditionalRender;"}],["markedCode17",{type:"language-javascript",code:"//Component for holding higlighted code (you're looking at it now). Stateless functional component.\n\nimport React from 'react';\n\nconst styles = {\n  pre: {fontSize: '1.4rem'}\n}\n\nconst MarkedCode = ({code, codeID, type}) => (\n  <div>\n      <pre className={type} key={codeID} style={styles.pre}><code>\n        {code}\n      </code>\n    </pre>\n  </div>\n);\n\nexport default MarkedCode;"}],["codeGenerator17",{type:"language-javascript",code:"//Component manages state for code Highlighted Code Components and renders based on id passed into\n\nimport React from 'react';\n\nimport Prism from \"prismjs\";\nimport MarkedCode from './markedCode.component';\n\nimport '../prism.css'\n\nclass CodeGenerator extends React.Component{\n  constructor(props){\n       super(props);\n\n       this.state = {\n         codeBlocks: new Map([['codeID-goes-here',\n                             {type: 'language-goes-here',\n                              code: code-goes-here]],\n                           [['next-codeID-goes-here',\n                              {type: 'language-goes-here',\n                              code: code-goes-here]])\n         }\n   };\n\n   render(){\n     const {codeId} = this.props;\n     const {type, code} = this.state.codeBlocks.get(codeId);\n\n     return <MarkedCode codeID={codeId} code={code} type={type} />;\n   }\n}\n\nexport default CodeGenerator;"}],["generatorUse17",{type:"language-javascript",code:"const App = () => {\n  return (\n    <div className=\"App\" style={styles.App}>\n      <ConditionalRender />\n\n      <CodeGenerator codeId={'conditional17'} />\n\n      <h2>Highlighted Code Component</h2>\n      <CodeGenerator codeId={'markedCode17'} />\n\n      <h2>Highlighted Code Generator Component</h2>\n      <CodeGenerator codeId={'codeGenerator17'} />\n\n      <h2>Example of Highlighted Code Use</h2>\n      <CodeGenerator codeId={'generatorUse17'} />\n    </div>\n  );\n}"}],["conditionalInline17",{type:"language-javascript",code:"\nclass generalPractice17 extends React.Component{\n  constructor(){\n    super();\n\n    this.state = {imageUrl: '../images/lainlines.gif',\n                  switchImageUrl: '../images/bluescreen.gif',\n                  showClicked: 0,\n                  switchClicked: 0};\n  }\n\n  styles = {\n      lainlines: {width:'200px',\n                  height: '200px'},\n      buttons: {margin: '200px 20px 0 20px'}\n  };\n\n  showImgHandler = (e) => {\n    const target = e.target;\n    this.setState(state => ({showClicked: ++state.showClicked}), () =>\n      {if(this.state.showClicked ===3) target.style.display = 'none'});\n  }\n\n  switchImgHandler = (e) => {\n    this.setState(state => ({switchClicked: ++state.switchClicked}))\n  }\n\n  render(){\n    return (\n      <div>\n        <button onClick={this.showImgHandler} style={this.styles.buttons}>Click 3x to show image: {this.state.showClicked}</button>\n\n        //INLINE IF CONDITIONAL RENDER\n        {this.state.showClicked === 3 &&\n          <div>\n           <button onClick={this.switchImgHandler} style={this.styles.buttons}>\n             Counter at increments of 3 show lain: {this.state.switchClicked}\n           </button>\n           //INLINE IF-ELSE CONDITIONAL RENDER\n           {this.state.switchClicked % 3 === 0 & this.state.switchClicked !== 0 ?\n             (<img src={this.state.imageUrl} style={this.styles.lainlines}/>) :\n             (<img src={this.state.switchImageUrl} style={this.styles.lainlines}/>)\n           }\n         </div>\n        }\n      </div>\n    );\n  }\n}"}]])},n}return Object(h.a)(t,e),Object(r.a)(t,[{key:"render",value:function(){var e=this.props.codeId,t=this.state.codeBlocks.get(e),n=t.type,o=t.code;return s.a.createElement(p,{codeID:e,code:o,type:n})}}]),t}(s.a.Component)),C=function(e){function t(){var e;return Object(l.a)(this,t),(e=Object(c.a)(this,Object(d.a)(t).call(this))).styles={lainlines:{width:"200px",height:"200px"},buttons:{margin:"200px 20px 0 20px"}},e.showImgHandler=function(t){var n=t.target;e.setState((function(e){return{showClicked:++e.showClicked}}),(function(){3===e.state.showClicked&&(n.style.display="none")}))},e.switchImgHandler=function(t){e.setState((function(e){return{switchClicked:++e.switchClicked}}))},e.state={imageUrl:"../images/lainlines.gif",switchImageUrl:"../images/bluescreen.gif",showClicked:0,switchClicked:0},e}return Object(h.a)(t,e),Object(r.a)(t,[{key:"render",value:function(){return s.a.createElement("div",null,s.a.createElement("button",{onClick:this.showImgHandler,style:this.styles.buttons},"Click 3x to show image: ",this.state.showClicked),3===this.state.showClicked&&s.a.createElement("div",null,s.a.createElement("button",{onClick:this.switchImgHandler,style:this.styles.buttons},"Counter at increments of 3 show lain: ",this.state.switchClicked),this.state.switchClicked%3===0&0!==this.state.switchClicked?s.a.createElement("img",{src:this.state.imageUrl,style:this.styles.lainlines}):s.a.createElement("img",{src:this.state.switchImageUrl,style:this.styles.lainlines})))}}]),t}(s.a.Component),k={App:{background:"green",width:"70%",margin:"0 auto",padding:"10px"}},y=function(){return s.a.createElement("div",{className:"App",style:k.App},s.a.createElement(u,null),s.a.createElement(m,{codeId:"conditional17"}),s.a.createElement("h2",null,"Highlighted Code Component"),s.a.createElement(m,{codeId:"markedCode17"}),s.a.createElement("h2",null,"Highlighted Code Generator Component"),s.a.createElement(m,{codeId:"codeGenerator17"}),s.a.createElement("h2",null,"Example of Highlighted Code Use"),s.a.createElement(m,{codeId:"generatorUse17"}),s.a.createElement("h2",null,"Inline conditionals"),s.a.createElement(C,null),s.a.createElement("h2",null,"Inline conditionals Code"),s.a.createElement(m,{codeId:"conditionalInline17"}))};i.a.render(s.a.createElement(y,null),document.getElementById("root"))},8:function(e,t,n){e.exports=n(18)}},[[8,1,2]]]);
//# sourceMappingURL=main.531a8f08.chunk.js.map