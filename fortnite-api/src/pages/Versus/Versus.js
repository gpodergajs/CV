import React, { Component } from "react";

import StatCard from "../../components/PlayerStats/StatsCardItem";
import Form from "../../components/Versus/Form";
import {
  localStorageGetter,
  localStorageSetter
} from "../../storage/localStorage";
import { apiCallUser, apiGetUserId } from "../../utility/utility";
import LoadingCircle from "../../components/LoadingCircle/LoadingCircle";

class Versus extends Component {
  constructor(props) {
    super(props);
    this.state = {
      username1: "",
      username2: "",
      player_stats_data1: null,
      player_stats_data2: null,
      isLoading1: false,
      isLoading2: false,
      error: false,
      platform1: "",
      platform2: "",
      form: null
    };
  }

  onPressHandler = () => {};

  submitHandler = async value => {
    let form = value[0];
    let username = value[1];
    let platform = value[2];

    if (form === "form1") {
      this.setState(
        {
          username1: username,
          platform1: platform,
          form: form
        },
        () => this.loadData()
      );
    } else {
      this.setState(
        {
          username2: username,
          platform2: platform,
          form: form
        },
        () => this.loadData()
      );
    }

    //await this.submitHandler();

    // na koncu setti state na "" za username in platform
  };

  loadData = async e => {
    //e.preventDefault();

    this.setState({ error: false, isLoading: true, player_stats_data: null });

    let username;
    let platform;
    let statsKeyName;
    let platformKeyName;

    if (this.state.form === "form1") {
      username = this.state.username1;
      platform = this.state.platform1;
      statsKeyName = "player_stats_data1";
      platformKeyName = "platform1";
    } else {
      username = this.state.username2;
      platform = this.state.platform2;
      statsKeyName = "player_stats_data2";
      platformKeyName = "platform2";
    }

    try {
      let stored_user = null;
      //const username = this.state.username; // had to make a constant otherwise the value cannot be recieved from state for some reason
      stored_user = localStorageGetter(username);

      if (stored_user !== null) {
        this.setState({
          [statsKeyName]: stored_user,
          isLoading: false
        });
      } else {
        let user_id_data = await apiGetUserId(username);

        if (user_id_data !== null) {
          let resp = await apiCallUser(user_id_data.uid, platform, "alltime");
          if (resp.data.error === true) {
            this.setState({ error: true, isLoading: false });
          } else {
            this.setState({
              [statsKeyName]: resp.data,
              isLoading: false,
              error: false
            });

            let player_stats_data;
            statsKeyName === "player_stats_data1"
              ? (player_stats_data = this.state.player_stats_data1)
              : (player_stats_data = this.state.player_stats_data2);

            localStorageSetter(this.state.username, player_stats_data);
          }
        }
      }
    } catch (error) {
      this.setState({ error: true, isLoading: false });
    }
  };

  renderStatsCard = (state_data_player) => {
    //console.log(state_data_player)
    if (
      state_data_player !== null &&
      this.state.isLoading === false &&
      this.state.error === false
    ) {
      return (
      <StatCard stats={state_data_player.stats} type={"solo"} />
      )
    } else if (this.state.isLoading === true) {
      return <LoadingCircle />;
    }
  };

  render() {
    console.log(this.state.player_stats_data);
    return (
      <div>
        <div className="row">
          <div className="col-6 col-sm-6">
            <Form id={"form1"} onSubmit={this.submitHandler} />
            {this.renderStatsCard(this.state.player_stats_data1)}
          </div>
          <div className="col-6 col-sm-6">
            <Form id={"form2"} onSubmit={this.submitHandler} />
            {this.renderStatsCard(this.state.player_stats_data2)}
          </div>
        </div>
      </div>
    );
  }
}

export default Versus;
