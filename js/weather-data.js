function changeCity() {
    var currentCity = document.getElementById("selectCity").value;
    if (currentCity === "stoke") {
        var daily = JSON.parse(dailydata_stoke);
        var forecast = JSON.parse(forecast_stoke);
    } else if (currentCity === "london") {
        var daily = JSON.parse(dailydata_london);
        var forecast = JSON.parse(forecast_london);
    }
    document.getElementById('lon').innerHTML = daily.coord.lon;

    this.dateList = forecast.list.map(list => {
        return list.dt_txt;
    });

    this.temperatureList = forecast.list.map(list => {
        return list.main.temp;
    });

    var ctx = document.getElementById('myChart').getContext('2d');
    this.chart = new Chart(ctx, {
        type: "line",
        data: {
            labels: this.dateList,
            datasets: [
                {
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
