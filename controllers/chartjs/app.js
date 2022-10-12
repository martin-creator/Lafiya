
$.ajax({
  url: "http://localhost/healthussd/controllers/charts/data.php",
  method: "GET",
  success: function (data) {
    var data = $.parseJSON(data) // important line
    //data = JSON.stringify(data)
    console.log(data);
    //data = JSON.parse(data)
    ans = typeof data
    console.log(ans);

    var player = [];
    var score = [];

    for (var i in data) {
      player.push(data[i].planName);
      score.push(data[i].freq);
    }

    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    var chartdata = {
      labels: player,
      datasets: [
        {
          label: 'Number of Subscribers',
          backgroundColor: barColors,
          borderColor: barColors,
          hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
          hoverBorderColor: 'rgba(200, 200, 200, 1)',
          data: score
        }
      ]
    };

    var ctx = $("#mycanvas");

    var barGraph = new Chart(ctx, {
      type: 'bar',
      data: chartdata,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  },
  error: function (data) {
    console.log(data);
  }
});
