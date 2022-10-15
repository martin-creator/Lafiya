
$.ajax({
  url: "http://localhost/healthussd/controllers/charts/subscriptiondata.php",
  method: "GET",
  success: function (data) {
    var data = $.parseJSON(data)
    var subscriptionStatus = [];
    var numberOfSubscribers = [];

    for (var i in data) {
      subscriptionStatus.push(data[i].substatus);
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
      labels: subscriptionStatus,
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

    var subchart = $("#mysubstatus");

    var barGraph = new Chart(subchart, {
      type: 'pie',
      data: chartdata
    });
  },
  error: function (data) {
    console.log(data);
  }
});
