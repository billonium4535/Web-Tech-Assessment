// date-time.js is used to get and format the time

// Creates a variable that has the location of where the time should be displayed
const element = document.getElementById('currentTime');

// A function to get, format and set the time
setInterval(function () {
    const date = new Date();
    element.innerText = "Current Time: " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
}, 1000);
