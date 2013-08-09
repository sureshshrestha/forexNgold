$(function() {
  $.getJSON('../lib/us_gold_stock.json', function(data) {

    
    var gold = [],
        dollar= [],
      dataLength = data.length;
      
    for (i = 0; i < dataLength; i++) {
     dollar.push([
        data[i][0], 
        data[i][1] 
  
      ]);
      
      gold.push([
        data[i][0], // the date
        data[i][2] // the volume
      ]) 
    }

       Highcharts.setOptions({
        global : {
            useUTC : false
        }
    });
 
    var chart = new Highcharts.StockChart({
            chart: {
                renderTo: 'us_gold_stock',
                alignTicks: true,
                 zoomType : 'xy'
            },
            

            rangeSelector: {
                selected: 0
            },

            title: {
                text: 'Prices comparison "Gold VS Dollar" in NRs.'
            },
            
               yAxis: [{ // Primary yAxis
                labels: {
                    format: 'NRs.{value}',
                    style: {
                        color: '#89A54E'
                    }
                },
                title: {
                    text: 'DOLLOR',
                    style: {
                        color: '#89A54E'
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'GOLD',
                    style: {
                        color: '#4572A7'
                    }
                },
                labels: {
                    format: 'NRs.{value}',
                    style: {
                        color: '#4572A7'
                    }
                },
                opposite: true
            }],
            navigator: {
                enabled: false
            },
            tooltip: {
                shared: true
            },
//            legend: {
//              enabled:true,
//                layout: 'vertical',
//                align: 'center',
////                x: 120,
//                verticalAlign: 'top',
////                y: 100,
//                floating: true,
//                backgroundColor: '#FCFFC5',
//            borderColor: 'black',
//            borderWidth: 2
//            },
        //     plotOptions: {
        //         series: {
        //              marker: {
        //                 enabled: true
        //      }
        //   }
        // },
        plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                hs.htmlExpand(null, {
                                    pageOrigin: {
                                        x: this.pageX,
                                        y: this.pageY
                                    },
                                    headingText: this.series.name,
                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                        this.y +' visits',
                                    width: 200
                                });
                            }
                        }
                    },
                    marker: {
                         enabled: true,
                        lineWidth: 1
                    }
                }
            },
       

            series: [{
                name: 'Gold Rate',
                color: '#4572A7',
                type: 'spline',
                yAxis: 1,
                data: gold,
                tooltip: {
                    valuePrefix: 'Rs '
                }
    
            }, {
                name: 'Dollar Rate',
                color: '#89A54E',
                type: 'spline',
                data: dollar,
                tooltip: {
                    valuePrefix: 'Rs '
                }
            }]
            
        });
    });
});