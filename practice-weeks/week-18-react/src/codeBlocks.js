const codeBlocks = [
    {codeId: "CodeGenMod",
      title: "Modified CodeGenerator State Source for Better Re-Usability & Seperation",
      type: "language-javascript",
      code: `      //Instead of defining state inside CodeGenetor, state is now passed in from file by root Component
      //Also coupled header with codeBlock, set by passing in 'title' prop
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
      }`
    },
    {codeId: "CodeGenMode2",
      title: "",
      type: "language-javascript",
      code:
      `      //App.js (partial)

      //Data for codeBlocks imported in array of objects containing MarkedCode properties, one object per MarkedCode
      import CodeGenerator from './components/code-block/codeGenerator.component';
      import codeBlocks from './codeBlocks.js';

      function App() {
        return (
          <div className="App" style={styles.App}>
            <CodeGenerator codeBlocks={codeBlocks} />
          </div>
        );
      }`
    }
];

export default codeBlocks;
