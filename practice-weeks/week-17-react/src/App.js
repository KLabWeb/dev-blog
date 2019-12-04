import React from 'react';
import './App.css';

import ConditionalRender from './components/conditionalRender.component';

const styles = {
  App: {background: 'green',
        width: '500px',
        margin: '0 auto'
  },
}

function App() {
  return (
    <div className="App" style={styles.App}>
      <ConditionalRender />
    </div>

  );
}

export default App;
