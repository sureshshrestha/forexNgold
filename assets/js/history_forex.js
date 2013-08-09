$(function() {
	$.getJSON('lib/history_forex.json', function(data) {

		// split the data set into var id
		var ic = [],
				euro = [],
				dollar = [],
				pound = [],
				franc = [],
				yen = [],
				hk_dollar = [],
				aud = [],
				cad = [],
				sgd = [],
				sar = [],
				sek = [],
				dkk = [],
				dataLength = data.length;

		for (i = 0; i < dataLength; i++) {
			ic.push([
				data[i][0],
				data[i][1]
			]);

			dollar.push([
				data[i][0], // the date
				data[i][2]
			]);

			euro.push([
				data[i][0], // the date
				data[i][3]
			]);
			pound.push([
				data[i][0],
				data[i][4]
			]);

			franc.push([
				data[i][0], // the date
				data[i][5]
			]);

			yen.push([
				data[i][0], // the date
				data[i][6]
			]);

			hk_dollar.push([
				data[i][0], // the date
				data[i][7]
			]);

			aud.push([
				data[i][0], // the date
				data[i][8]
			]);

			cad.push([
				data[i][0], // the date
				data[i][9]
			]);
			sgd.push([
				data[i][0],
				data[i][10]
			]);

			sar.push([
				data[i][0], // the date
				data[i][11]
			]);

			sek.push([
				data[i][0], // the date
				data[i][12]
			]);

			dkk.push([
				data[i][0], // the date
				data[i][13]
			]);
		}

Highcharts.setOptions({
        global : {
            useUTC : false
        }
    });



		var chart = new Highcharts.StockChart({
		        chart: {
		        renderTo: 'container',
		        type:'spline'
		                  
		    },
		
			rangeSelector: {
				selected: 1
			},
			title: {
				text: 'Forex History prices'
			},
			credits: {
              position: {
              align: 'left',
              x: 20
              },
              href:'http://www.nrb.org.np',
              text: 'Data from Nepal Rastriya Bank'
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
				layout: 'horizontal',
				
				//verticalAlign: 'bottom',
				
				backgroundColor: '#FFFFFF'
			},
			plotOptions: {
				series: {
					marker: {
						enabled: false,
						states: {
							hover: {
								enabled: true,
								radius: 3
							}
						}
					}
				}
			},
			series: [{
					type: 'spline',
					name: 'IC',
					data: ic,
					marker: {
						y: 0,
						//symbol: 'url(<?=base_url()?>assets/img/symbols/rupee.png)'
					}
				}, {
					type: 'spline',
					name: 'EUR',
					data: euro,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/euro.png)'
					}
				},
				{
					type: 'spline',
					name: 'USD',
					data: dollar,
					marker: {
						x: 10.0,
						y: 10.0,
						//symbol: 'url(<?=base_url()?>assets/img/symbols/dollar.png)'
					}

				}, {
					type: 'spline',
					name: 'GBP',
					data: pound,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/pound.png)'
					}

				}, {
					type: 'spline',
					name: 'CHF',
					data: franc
				},
				{
					type: 'spline',
					name: 'CNY',
					data: yen,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/yen.png)'
					}
				},
				{
					type: 'spline',
					name: 'HKD',
					data: hk_dollar,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/korean.png)'
					}
				}

				, {
					type: 'spline',
					name: 'AUD',
					data: aud,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/euro.png)'
					}
				},
				{
					type: 'spline',
					name: 'CAD',
					data: cad,
					marker: {
						x: 10.0,
						y: 10.0,
						//symbol: 'url(<?=base_url()?>assets/img/symbols/dollar.png)'
					}

				}, {
					type: 'spline',
					name: 'SGD',
					data: sgd,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/pound.png)'
					}

				}, {
					type: 'spline',
					name: 'SAR',
					data: sar
				},
				{
					type: 'spline',
					name: 'SEK',
					data: sek,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/yen.png)'
					}
				},
				{
					type: 'spline',
					name: 'DKK',
					data: dkk,
					marker: {
						//symbol: 'url(<?=base_url()?>assets/img/symbols/korean.png)'
					}
				}
			]
		});
	});
});