import React, { Component } from "react";
import Item from "./Item";


class ItemList extends Component {
  componentDidMount() {
  }

  renderFragment = () => {
    if (this.props.data.length > 0) {
      return (
        <React.Fragment>
          <div className="container-fluid">
            <div className="row" style={{backgroundColor:'black'}}>
              {this.props.data.map(obj => {
                return (
                  <div className="col-sm-6 col-md-6 col-lg-3">
                    <Item data={obj} />
                  </div>
                );
              })}
            </div>
          </div>
        </React.Fragment>
      );
    } else {
      return  <div>No data available, refresh page</div>//<LoadingCircle/>;
    }
  };

  render() {
    return this.renderFragment();
  }
}

export default ItemList;
