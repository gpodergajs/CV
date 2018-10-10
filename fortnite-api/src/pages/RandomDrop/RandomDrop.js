import React, {Component} from 'react'
import styles from '../../components/RandomDrop/Styles/randomDrop.css'
import image from '../../img/vbucks.png'
import locations from '../../constants/locations_fortnite'
import {getRandomLocation} from '../../utility/utility'

class RandomDrop extends Component {
  constructor(props) {
    super(props);
    this.state = { 
        flip:false,
        dropped: null,
        randomising: null
     }
  }

  handleFlip(){
    this.setState({
      flip:true,
      dropped: 'wait for it',
      randomising: true
    })
    
    setTimeout(() => {
      this.setState({
        flip: false,
        dropped: getRandomLocation(locations),
        randomising:false
      })
    }, 2000)
    
  }

  render() { 
    const randomising = this.state.randomising;
    return ( 
      <div className="main-container">
        <img src={image} className={`img ${this.state.flip ? 'flip' : ''}`} onClick={(e) => this.handleFlip(e)}/>
        <h4 className="text">You got droped at</h4>
        <h5 className={`text ${randomising === null ? '' : randomising ? '' : randomising === false ? 'fade-in' : ''}`}>{this.state.dropped !== null ? this.state.dropped : 'Flip for location'}</h5>
      </div>
     );
  }
}
 
export default RandomDrop;