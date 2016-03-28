/* globals window */
import React from 'react';
import ReactDOM from 'react-dom';
import RootComponent from './root-component';
import injectTapEventPlugin from 'react-tap-event-plugin';

window.React = React;
injectTapEventPlugin();

ReactDOM.render(
  RootComponent,
  document.getElementById('app')
);
