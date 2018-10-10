import React, { Component } from "react";
import './Styles/statsCard.css'

const SoloStatsCard = props => {

  const { stats, type } = props;
  return (
    <div className="card" style={{border:0, marginTop:'1em'}}>
      <div className="card-header" style={type==='solo' ? {background:'rgb(66, 131, 237)'} : type==='duo' ? {background: 'green'} : type==='squad' ? {background:'pink'} : {background:'white'}}>
      <div className="row">
        <div className="col-8">
          {type === 'solo' ? 'Solo' : type === 'duo' ? 'Duo' : type === 'squad' ? 'Squad' : '' }
        </div>
        <div className="col-4">
        Matches &nbsp;
        {type === 'solo' ? stats.matchesplayed_solo : type === 'duo' ? stats.matchesplayed_duo : type === 'squad' ? stats.matchesplayed_squad : '' }
        </div>
        </div>
      </div>
      <div className="card-body" style={{backgroundColor:'rgb(0,0,0,0.8)'}}>
        <div className="row">
          <div className="col-6 col-sm-3" >
            <div>
              <p style={{color:'white'}}>Score</p>
            </div>
            <div>
              <p style={{color:'white'}}> {type === 'solo' ? stats.score_solo : type === 'duo' ? stats.score_duo : type === 'squad' ? stats.score_squad : '' }</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p style={{color:'white'}}>Win %</p>
            </div>
            <div>
              <p style={{color:'white'}}>{type === 'solo' ? stats.winrate_solo : type === 'duo' ? stats.winrate_duo : type === 'squad' ? stats.winrate_squad : '' }</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p style={{color:'white'}}>{type === 'solo' ? 'Top 1' : type === 'duo' ? 'Top 1' : type === 'squad' ? 'Top 1' : '' }</p>
            </div>
            <div>
              <p style={{color:'white'}}>{type === 'solo' ? stats.placetop1_solo : type === 'duo' ? stats.placetop1_duo : type === 'squad' ? stats.placetop1_squad : '' }</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p style={{color:'white'}}>{type === 'solo' ? 'Top 10' : type === 'duo' ? 'Top 5' : type === 'squad' ? 'Top 3' : '' }</p>
            </div>
            <div>
              <p style={{color:'white'}}>{type === 'solo' ? stats.placetop10_solo : type === 'duo' ? stats.placetop5_duo : type === 'squad' ? stats.placetop3_squad : '' }</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default SoloStatsCard;

/*

   <div className="col-12">
            <div className="row">
          <div className="col-6" style={{background:'white'}}>
            <div>potatoe</div>
            <div>potatoe2</div>
          </div>
          <div className="col-6" style={{background:'white'}}>
            <div>potatoe</div>
            <div>potatoe2</div>
          </div>
          </div>
          </div>
          <div className="col-12">
          <div className="row">
          <div className="col-6" style={{background:'black'}}></div>
          <div className="col-6" style={{background:'black'}}></div>
          </div>
          </div>

*/
