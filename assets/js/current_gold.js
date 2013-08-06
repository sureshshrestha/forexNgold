$(document).ready(function(){
    $.getJSON('http://localhost/forex_ci/lib/current_gold.json', function(json){

        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'current_gold',
                type: 'column'
            },
            plotOptions: {
                  column: {
                        
                    dataLabels: {
                        enabled: true,
                    style: {
                        fontWeight: 'light'
                        }
                       }
                  }
                },  
            title: {
                text: 'Prices of Gold & Silver'
            },
            credits: {
            enabled: true,
              position: {
              align: 'left',
              x: 20
              },
              href:'http://www.negosida.com.np',
              text: 'Data from negosida.com.np'
            },
            xAxis: {
                title: {
                    text: 'metal'
                },
               categories: [""]
            },
            yAxis: {
                type: 'logarithmic',
                title: {
                    text: 'Price in NRs.'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name + '</b><br />'+
                    this.x + ': ' + this.y;
                }
            },
            legend: {
                align: 'center'
            },
            series: json
        });

   
});

});