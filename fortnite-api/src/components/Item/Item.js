import React, { Component } from "react";
import img from "../../img/vbucks.png";
import "./Styles/item.css";

class Item extends Component {
  constructor(props) {
    super(props);
    this.state = {};
  }

  renderVBucks = () => {
    if (this.props.data.cost !== "???") {
      return (<div style={{margin:'1em 0'}} className="row justify-content-center">
        <img src={img} style={{width:25, height:25 }} /> 
         <p style={{color:'white'}}>{this.props.data.cost}</p>
         </div>);
    } else return <div></div>;
  };

  render() {
    const { data } = this.props;
    const item = data.item;
    const images = item.images;

    return (
      <div
        className="card bg-inverse"
        style={{ backgroundColor: "black", padding: "0.5em 0em" }}>
        <img className="card-img" src={images.background} />

        <div style={{padding:0}} className="card-img-overlay h-100 d-flex flex-column justify-content-end overlay">
          <div
            className="card-title text-center h-25 d-flex flex-column justify-content-center"
            style={{ backgroundColor: "rgba(0,0,0,0.5)" , margin:0}}
          >
            <h3 className="d-flex flex-column" style={{ color: "white" }}>
              {data.name}
            </h3>
            {this.renderVBucks()}
          </div>
        </div>
      </div>
    );
  }
}

export default Item;

/*
 <div className="card-body" style={{opacity:0.3, backgroundColor:'black', position:'absolute', bottom:10, left:0,right:0}}>
            <h3
              className="card-title text-center e"
              style={{ position: "absolute", bottom: 10, right: 0, left: 0 , opacity: 1}}
            >
              {data.name}
            </h3> 
          </div>

           <img src={img} className="d-flex flex-column" style={{height:'auto'}}></img>
*/
