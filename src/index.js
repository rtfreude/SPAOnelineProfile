import React from 'react';
import ReactDOM from 'react-dom';
import { createStore } from 'redux';
import { Provider } from 'react-redux';

//import createHistory from 'history/createBrowserHistory';
import { Router, Route, browserHistory } from 'react-router';
//import { firebaseApp } from './firebase';
//import { logUser } from './actions';
import reducer from './reducers';

//import App from './components/App';
import Signin from './components/Signin';
import SignUp from './components/SignUp';
import Landing from './components/Landing';
import Resume from './components/Resume';

const store = createStore(reducer)

// firebaseApp.auth().onAuthStateChanged(user => {
//   if (user) {
//     const { email } = user;
//     store.dispatch(logUser(email))
//     browserHistory.push('/App');
//     //console.log('user has signed in or up', user);
//   } else {
//     browserHistory.replace('/home');
//     //console.log('user has signed out or still needs to sign in')
//   }
// })

ReactDOM.render(
  <Provider store={store}>
    <Router path="/" history={browserHistory}>
      <Route path="/home" component={Landing} />
      <Route path="/resume" component={Resume} />
      <Route path="/signin" component={Signin} />
      <Route path="/signup" component={SignUp} />
    </Router>
  </Provider>, document.getElementById('root')
)