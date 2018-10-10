import React, { Component } from "react";
import "./Styles/totalsStats.css";

const TotalStatsCard = props => {
  const { stats } = props;
  return (

    <div className="card" style={{border:0, marginTop:'1em'}}>
      <div className="card-header" style={{background:'rgb(0, 0, 0, 0.1)'}}>
      <div className="row">
        <div className="col-8">
          Totals
        </div>
        <div className="col-4">
         Matches {" " + stats.matchesplayed}
        </div>
        </div>
      </div>
      <div className="card-body">
        <div className="row">
          <div className="col-6 col-sm-3">
            <div>
              <p>Score</p>
            </div>
            <div>
              <p>{stats.score}</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p>Win %</p>
            </div>
            <div>
              <p>{stats.winrate}</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p>Kills</p>
            </div>
            <div>
              <p>{stats.kills}</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p>K/D</p>
            </div>
            <div>
              <p>{stats.kd}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  
    /*
    <div className="card">
      <div className="card-header">
      <div className="row">
        <div className="col-8">
          Totals
        </div>
        <div className="col-4">
        Matches {" " + stats.matchesplayed}
        </div>
        </div>
      </div>
      <div className="card-body">
        <div className="row">
          <div className="col-6 col-sm-3">
            <div>
              <p>Wins</p>
            </div>
            <div>
              <p>{stats.wins}</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p>Win %</p>
            </div>
            <div>
              <p>{stats.winrate}</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p>Kills</p>
            </div>
            <div>
              <p>{stats.kills}</p>
            </div>
          </div>
          <div className="col-6 col-sm-3">
            <div>
              <p>K/D ratio</p>
            </div>
            <div>
              <p>{stats.kd}</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    /* <div className="card">
      <div className="card-header" style={{backgroundColor:'rgba(0,0,0,0.5)'}}>Totals</div>
      <div className="card-body" style={{ backgroundColor: "rgba(0,0,0,0.7)" }}>
        <div className="row">
          <div className="col-6">
            <div className="col-6">
              <div>
                <p>Wins</p>
              </div>
              <div>
                <p>{stats.wins}</p>
              </div>
            </div>
            <div className="col-6">
              <div>
                <p>Win %</p>
              </div>
              <div />
              <p>{stats.winrate}</p>
            </div>
          </div>
          <div className="col 6">
            <div className="col-6">
              <div>
                <p>Kills</p>
              </div>
              <div>
                <h6>{stats.kills}</h6>
              </div>
            </div>
            <div className="col-6">
              <div>
                <p>K/D</p>
              </div>
              <div>
                <p>{stats.kd}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    */
  );
};

export default TotalStatsCard;
