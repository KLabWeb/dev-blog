import React from 'react';

import Prism from "prismjs";
import MarkedCode from './markedCode.component';

import './prism.css'

class CodeGenerator extends React.Component{
  constructor(props){
    super(props);

    this.state = {
      codeBlocks: this.props.codeBlocks.map(block =>
                      ({codeId: block.codeID,
                        type: block.type,
                        code: block.code,
                        title: block.title}))
    };

    this.styles = {
      h2: { color: '#32DD72',
            textAlign: 'left',
            margin: '20px 0 0 0'}
    }
  }

  render(){
    console.log(this.state.codeBlocks);
    const {codeId, type, code, title} = this.state.codeBlocks;

    return this.state.codeBlocks.map(block =>
    (
      <div>
        <h2 style={this.styles.h2}>{block.title}</h2>
        <MarkedCode codeID={block.codeId} code={block.code} type={block.type} />
      </div>
    ));
    // return <div></div>
  }
}

export default CodeGenerator;
