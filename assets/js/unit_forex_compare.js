$(function() {
	$.getJSON('lib/history_forex.json', function(data) {
		
		var euro = [],
		dollar = [],
		pound = [],
		franc = [],
		yen = [],
		hk = [],
		aud = [],
		cad = [],
		sgd = [],
		dataLength = data.length;

		for (i = 0; i < dataLength; i++) {
			dollar.push([
				data[i][0], // the date
				data[i][2] // the volume
			]);

			euro.push([
				data[i][0], // the date
				data[i][3] // the volume
			]);
			pound.push([
				data[i][0], // the date
				data[i][4] // the volume
			]);
			franc.push([
				data[i][0], // the date
				data[i][5]
			]);
			yen.push([
				data[i][0], // the date
				data[i][6]
			]);
			hk.push([
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
        type:'spline'
                  
    },
			rangeSelector: {
				selected: 1
			},
			title: {
				text: 'Forex Comparisons with dollar in NRs.'
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
					type: 'spline',
					name: 'US Dollar',
					data: dollar
				}]

		});
	
			$('#euro').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'EURO',
				data: euro,
				color: '#660'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove Euro');
			$('#franc').attr('disabled', true);
			$('#pound').attr('disabled', true);
			$('#aud').attr('disabled', true);
			$('#cad').attr('disabled', true);
			$('#hk').attr('disabled', true);
			$('#yen').attr('disabled', true);
		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('EURO');
			$('#franc').attr('disabled', false);
			$('#pound').attr('disabled', false);
			$('#aud').attr('disabled', false);
			$('#cad').attr('disabled', false);
			$('#hk').attr('disabled', false);
			$('#yen').attr('disabled', false);

		});


		$('#pound').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'POUND',
				data: pound,
				color: '#990'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove Pound');
			$('#euro').attr('disabled', true);
			$('#franc').attr('disabled', true);
			$('#aud').attr('disabled', true);
			$('#cad').attr('disabled', true);
			$('#hk').attr('disabled', true);
			$('#yen').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text(' Pound');
			$('#euro').attr('disabled', false);
			$('#franc').attr('disabled', false);
			$('#cad').attr('disabled', false);
			$('#aud').attr('disabled', false);
			$('#hk').attr('disabled',false);
			$('#yen').attr('disabled', false);
		});

		$('#franc').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'Franc',
				data: franc,
				 color: '#000'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove FRANC');
			$('#euro').attr('disabled', true);
			$('#aud').attr('disabled', true);
			$('#pound').attr('disabled', true);
			$('#cad').attr('disabled', true);
			$('#hk').attr('disabled',true);
			$('#yen').attr('disabled', true);


		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('Pound');
			$('#euro').attr('disabled', false);
			$('#aud').attr('disabled', false);
			$('#cad').attr('disabled', false);
			$('#pound').attr('disabled', false);
			$('#hk').attr('disabled',false);
			$('#yen').attr('disabled', false);
		});

		$('#yen').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'YEN',
				data: yen,
				color: '#800'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove YEN');
			$('#euro').attr('disabled', true);
			$('#franc').attr('disabled', true);
			$('#pound').attr('disabled', true);
			$('#cad').attr('disabled', true);
			$('#hk').attr('disabled',true);
			$('#aud').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('YEN');
			$('#euro').attr('disabled', false);
			$('#franc').attr('disabled', false);
			$('#pound').attr('disabled', false);
			$('#cad').attr('disabled', false);
			$('#hk').attr('disabled',false);
			$('#aud').attr('disabled', false);

		});

		$('#hk').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'HK',
				data: hk,
				color: '#990'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove HK');
			$('#euro').attr('disabled', true);
			$('#franc').attr('disabled', true);
			$('#pound').attr('disabled', true);
			$('#aud').attr('disabled', true);
			$('#yen').attr('disabled',true);
			$('#cad').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('HK');
			$('#euro').attr('disabled', false);
			$('#franc').attr('disabled', false);
			$('#pound').attr('disabled', false);
			$('#aud').attr('disabled', false);
			$('#yen').attr('disabled',false);
			$('#cad').attr('disabled', false);
		});

		$('#aud').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'AUD',
				data: aud,
				color: '#000'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove AUD');
			$('#euro').attr('disabled', true);
			$('#franc').attr('disabled', true);
			$('#pound').attr('disabled', true);
			$('#cad').attr('disabled', true);
			$('#hk').attr('disabled', true);
			$('#yen').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('AUD');
			$('#euro').attr('disabled', false);
			$('#franc').attr('disabled', false);
			$('#pound').attr('disabled', false);
			$('#cad').attr('disabled', false);
			$("#hk").attr('disabled', false);
			$('#yen').attr('disabled', false);
		});
		$('#cad').toggle(function() {
			var chart = $('#unit').highcharts();
			chart.addSeries({
				type: 'spline',
				name: 'CAD',
				data: cad,
				color: '#990'
			});
			// $(this).attr('disabled', true);
			$(this).text('Remove CAD');
			$('#euro').attr('disabled', true);
			$('#franc').attr('disabled', true);
			$('#pound').attr('disabled', true);
			$('#aud').attr('disabled', true);
			$('#yen').attr('disabled', true);
			$('#hk').attr('disabled', true);

		}, function() {
			var chart = $('#unit').highcharts();
			chart.series[2].remove();
			$(this).text('CAD');
			$('#euro').attr('disabled', false);
			$('#franc').attr('disabled', false);
			$('#pound').attr('disabled', false);
			$('#aud').attr('disabled', false);
			$('#hk').attr('disabled', false);
			$('#yen').attr('disabled', false);
		});
		



	});
});