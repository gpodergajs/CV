import React, { Component } from "react";
import styles from "./Styles/loadingCircle.css";

const LoadingCircle = () => {
  return (
      <div
        style={{
          display: "flex",
          alignContent: "center",
          justifyContent: "center"
        }}
      >
        <div className="loader" />
      </div>
  );
};

export default LoadingCircle;
