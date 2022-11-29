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

    var daily = JSON.parse(dailydata_london);
    var forecast = JSON.parse(forecast_london);

    // Searches for the label "lon" and inserts the coordinates
    document.getElementById('lon').innerHTML = daily.coord.lon;

    // Reads in the dates from the js file and returns a list
    this.dateList = forecast.list.map(list => {
        return list.dt_txt;
    });

    // Reads in the temperature from the js file and returns a list
    this.temperatureList = forecast.list.map(list => {
        return list.main.temp;
    });

    // Creates a 2d line graph using the ID "myChart"
    var ctx = document.getElementById('myChart').getContext('2d');
    this.chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: this.dateList,
            datasets: [
                {
                    // Graph configuration
                    label: "Temperature",
                    backgroundColor: "lightblue",
                    borderColor: "blue",
                    fill: false,
                    data: this.temperatureList
                }
            ]
        }
    })
}
