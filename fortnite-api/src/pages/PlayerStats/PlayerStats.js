import React, { Component } from "react";
import {
  apiGetUserId,
  apiCallUser,
} from "../../utility/utility";
import LoadingCircle from "../../components/LoadingCircle/LoadingCircle"

import "../../components/PlayerStats/Styles/button.css";
import {
  localStorageSetter,
  localStorageGetter
} from "../../storage/localStorage";

import TotalsStatsCard from '../../components/PlayerStats/TotalStatsCard'
import StatsCardItem from '../../components/PlayerStats/StatsCardItem'

class PlayerStats extends Component {
  constructor(props) {
    super(props);

    this.state = {
      showMenu: false,
      username: "",
      platform: "pc",
      window: "", // if needed
      player_stats_data: null,
      isLoading_user_id: true,
      user_id: "",
      isLoading: false,
      error: false
    };
  }

  toggleMenu = event => {
    event.preventDefault();
    this.setState({ showMenu: !this.state.showMenu });
  };

  // if localStorageGetter(this.state.username) !== null && undefined
  // this.state.player_stats_data = localStorageGetter(this.state.username)
  // sicer kličeš api

  // if this.state.player_stats_data !== null
  // localstorageSetter(this.state.username, this.state.player_Stats_data)
  //

  submitHandler = async e => {
    e.preventDefault();

    this.setState({ error: false, isLoading: true, player_stats_data: null });

    try {
      let stored_user = null;
      stored_user = localStorageGetter(this.state.username);
      if (stored_user !== null) {
        this.setState({
          user_id: stored_user.uid,
          player_stats_data: stored_user,
          isLoading: false
        });
      } else {
        let user_id_data = await apiGetUserId(this.state.username);
        if (user_id_data !== null) {
          let resp = await apiCallUser(
            user_id_data.uid,
            this.state.platform,
            "alltime"
          );
          if (resp.data.error === true) {
            this.setState({ error: true, isLoading: false });
          } else {
            this.setState({
              player_stats_data: resp.data,
              isLoading: false,
              error: false
            });
            localStorageSetter(
              this.state.username,
              this.state.player_stats_data
            );
          }
        }
      }
    } catch (error) {
      this.setState({ error: true, isLoading: false });
    }
  };

  inputHandler = event => {
    this.setState({
      username: event.target.value
    });
  };

  buttonHandler = event => {
    event.preventDefault();
    this.setState({
      platform: event.target.value
    });
  };

  componentDidMount = async () => {};

  renderForm = () => {
    return (
      // make specific button or form component (TODO)
      <form onSubmit={this.submitHandler} className="row">
        <input
          className="col-sm-12 col-md-12  text-center"
          type="text"
          placeholder="Input username"
          onChange={this.inputHandler}
        />
        <div className="col-sm-12 col-md-12">
          <button
            className={`btn btn-secondary radius-none ${
              this.state.platform === "pc" ? "active" : ""
            } col-sm-12 col-md-4 `}
            value="pc"
            onClick={this.buttonHandler}
          >
            PC
          </button>
          <button
            className={`btn btn-secondary radius-none ${
              this.state.platform === "xb1" ? "active" : ""
            } col-sm-12 col-md-4 `}
            value="xb1"
            onClick={this.buttonHandler}
          >
            Xbox 1
          </button>
          <button
            className={`btn btn-secondary radius-none ${
              this.state.platform === "ps4" ? "active" : ""
            } col-sm-12 col-md-4 `}
            value="ps4"
            onClick={this.buttonHandler}
          >
            Playstation 4
          </button>
        </div>
        <div className="col-sm-12 col-md-12">
          <input
            type="submit"
            value="submit"
            className="btn btn-primary radius-none col-sm-12 col-md-12 "
          />
        </div>
      </form>
    );
  };

  renderStatCards = () => {

    if (this.state.isLoading === true) {
      return <LoadingCircle />;
    } else if (
      this.state.player_stats_data !== null &&
      this.state.error === false
    ) {
      const { stats, totals } = this.state.player_stats_data;
      //console.log(stats)
      return (
        <div className="row">
          <div className="col-12 col-sm-12 col-md-6 col-xl-6">
            <TotalsStatsCard stats={totals}/>
          </div>
          <div className="col-12 col-sm-12 col-md-6 col-xl-6"> 
            <StatsCardItem stats={stats} type={'solo'}/>
          </div>
          <div className="col-12 col-sm-12 col-md-6 col-xl-6">
            <StatsCardItem stats={stats} type={'duo'} />
          </div>
          <div className="col-12 col-sm-12 col-md-6 col-xl-6" style={{background:'black'}}>
            <StatsCardItem stats={stats} type={'squad'} />
          </div>
        </div>
      );
    } else if (this.state.error === true) {
      return (
        // error message component (TODO)
        <div className="container-responsive text-center">
          <p style={{ color: "white" }}>Error while loading data</p>
        </div>
      );
    }


  }

  render() {
    return (
      <div className="container-responsive">
        {this.renderForm()}
        {this.renderStatCards()}
      </div>
    );
  }
}
export default PlayerStats;
