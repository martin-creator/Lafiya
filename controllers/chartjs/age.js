
$.ajax({
    url: "http://localhost/healthussd/controllers/charts/agedata.php",
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

                if (data[i].age >= 18 && data[i].age <= 30 ){
                    player.push( "18 to 30" );
                } else if (data[i].age >= 31 && data[i].age <= 50){
                    player.push( "31 to 50" );
                }else{
                    player.push( "51 to 120" );
                }

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
                  label: 'Number of Subscribers',
                  backgroundColor: barColors,
                  borderColor: barColors,
                  hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                  hoverBorderColor: 'rgba(200, 200, 200, 1)',
                  data: xValues,
                  
                }
              ]
            };

            var agechart = $("#myage");

            var barGraph = new Chart(agechart, {
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
