$(document).ready(function(){
		$('#date_added').change(function(){
			var selDate = $(this).val();
			//console.log(selDate);
			$.ajax({
				url: "charts/drop_down_data",		
				async: false,			
				type: "POST",					
				data: "date_added="+selDate,		
				dataType: "json",				
				success: function chart(data) {
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
		                text: ' Prices of Gold & Silver'
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
		            series: data
		        });
				}
			});
		});
});