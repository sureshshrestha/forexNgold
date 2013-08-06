$(function() {
	$.getJSON('http://localhost/forex_ci/lib/history_gold.json', function(data) {

		
		var hallmark = [],
				tejabi = [],
				silver = [],
				dataLength = data.length;

		for (i = 0; i < dataLength; i++) {
			hallmark.push([
				data[i][0],
				data[i][1]

			]);

			tejabi.push([
				data[i][0], // the date
				data[i][2] // the volume
			]);

			silver.push([
				data[i][0], // the date
				data[i][3] // the volume
			]);
		}

	Highcharts.setOptions({
        global : {
            useUTC : false
        }
    });

		var chart = new Highcharts.StockChart({
        chart: {
        renderTo: 'history_gold',
        type:'spline'
                  
    },
			rangeSelector: {
				selected: 1
			},
			title: {
				text: 'Historical data about Gold & Silver prices'
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
			yAxis: [{
					title: {
						text: 'Price in NRs.'
					}
				}],
			tooltip: {
				valueDecimals: 2
			},
			legend: {
				enabled: true,
				layout: 'vertical',
				align: 'left',
				x: 120,
				verticalAlign: 'top',
				y: 100,
				floating: true,
				backgroundColor: '#FFFFFF'
			},
			series: [
				{
					type: 'spline',
					name: 'Hallmark Gold',
					data: hallmark,
					color: '#FF0000',
					marker: {
						symbol: 'url(http://localhost/forex_ci/assets/img/symbols/gold.png)'
					}
				}, {
					type: 'spline',
					name: 'Tejabi Gold',
					data: tejabi,
					marker: {
						symbol: 'url(http://localhost/forex_ci/assets/img/symbols/gold.png)'
					}
				},
				{
					type: 'spline',
					name: 'Silver',
					data: silver,
					marker: {
						symbol: 'url(http://localhost/forex_ci/assets/img/symbols/silver.png)'
								//  symbol: 'url(<?=base_url()?>assets/img/sun.png)'
					}
				}
			]
		});


		$('#toggle-opposite').click(function() {
			var opposite = true;
			var chart = $('#history_gold').highcharts();
			chart.yAxis[0].update({
				opposite: opposite
			});
			opposite = !opposite;
		});
	});
});
