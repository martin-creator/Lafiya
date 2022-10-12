
$.ajax({
    url: "http://localhost/healthussd/controllers/charts/healthdata.php",
    method: "GET",
    success: function (data) {
        var data = $.parseJSON(data) // important line
        //data = JSON.stringify(data)
        console.log(data);
        //data = JSON.parse(data)
        ans = typeof data
        console.log(ans);

        var player = [];
        var xValues = [];

            for(var i in data) {
              player.push( data[i].healthcondition);
              xValues.push(data[i].freq);
            }
            console.log(xValues);

            var barColors = [
                "#b91d47",
                "#00aba9",
                "#2b5797",
                "#e8c3b9",
                "#1e7145"
            ];

            var chartdata = {
              labels: player,
              datasets : [
                {
                  label: 'Number of Patients',
                  backgroundColor: barColors,
                  borderColor: barColors,
                  hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                  hoverBorderColor: 'rgba(200, 200, 200, 1)',
                  data: xValues,
                  
                }
              ]
            };

            var healthchart = $("#myhealthcanvas");

            var barGraph = new Chart(healthchart, {
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
          error: function(data) {
            console.log(data);
    }
});
