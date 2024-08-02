import React from 'react';
import Footer from './components/SharedComps/Footer';
import LoginPage from './pages/LoginPage';
import { useDispatch, useSelector } from 'react-redux';
import {BrowserRouter as Router, Link, Routes, Route, Navigate, useMatch} from 'react-router-dom'
import HomePage from './pages/HomePage';
import ForgetPassword from './components/Login/ForgetPassword';
import ResetPassword from './components/Login/ResetPassword';
import RegisterForm from './components/Forms/RegisterForm';
import TryAPIPage from './pages/TryAPIPage';
import ChooseCity from './components/Selections/ChooseCity';

function App() {
  const loggedin = useSelector(state => state.loggedin)
  const dispatch = useDispatch()
  const users = useSelector(state => state.users)
  const padding = {
    padding: 5
  }
  return (
    <div>
      //! use this shit instead Header comps
      {/* <Notification/> */}
      <div>
        <Link to='/' style={padding}>Home</Link>
        <Link style={padding}>About</Link>
        <Link style={padding}>Gallery</Link>
        <Link style={padding}>Service</Link>
        <Link style={padding}>Blog</Link>
        <Link to='/tryapi'>Try API</Link>
        <span>
          {
            loggedin
                ? 
                  (
                    <span>
                        <em>{loggedin.name} logged in</em>
                        <Link to='/logout' style={padding} onClick={handleLogout}>Logout</Link>
                    </span>

                  )
                : <Link to='/login' style={padding} >Login</Link>
          }
        </span>
      </div>
      <div>
        <strong>~ dubug token: </strong> {loggedin?.token}
      </div>

      <Routes>
        <Route path='/' element={<HomePage/>}/>
        <Route path='/tryapi' element={<TryAPIPage/>}/>
        

        <Route path='/city' element={<ChooseCity/>}/>
        
        //todo auth routes 
        <Route path='/login' element={<LoginPage/>}/>
        <Route path='/logout' element={<Navigate replace to='/login'/>}/>
        <Route path='/register' element={<RegisterForm/>}/>
        <Route path='/forgetpw' element={<ForgetPassword/>}/>
        <Route path='/rspw' element={<ResetPassword/>}/>
      </Routes>     
      <Footer/>
    </div>
  );
}

export default App;
