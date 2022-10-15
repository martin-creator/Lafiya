
$.ajax({
  url: "http://localhost/healthussd/controllers/chartsdata/plandata.php",
  method: "GET",
  success: function (data) {
    var data = $.parseJSON(data)
    var subscriptionPlans = [];
    var numberOfSubscribers = [];

    for (var i in data) {
      subscriptionPlans.push(data[i].planName);
      numberOfSubscribers.push(data[i].freq);
    }

    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9",
      "#1e7145"
    ];

    var chartdata = {
      labels: subscriptionPlans,
      datasets: [
        {
          label: 'Number of Subscribers',
          backgroundColor: barColors,
          borderColor: barColors,
          hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
          hoverBorderColor: 'rgba(200, 200, 200, 1)',
          data: numberOfSubscribers
        }
      ]
    };

    var ctx = $("#mycanvas");

    var barGraph = new Chart(ctx, {
      type: 'bar',
      data: chartdata,
      options: {
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Subscription Plan'
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true
            },
            scaleLabel: {
              display: true,
              labelString: 'Number of Subscribers'
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
