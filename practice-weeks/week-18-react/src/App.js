import React from 'react';
import logo from './logo.svg';
import './App.css';

import CodeGenerator from './components/code-block/codeGenerator.component';
import codeBlocks from './codeBlocks.js';
import GeneralPractice18 from './generalPractice18';

const styles = {
  App: {background: 'green',
        width: '85%',
        margin: '0 auto',
        padding: '10px'
  },
}

function App() {
  return (
    <div className="App" style={styles.App}>
      <CodeGenerator codeBlocks={codeBlocks} />
      <GeneralPractice18 />

    </div>
  );
}

export default App;
