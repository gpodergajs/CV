import moment from "moment";
import axios from "axios";
import {
  localStorageGetter,
  localStorageSetter
} from "../storage/localStorage";

export const timeDifferenceUpcoming = beforeHours => {
  
  // gmt sync 
  let differenceHours = moment().diff(beforeHours, "hours"); 
  if (differenceHours >= 24) {
    return true;
  } else return false;
};


export const timeDifferencePlayer = beforeMinutes => { // difference in minutes
  let diff = moment().diff(beforeMinutes, "minutes")
  let differenceMinutes = moment.duration(diff).asMinutes()

  console.log('difference in minutes', differenceMinutes)
  if(differenceMinutes >= 30) {
    return true
  }else return false
};

export const apiCall = async type => {
  // type === upcoming || store || player?
  let url = `https://fortnite-public-api.theapinetwork.com/prod09/${type}/get`;

  let header = {
    headers: {
      "Content-Type": "application/json",
      Authorization: process.env.REACT_APP_API,
      language: "eng"
    }
  };

  let response;
  try {
    response = await axios.post(url, "", header);
  } catch (error) {
    console.log("inside utility", error);
  }

  return response;
};

export const apiGetUserId = async username => {
  
  let url = "https://fortnite-public-api.theapinetwork.com/prod09/users/id"
  
  let header = {
    headers: {
      'Content-Type': 'multipart/form-data',
      Authorization: process.env.REACT_APP_API,
      language: 'eng'
    }
  }
  
  var bodyFormData = new FormData();
  bodyFormData.set('username', username);
  try {
    const response = await axios.post(url,bodyFormData,header)
    console.log(response)
    return response.data;
  }catch(error) {
    console.log('error',error)
    //return null;
  }

 

}

// username_platform -> key
export const apiCallUser = async (user_id,platform,window) => {
  let url = "https://fortnite-public-api.theapinetwork.com/prod09/users/public/br_stats";
  let header = {
    headers: {
      "Content-Type": "multipart/form-data",
      Authorization: process.env.REACT_APP_API,
      language: "eng"
    }
  }

  let bodyFormData = new FormData();
  bodyFormData.set('user_id', user_id)
  bodyFormData.set('platform', platform)
  bodyFormData.set('window', 'alltime')

  try {
    const response = await axios.post(url, bodyFormData, header);
    return response;
  }catch(error) {
    console.log('error',error)
    //return null;
  }
}


export const getRandomLocation = (locations) => {
  var location = locations[Math.floor(Math.random()*locations.length)]
  return location;
}
