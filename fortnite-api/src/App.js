import React, { Component } from "react";
import NavBar from "./components/Navbar/NavBar"
import Home from "./pages/Home/Home";
import Upcoming from "./pages/Upcoming/Upcoming";
import PlayerStats from "./pages/PlayerStats/PlayerStats";
import RandomDrop from './pages/RandomDrop/RandomDrop'
import Versus from './pages/Versus/Versus'
import { BrowserRouter, Switch, Route } from "react-router-dom";

class App extends Component {
  render() {
    return (
      <BrowserRouter>
        <div
          className="container-responsive"
          style={{ backgroundColor: "black", height:'100%'}}
        >
          <NavBar />
          <Switch>
            <Route exact path="/" component={Home} />
            <Route path="/upcoming" component={Upcoming} />
            <Route path="/playerStats" component={PlayerStats} />
            <Route path="/randomDrop" component={RandomDrop} />
            <Route path="/versus" component={Versus} />
          </Switch>
        </div>
      </BrowserRouter>
    );
  }
}

export default App;
