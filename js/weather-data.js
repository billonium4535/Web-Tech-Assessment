// weather-data.js is used to get and display the weather data

// A function to update the table with new publications
function displayGraph() {

    // Creates new variables to get the forcast
    var daily = JSON.parse(dailydata_stoke);
    var forecast = JSON.parse(forecast_stoke);

    // Reads in the dates from the js file and returns a list
    this.dateList = forecast.list.map(list => {
        return list.dt_txt;
    });

    // Reads in the temperature from the js file and returns a list
    this.temperatureList = forecast.list.map(list => {
        return list.main.temp;
    });

    // Reads in the wind from the js file and returns a list
    this.windList = forecast.list.map(list => {
        return list.wind.speed;
    });

    // Reads in the humitity from the js file and returns a list
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
        // Sets the options of the graph
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
        // Sets the options of the graph
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
        // Sets the options of the graph
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
