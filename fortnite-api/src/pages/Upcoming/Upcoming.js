import React, { Component } from "react";
import ItemList from "../../components/Item/ItemList";

import {
  localStorageGetter,
  localStorageSetter
} from "../../storage/localStorage";
import { apiCall, timeDifferenceUpcoming } from "../../utility/utility";
import moment from "moment";
import LoadingCircle from "../../components/LoadingCircle/LoadingCircle";

class Upcoming extends Component {
  constructor(props) {
    super(props);
    this.state = { isLoading: true, data: [], error: false };
  }

  // had outer fetch statement, but got promise returns
  componentDidMount = async () => {
    this.setState({
      isLoading: true
    });
    let response;
    let data = this.state.data;
    console.log(" ------------- >", localStorageGetter("apiCallTimeUpcoming"));

    if (localStorageGetter("apiCallTimeUpcoming") !== null) {
      // check if local storage is already set

      console.log("inside firs if statement");
      let beforeHours = localStorageGetter("apiCallTimeUpcoming"); // get time of last api call

      if (timeDifferenceUpcoming(beforeHours) === true) {
        console.log("inside first if statement => timeDifferenceUpcoming");
        // if the difference between the current time and time of the last api call is greater or equal to 24 hours
        response = await apiCall("upcoming"); //fetch data (new)
        data = response.data.items; // destruct response

        localStorageSetter("apiCallTimeUpcoming", moment()); // set new time value
        localStorageSetter("data_upcoming", data); // set new data

        this.setState({ data: data, isLoading: false }); // set state with new data
      } else {
        // if the difference is under 24 hours
        console.log("inside first if statement => else statement");
        data = localStorageGetter("data_upcoming"); // set state of data as data from local storage
        this.setState({ data: data, isLoading: false });
      }
    } else {
      // if local storage is not set with data
      console.log("inside first else statement");

      response = await apiCall("upcoming"); // simply call data without time check
      data = response.data.items; // destruct response
      localStorageSetter("apiCallTimeUpcoming", moment());
      localStorageSetter("data_upcoming", data);
      this.setState({ isLoading: false, data: data });
    }
  };

  componentDidUpdate() {}

  renderComponent = () => {
    console.log(this.state.isLoading);
    if (this.state.isLoading === true) {
      return <LoadingCircle />;
    } else return <ItemList data={this.state.data} />;
  };

  render() {
    return this.renderComponent();
  }
}

export default Upcoming;
