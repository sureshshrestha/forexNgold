$(document).ready(function(){
    $('#forex_date').change(function(){
      var selDate = $(this).val();
      
      $.ajax({
        url: "charts/drop_down_forex",    
        async: false,     
        type: "POST",         
        data: "forex_date="+selDate,    
        dataType: "json",       
        success: function chart(data) {
          var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'current',
                type: 'column',
                spacingLeft: 20
               
            },

            plotOptions: {
          column: {
                
                dataLabels: {
                enabled: true,
                rotation: -90,
                y: -25,
              
                //x: 5,
                style: {
                fontWeight: 'light',
                fontSize:'small'
                }
               }
          }
},
            title: {
                text: 'Buying / Selling of forex per unit amount'
            },

             credits: {
              position: {
              align: 'left',
              x: 20
              },
              href:'http://www.nrb.org.np',
              text: 'Data from Nepal Rastriya Bank'
            },
            xAxis: {
                title: {
                    text: 'Currencies'
                },
                
                categories: ["IC", "USD", "EUR", "GBP"," CHF","AUD","CAD","SIN ","JPY","CNY","SAR"," QAR","THB","AED","MYD ","KPW","SEK","DKK","HKD"],


              labels: {
//                      rotation: -45,
                      align: 'right'
                      },
              style: {
                fontWeight: 'bold'
                }
            },
            yAxis: {
                
                title: {
                    text: 'value'
                },
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
                series: data
            });
        }
      })
    });
});