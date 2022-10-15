
$.ajax({
    url: "http://localhost/healthussd/controllers/chartsdata/agedata.php",
    method: "GET",
    success: function (data) {
        var data = $.parseJSON(data)
        var ageRange = [];
        var numberOfSubscribers = [];

        for (var i in data) {

            if (data[i].age >= 18 && data[i].age <= 30) {
                ageRange.push("18 to 30");
            } else if (data[i].age >= 31 && data[i].age <= 50) {
                ageRange.push("31 to 50");
            } else {
                ageRange.push("51 to 120");
            }

            numberOfSubscribers.push(data[i].freq);
        }

        console.log(numberOfSubscribers);

        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        var chartdata = {
            labels: ageRange,
            datasets: [
                {
                    label: 'Number of Subscribers',
                    backgroundColor: barColors,
                    borderColor: barColors,
                    hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: numberOfSubscribers,

                }
            ]
        };

        var agechart = $("#myage");

        var barGraph = new Chart(agechart, {
            type: 'bar',
            data: chartdata,
            options: {
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Age Range'
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
