const element = document.getElementById('currentTime');

setInterval(function () {
    const date = new Date();
    element.innerText = "Current Time: " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
}, 1000);