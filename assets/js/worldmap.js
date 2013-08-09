var forextoday;
var map = L.mapbox.map('map', '', {minZoom:2, maxZoom:4}).setView([37.8, -6], 2);

//map.minZoom = 2;
//map.maxZoom = 4;
//map.weight = 2;
//map.inertia = true;
var popup = new L.Popup({autoPan: false});
var legend = L.mapbox.legendControl({position: 'bottomleft'}).addLegend(getLegendHTML()).addTo(map);
var mapTitle = L.mapbox.legendControl({position: 'topright'}).addLegend(getLegendHTMLTitle()).addTo(map);
//var jsonurl = 'http://localhost/forex_ci/lib/forex_today.js';

//console.log(json.date_added);

var worldLayer = L.geoJson(worldData, {
    style: getStyle,
    onEachFeature: onEachFeature
}).addTo(map);

var cloudmade = L.tileLayer('http://{s}.tile.cloudmade.com/{key}/{styleId}/256/{z}/{x}/{y}.png', {
    attribution: 'ForexNGold &copy; 2013',
    key: '4583394e2a404d299712a3cd23db7374',
    styleId: 22677
}).addTo(map);

//$.getJSON(jsonurl, function(data) {
//    var buy = data.match(/_buy/g);
//    console.log(jsonurl.content);
//    console.log(buy);
//});

function getStyle(feature) {
//    $.getJSON(jsonurl, function(data) {
////        console.log(feature.properties.SOVEREIGNT);
//        var con = feature.properties.SOVEREIGNT;
//        var a;
//        switch (con)
//        {
//            case 'India':
//                {
//////                    console.log(con);
//                    a = json.IC_buy;
//                    console.log(a);
//////                    getColor(a);
//                }
//                return;
//            case 'United States of America':
//                {
//                    a = json.USD_buy;
//                    console.log(a);
////                    return getColor(a);
//                }
//                return;
//        }
//    });
//    console.log(data.IC_buy);
    
    return{
        weight: 0.5,
        opacity: 1,
        color: '#696c6a', //light green
        dashArray: '',
        fillOpacity: 0.7,
        fillColor: getColor(feature.properties.Forex)
                //feature.properties.Forex
    };
}

function getColor(d) {
//    $.getJSON(jsonurl, function(data) {

//         });
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

function onEachFeature(feature, layer) {
    layer.on({
        mousemove: mousemove,
        mouseout: mouseout,
        click: zoomToFeature
    });
}

var closeTooltip;
function mousemove(e) {
    var layer = e.target;
    popup.setLatLng(e.latlng);
//    popup.setContent('<h4>' + layer.feature.properties.SOVEREIGNT + ' NRs. ' + '</h4>' +
//            layer.feature.properties.SOVEREIGNT + '.');

    if (!popup._map)
        popup.openOn(map);
    window.clearTimeout(closeTooltip);
    layer.setStyle({
        weight: 3,
        opacity: 0.3,
        fillOpacity: 0.9
    });
    if (!L.Browser.ie && !L.Browser.opera) {
        layer.bringToFront();
    }

    //to load today's forex data
    var selected_country = '';
    var sel_country = '';
    selected_country = layer.feature.properties.SOVEREIGNT;
    var jsonurl = 'lib/forex_today.json';
    $.getJSON(jsonurl, function(data) {
        var price = '';
        var sel_country = '';
        switch (selected_country)
        {
            case 'India':
                {
                    sel_country = selected_country;
                    price = data.IC_buy;
                }
                break;
            case 'United States of America':
                {
                    sel_country = selected_country;
                    price = data.USD_buy;
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
            case 'Vactican':
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
            popup.setContent('<h5>' + sel_country + ' NRs. ' + price + '.</h5>');
//            layer.bindPopup(sel_country + ' : NRs ' + price);
//		else
//			layer.bindPopup(sel_country + 'Unavailable.');
    });
}

function mouseout(e) {
    worldLayer.resetStyle(e.target);
    closeTooltip = window.setTimeout(function() {
        map.closePopup();
    }, 100);
}

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}

function getLegendHTML() {
    var grades = [0, 10, 20, 50, 75, 100, 125, 150],
            labels = [],
            from, to;
    for (var i = 0; i < grades.length; i++) {
        from = grades[i];
        to = grades[i + 1];
        labels.push(
                '<i style="background:' + getColor(from + 1) + '"></i> ' +
                from + (to ? '&ndash;' + to : '+'));
    }
    return '<span>Exchange Rates in NRs.</span><br>' + labels.join('<br>');
}
function getLegendHTMLTitle() {
//    labels.push('<i>Forex rates visualizations in World Map</i> ' );
    return '<span><strong><h5 style="background-opacity:0.4">Forex rates visualizations in World Map</h5></strong></span>';
}
