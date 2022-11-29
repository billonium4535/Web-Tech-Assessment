function displayGraph() {
    /*var currentCity = document.getElementById("selectCity").value;
    if (currentCity === "stoke") {
        var daily = JSON.parse(dailydata_stoke);
        var forecast = JSON.parse(forecast_stoke);
    } else if (currentCity === "london") {
        var daily = JSON.parse(dailydata_london);
        var forecast = JSON.parse(forecast_london);
    }
    */

    var daily = JSON.parse(dailydata_stoke);
    var forecast = JSON.parse(forecast_stoke);

    // Searches for the label "lon" and inserts the coordinates
    // document.getElementById('lon').innerHTML = daily.coord.lon;

    // Reads in the dates from the js file and returns a list
    this.dateList = forecast.list.map(list => {
        return list.dt_txt;
    });

    // Reads in the temperature from the js file and returns a list
    this.temperatureList = forecast.list.map(list => {
        return list.main.temp;
    });


    this.windList = forecast.list.map(list => {
        return list.wind.speed;
    });


    this.humidityList = forecast.list.map(list => {
        return list.main.humidity;
    });

    // Creates a 2d line graph using the ID "temperatureChart"
    var ctx = document.getElementById('temperatureChart').getContext('2d');
    this.chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: this.dateList,
            datasets: [
                {
                    // Graph configuration
                    label: "Temperature",
                    backgroundColor: "yellow",
                    borderColor: "blue",
                    fill: false,
                    data: this.temperatureList
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Stoke-On-Trent - Temperature",
                    font: {
                        family: "Helvetica Neue",
                        size: 16,
                    }
                }
            }
        },
    })

    // Creates a 2d line graph using the ID "windChart"
    var ctx = document.getElementById('windChart').getContext('2d');
    this.chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: this.dateList,
            datasets: [
                {
                    // Graph configuration
                    label: "Wind",
                    backgroundColor: "yellow",
                    borderColor: "blue",
                    fill: false,
                    data: this.windList
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Stoke-On-Trent - Wind",
                    font: {
                        family: "Helvetica Neue",
                        size: 16,
                    }
                }
            }
        },
    })

    // Creates a 2d line graph using the ID "humidityChart"
    var ctx = document.getElementById('humidityChart').getContext('2d');
    this.chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: this.dateList,
            datasets: [
                {
                    // Graph configuration
                    label: "Humidity",
                    backgroundColor: "yellow",
                    borderColor: "blue",
                    fill: false,
                    data: this.humidityList
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: "Stoke-On-Trent - Humidity",
                    font: {
                        family: "Helvetica Neue",
                        size: 16,
                    }
                }
            }
        },
    })
}
