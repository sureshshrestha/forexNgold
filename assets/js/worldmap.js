var forextoday;
var map = L.map('map', {
	weight: 2,
	minZoom: 2,
	maxZoom: 4,
	inertia: true
}).setView([37.8, -6], 2);

var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
	attribution: 'ForexNGold &copy; 2013',
	key: '4583394e2a404d299712a3cd23db7374',
	styleId: 22677
}).addTo(map);

// get color depending on population density value
function getColor(d) {
	return 	d > 150 ? '#0c5c2f' :
			d > 125 ? '#006400' :
			d > 100 ? '#2E8B57' :
			d > 75 ? '#00CD00' :
			d > 50 ? '#00FF00' :
			d > 20 ? '#9BCD9B' :
			d > 10 ? '#98FB98' :
			d > 0 ? '#C1FFC1' :
			'white';
}

function style(feature) {
	return {
		weight: 0.5,
		opacity: 1,
		color: '#696c6a', //light green
		dashArray: '',
		fillOpacity: 0.7,
		fillColor: getColor(feature.properties.Forex)
	};
}

function highlightFeature(e) {
	var layer = e.target;

	layer.setStyle({
		weight: 1,
		color: '#0066ff', //border
		dashArray: '1',
		fillOpacity: 0.7
	});

	if (!L.Browser.ie && !L.Browser.opera) {
		layer.bringToFront();
	}

	//to load today's forex data
	var selected_country = '';
	var sel_country = '';
	selected_country = layer.feature.properties.SOVEREIGNT;
	var jsonurl = 'http://localhost/forex_ci/lib/forex_today.json';
	$.getJSON(jsonurl, function(data) {
		var price = '';
		var sel_country = '';
		switch (selected_country)
		{
			case 'India':
				{
					sel_country = selected_country;
					price = data.IC_buy;
//								layer.bindPopup(sel_country + ' : NRs ' + price);
				}
				break;
			case 'United States of America':
				{
					sel_country = selected_country;
					price = data.USD_buy;
//								layer.bindPopup(sel_country + ' : NRs ' + price);
				}
				break;
			case 'United Kingdom':
				{
					sel_country = selected_country;
					price = data.GBP_buy;
				}
				break;
			case 'Andorra':
			case 'Austria':
			case 'Belgium':
			case 'Cyprus':
			case 'Estonia':
			case 'Finland':
			case 'France':
			case 'Germany':
			case 'Ireland':
			case 'Italy':
			case 'Kosovo':
			case 'Luxembourg':
			case 'Malta':
			case 'Monaco':
			case 'Montenegro':
			case 'Netherlands':
			case 'Portugal':
			case 'San Marino':
			case 'Slovakia':
			case 'Spain':
			case 'Vactican City':
				price = data.EUR_buy;
				sel_country = selected_country;
				break;
			case 'Switzerland':
				price = data.CHF_buy;
				sel_country = selected_country;
				break;
			case 'Australia':
				price = data.AUD_buy;
				sel_country = selected_country;
				break;
			case 'Canada':
				price = data.CAD_buy;
				sel_country = selected_country;
				break;
			case 'Singapore':
				price = data.SGD_buy;
				sel_country = selected_country;
				break;
			case 'Japan':
				price = data.JPY_buy;
				sel_country = selected_country;
				break;
			case 'China':
				price = data.CNY_buy;
				sel_country = selected_country;
				break;
			case 'Sweden':
				price = data.SEK_buy;
				sel_country = selected_country;
				break;
			case 'Denmark':
				price = data.DKK_buy;
				sel_country = selected_country;
				break;
			case 'Hong Kong':
				price = data.HKD_buy;
				sel_country = selected_country;
				break;
			case 'Saudi Arabia':
				price = data.SAR_buy;
				sel_country = selected_country;
				break;
			case 'Kuwait':
				price = data.QAR_buy;
				sel_country = selected_country;
				break;
			case 'Bangladesh':
				price = data.THB_buy;
				sel_country = selected_country;
				break;
			case 'United Arab Emirates':
				price = data.AED_buy;
				sel_country = selected_country;
				break;
			case 'Malaysia':
				price = data.MYR_buy;
				sel_country = selected_country;
				break;
			case 'South Korea':
				price = data.KPW_sell;
				sel_country = selected_country;
				break;
			default:
				price = '';
				sel_country = selected_country;
		}
		if (!price == '')
			layer.bindPopup(sel_country + ' : NRs ' + price);
		else
			layer.bindPopup('Unavailable.');
	});
}
var geojson;

function resetHighlight(e) {
	geojson.resetStyle(e.target);
}

function zoomToFeature(e) {
	map.fitBounds(e.target.getBounds());
	e.target.setStyle({
		fillColor: '000000' //black on click
	});

}

function onEachFeature(feature, layer) {
	layer.on({
		mouseover: highlightFeature,
		mouseout: resetHighlight,
		click: zoomToFeature
	});
}

geojson = L.geoJson(worldData, {
	style: style,
	onEachFeature: onEachFeature
}).addTo(map);

map.attributionControl.addAttribution('Forex data &copy; <a href="http://nrb.org.np/">nrb.org.np.</a>');

var legend = L.control({position: 'bottomleft'});

legend.onAdd = function(map) {

	var div = L.DomUtil.create('div', 'info legend'),
			grades = [0, 10, 20, 50, 75, 100, 125, 150],
			labels = [],
			from, to;
	labels.push('<span><strong>Exchange Range in NRs: </strong> </span>');
	for (var i = 0; i < grades.length; i++) {
		from = grades[i];
		to = grades[i + 1];

		labels.push(
				'<i style="background:' + getColor(from + 1) + '"></i> ' +
				from + (to ? '&ndash;' + to : '+'));
	}

	div.innerHTML = labels.join('<br>');
	return div;
};

legend.addTo(map);