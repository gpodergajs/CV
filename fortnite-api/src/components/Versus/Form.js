import React, {Component} from 'react'

class Form extends Component {
  constructor(props) {
    super(props);
    this.state = {
      platform : "",
      username: ""
      }
  }

  submitHandler = (event) => {
    event.preventDefault()
    console.log(this.state.username)
    this.props.onSubmit([this.props.id, this.state.username, this.state.platform]); // object passing doesnt work for some reason
  }

  inputHandler = (event) => {
    event.preventDefault();
    this.setState({
      username: event.target.value
    })
    
    //this.props.onChange()
  }

  buttonHandler = (event) => {
    event.preventDefault();

    this.setState({
      platform: event.target.value
    })
    

  }

  render() { 
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
  }
}
 
export default Form;