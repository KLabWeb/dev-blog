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

export default MarkedCode;
