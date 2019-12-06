import React from 'react';
import './App.css';

import ConditionalRender from './components/conditionalRender.component';
import CodeGenerator from './components/codeGenerator.component';
import General17 from './components/generalPractice17.component';

const styles = {
  App: {background: 'green',
        width: '70%',
        margin: '0 auto',
        padding: '10px'
  },
}

const App = () => {
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
      <h2>Inline conditionals</h2>
      <General17 />
      <h2>Inline conditionals Code</h2>
      <CodeGenerator codeId={'conditionalInline17'} />
    </div>
  );
}

export default App;
