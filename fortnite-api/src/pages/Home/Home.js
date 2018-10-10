import React, { Component } from "react";
import {
  localStorageGetter,
  localStorageSetter
} from "../../storage/localStorage";
import { apiCall, timeDifferenceUpcoming } from "../../utility/utility";
import moment from "moment";
import ItemList from "../../components/Item/ItemList";
import LoadingCircle from "../../components/LoadingCircle/LoadingCircle";

class Home extends Component {
  constructor(props) {
    super(props);
    this.state = {
      isLoading: false,
      data: [{}, {}, {}, {}, {}, {}, {}],
      dataStore: [],
      error: false
    };
  }

  // had outer fetch statement, but got promise returns
  componentDidMount = async () => {
    this.setState({
      isLoading: true
    });
    let response;
    let data = this.state.dataStore;
    console.log(" ------------- >", localStorageGetter("apiCallTimeStore"));

    if (localStorageGetter("apiCallTimeStore") !== null) {
      // check if local storage is already set

      console.log("inside firs if statement");
      let beforeHours = localStorageGetter("apiCallTimeStore"); // get time of last api call

      if (timeDifferenceUpcoming(beforeHours) === true) {
        console.log("inside first if statement => timeDifferenceUpcoming");
        // if the difference between the current time and time of the last api call is greater or equal to 24 hours
        response = await apiCall("store"); //fetch data (new)
        data = response.items; // destruct response

        localStorageSetter("apiCallTimeStore", moment()); // set new time value
        localStorageSetter("data_store", data); // set new data

        this.setState({ dataStore: data, isLoading: false }); // set state with new data
      } else {
        // if the difference is under 24 hours
        console.log("inside first if statement => else statement");
        data = localStorageGetter("data_store"); // set state of data as data from local storage
        this.setState({ dataStore: data, isLoading: false });
      }
    } else {
      // if local storage is not set with data
      console.log("inside first else statement");

      response = await apiCall("store"); // simply call data without time check
      data = response.data.items; // destruct response
      console.log(data);
      localStorageSetter("apiCallTimeStore", moment());
      localStorageSetter("data_store", data);
      this.setState({ isLoading: false, dataStore: data });
    }
  };

  componentDidUpdate() {}

  renderStore = () => {
    if (this.state.isLoading === true) {
      return <LoadingCircle />;
    } else return <ItemList data={this.state.dataStore} />;
  };

  render() {
    console.log(this.state.dataStore);
    return (
        this.renderStore()
      )
      /* Daily and features styling
      <React.Fragment>
        <div className="container-responsive">
          <div className="row">
            <div className="col-12 col-sm-6 col-md-6 ">
              <h1 style={{ textAlign: "center", color: "white" }}> Daily</h1>
              <div className="row">
                {this.state.dataStore.map(obj => {
                  return (
                    <div className="col-12 col-sm-6 col-md-6">
                      <div className="card">
                        <img
                          className="card-img-top"
                          src={obj.item.images.background}
                        />
                        <div className="card-img-overlay">
                          <div className="card-body">
                            <h3
                              className="card-title text-center e"
                              style={{
                                position: "absolute",
                                bottom: 10,
                                right: 0,
                                left: 0
                              }}
                            >
                              {obj.name}
                            </h3>
                          </div>
                        </div>
                      </div>
                    </div>
                  );
                })}
              </div>
            </div>
            <div className="col-12 col-sm-6 col-md-6">
              <h1 style={{ textAlign: "center", color: "white" }}>
                {" "}
                Featured{" "}
              </h1>
              <div className="row">
                {this.state.data.map(obj => {
                  return (
                    <div className="col-6 col-sm-6 col-md-6">
                      <div className="card">
                        <img
                          className="card-img-top"
                          src="https://fortnite-public-files.theapinetwork.com/image/ef6502d-f7ed2d2-7e4e7ad-c2864d9.png"
                        />
                      </div>
                    </div>
                  );
                })}
              </div>
            </div>
          </div>
        </div>
      </React.Fragment> */
  
  }
}

export default Home;
