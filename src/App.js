// import React, { Component } from 'react';
// import logo from './logo.svg';
// import './App.css';

// Obtain the root
    const rootElement = document.getElementById('root')
// Create a ES6 class component
    class ShoppingList extends React.Component {
// Use the render function to return JSX component
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <img className="App-logo" alt="logo" />
          <p>
            Edit <code>src/App.js</code> and save to reload.
          </p>
          <a
            className="App-link"
            href="https://reactjs.org"
            target="_blank"
            rel="noopener noreferrer"
          >
            Learn React
          </a>
        </header>
      </div>
    );
}
}

// Create a function to wrap up your component
function App(){
  return(
    <div className="App">
      <header className="App-header">
        <img className="App-logo" alt="logo" />
        <p>
          Edit <code>src/App.js</code> and save to reload.
        </p>
        <a
          className="App-link"
          href="https://reactjs.org"
          target="_blank"
          rel="noopener noreferrer"
        >
          Learn React
        </a>
      </header>
    </div>
  )
}
// Use the ReactDOM.render to show your component on the browser
    ReactDOM.render(
      <App />,
      rootElement
    )
