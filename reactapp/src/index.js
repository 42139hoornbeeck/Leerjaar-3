import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import Container from './Container/container';
import Home from './Home/home';
import Login from './Login/login';
import Register from './Register/register';
import Companies from './Companies/companies';
import reportWebVitals from './reportWebVitals';
import { BrowserRouter, Route, Routes } from 'react-router-dom';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <BrowserRouter>
      <Routes>
        <Route path="/" element={ <App/> }>
          <Route path="/" element={ <Home/> }></Route>
          <Route path="/cards" element={ <Container/> }></Route>
          <Route path="/login" element={<Login/>}></Route>
          <Route path="/register" element={<Register/>}></Route>
          <Route path="/companies" element={<Companies/>}></Route>
          <Route
          path="*" 
          element={
          <main><h1>Niks hier te vinden</h1></main>
          }>
          </Route>
        </Route>
      </Routes> 
    </BrowserRouter>
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
