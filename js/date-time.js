const element = document.getElementById('currentTime');

setInterval(function () {
    const currentDate = new Date();
    element.innerText = "Current Time: " + currentDate.getHours() + ":" + currentDate.getMinutes() + ":" + currentDate.getSeconds();
}, 1000);