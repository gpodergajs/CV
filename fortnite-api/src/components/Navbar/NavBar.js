import React, { Component } from "react";
import { Link } from "react-router-dom";

class NavBar extends Component {
  constructor(props) {
    super(props);
    this.toggleNavbar = this.toggleNavbar.bind(this);
    this.state = {
      collapsed: true
    };
  }
  toggleNavbar() {
    this.setState({
      collapsed: !this.state.collapsed
    });
  }
  render() {
    const collapsed = this.state.collapsed;
    const toggle_collapse = collapsed
      ? "collapse navbar-collapse"
      : "collapse navbar-collapse show";
    const toggle_collapse_button = collapsed
      ? "navbar-toggler navbar-toggler-right collapsed"
      : "navbar-toggler navbar-toggler-right";
    return (
      <nav className="navbar navbar-expand-lg navbar-dark bg-dark transparent-nav">
        <div className="container">
          <a className="navbar-brand" href="/">
            For lazy developers
          </a>
          <button
            onClick={this.toggleNavbar}
            className={`${toggle_collapse_button}`}
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span className="navbar-toggler-icon" />
          </button>
          <div className={`${toggle_collapse}`} id="navbarResponsive">
            <ul className="navbar-nav ml-auto text-left">
              <li className="nav-item">
                <Link className="nav-link" to="/">
                  Home
                </Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/upcoming">
                  Upcoming
                </Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/playerStats">
                  Player stats
                </Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/versus">
                  Versus
                </Link>
              </li>
              <li className="nav-item">
                <Link className="nav-link" to="/randomDrop">
                  Random drop
                </Link>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    );
  }
}

export default NavBar;
