import React from 'react';
import './App.css';

import ConditionalRender from './components/conditionalRender.component';
import CodeGenerator from './components/codeGenerator.component';

const styles = {
  App: {background: 'green',
        width: '1000px',
        margin: '0 auto',
        padding: '10px'
  },
}

function App() {
  return (
    <div className="App" style={styles.App}>
      <ConditionalRender />
      <CodeGenerator codeId={'conditional17'} />
    </div>

  );
}

export default App;
