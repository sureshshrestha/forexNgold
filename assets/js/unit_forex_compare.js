$(function() {
	$.getJSON('lib/history_forex.json', function(data) {
		
		var EUR = [],
		USD = [],
		GBP = [],
		CHF = [],
		SGD = [],
		HKD = [],
		AUD = [],
		CAD = [],
		//SGD = [],
		dataLength = data.length;

		for (i = 0; i < dataLength; i++) {
			USD.push([
				data[i][0], // the date
				data[i][2] // the volume
			]);

			EUR.push([
				data[i][0], // the date
				data[i][3] // the volume
			]);
			GBP.push([
				data[i][0], // the date
				data[i][4] // the volume
			]);
			CHF.push([
				data[i][0], // the date
				data[i][5]
			]);
//			SGD.push([
//				data[i][0], // the date
//				data[i][6]
//			]);
			HKD.push([
				data[i][0], // the date
				data[i][7]
			]);
			AUD.push([
				data[i][0], // the date
				data[i][8]
			]);

			CAD.push([
				data[i][0], // the date
				data[i][9]
			]);
			SGD.push([
				data[i][0], // the date
				data[i][10]
			]);
		}



	Highcharts.setOptions({
        global : {
            useUTC : false
        }
    });
		var chart = new Highcharts.StockChart({
        chart: {
        renderTo: 'unit',
       // type:'areaspline'
                  
    },
			rangeSelector: {
				selected: 1
			},
			title: {
				text: 'Forex Comparisons with USD in NRs.'
			},

			credits: {
			enabled: true,
              position: {
              align: 'left',
              x: 20
              },
              href:'http://www.nrb.org.np',
              text: 'Data from Nepal Rastriya Bank'
            },
			yAxis: [{
				type: 'logarithmic',
					title: {
						text: 'Nrs value'
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
			plotOptions: {
				series: {
					marker: {
						enabled: false
					}
				}
			},
			series: [{
					type: 'area',
					name: 'USD',
					data: USD
				}]

		});
	
			$('#EUR').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'EUR',
				data: EUR,
				color: '#000',
				fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove EUR');
			$('#CHF').attr('disabled', true);
			$('#GBP').attr('disabled', true);
			$('#AUD').attr('disabled', true);
			$('#CAD').attr('disabled', true);
			$('#HKD').attr('disabled', true);
			$('#SGD').attr('disabled', true);
		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('EUR');
			$('#CHF').attr('disabled', false);
			$('#GBP').attr('disabled', false);
			$('#AUD').attr('disabled', false);
			$('#CAD').attr('disabled', false);
			$('#HKD').attr('disabled', false);
			$('#SGD').attr('disabled', false);

		});


		$('#GBP').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'GBP',
				data: GBP,
				color: '#000',
				fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove GBP');
			$('#EUR').attr('disabled', true);
			$('#CHF').attr('disabled', true);
			$('#AUD').attr('disabled', true);
			$('#CAD').attr('disabled', true);
			$('#HKD').attr('disabled', true);
			$('#SGD').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text(' GBP');
			$('#EUR').attr('disabled', false);
			$('#CHF').attr('disabled', false);
			$('#CAD').attr('disabled', false);
			$('#AUD').attr('disabled', false);
			$('#HKD').attr('disabled',false);
			$('#SGD').attr('disabled', false);
		});

		$('#CHF').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'CHF',
				data: CHF,
				 color: '#000',
				 fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove CHF');
			$('#EUR').attr('disabled', true);
			$('#AUD').attr('disabled', true);
			$('#GBP').attr('disabled', true);
			$('#CAD').attr('disabled', true);
			$('#HKD').attr('disabled',true);
			$('#SGD').attr('disabled', true);


		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('CHF');
			$('#EUR').attr('disabled', false);
			$('#AUD').attr('disabled', false);
			$('#CAD').attr('disabled', false);
			$('#GBP').attr('disabled', false);
			$('#HKD').attr('disabled',false);
			$('#SGD').attr('disabled', false);
		});

		$('#SGD').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'SGD',
				data: SGD,
				color: '#000',
				fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove SGD');
			$('#EUR').attr('disabled', true);
			$('#CHF').attr('disabled', true);
			$('#GBP').attr('disabled', true);
			$('#CAD').attr('disabled', true);
			$('#HKD').attr('disabled',true);
			$('#AUD').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('YEN');
			$('#EUR').attr('disabled', false);
			$('#CHF').attr('disabled', false);
			$('#GBP').attr('disabled', false);
			$('#CAD').attr('disabled', false);
			$('#HKD').attr('disabled',false);
			$('#AUD').attr('disabled', false);

		});

		$('#HKD').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'HKD',
				data: HKD,
				color: '#000',
				fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove HKD');
			$('#EUR').attr('disabled', true);
			$('#CHF').attr('disabled', true);
			$('#GBP').attr('disabled', true);
			$('#AUD').attr('disabled', true);
			$('#SGD').attr('disabled',true);
			$('#CAD').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('HKD');
			$('#EUR').attr('disabled', false);
			$('#CHF').attr('disabled', false);
			$('#GBP').attr('disabled', false);
			$('#AUD').attr('disabled', false);
			$('#SGD').attr('disabled',false);
			$('#CAD').attr('disabled', false);
		});

		$('#AUD').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'AUD',
				data: AUD,
				color: '#000',
				fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove AUD');
			$('#EUR').attr('disabled', true);
			$('#CHF').attr('disabled', true);
			$('#GBP').attr('disabled', true);
			$('#CAD').attr('disabled', true);
			$('#HKD').attr('disabled', true);
			$('#SGD').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('AUD');
			$('#EUR').attr('disabled', false);
			$('#CHF').attr('disabled', false);
			$('#GBP').attr('disabled', false);
			$('#CAD').attr('disabled', false);
			$("#HKD").attr('disabled', false);
			$('#SGD').attr('disabled', false);
		});
		$('#CAD').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'area',
				name: 'CAD',
				data: CAD,
				color: '#000',
				fillColor : {
					linearGradient : {
						x1: 0, 
						y1: 0, 
						x2: 0, 
						y2: 1
					},
					stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
				}
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove CAD');
			$('#EUR').attr('disabled', true);
			$('#CHF').attr('disabled', true);
			$('#GBP').attr('disabled', true);
			$('#AUD').attr('disabled', true);
			$('#SGD').attr('disabled', true);
			$('#HKD').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('CAD');
			$('#EUR').attr('disabled', false);
			$('#CHF').attr('disabled', false);
			$('#GBP').attr('disabled', false);
			$('#AUD').attr('disabled', false);
			$('#HKD').attr('disabled', false);
			$('#SGD').attr('disabled', false);
		});
		



	});
});