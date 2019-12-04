import React from 'react';

// Render either <LoginButton /> or <LogoutButton /> depending on its current state.
class ConditionalRender extends React.Component{
  constructor(){
    super();

    this.state = { loggedIn: false };

    this.styles = {buttonContainer:{
      margin: '0 auto',
      width: '400px',
      background: 'red'
    }}
  }

  logout() { this.setState({loggedIn: false}) };
  login() { this.setState({loggedIn: true}) };

  render(){
    let button;

    if(this.state.loggedIn)
      button = <button onClick={() => this.logout()}>Log Out</button>;
    else
      button = <button onClick={() => this.login()}>Log In</button>;

    return (
      <div className="buttonContainer" style={this.styles.buttonContainer}>
        <p>Conditionally renders either LoginButton or LogoutButton depending on its current state.</p>
        {button}
      </div>
    );
  }
}

export default ConditionalRender;
