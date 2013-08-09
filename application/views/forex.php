<style>
    #map {
                width: 1024px;
                height: 500px
            }

            .map-legend i {
                width: 18px;
                height: 18px;
                float: left;
                margin-right: 8px;
                opacity: 0.7;
            }
            .leaflet-popup-close-button{
                display: none;
            }

            .leaflet-popup-content-wrapper{
                pointer-events: none;
            }
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/sidebar.css" />
<div class="container" >
	
	<div class="hero-unit" >
		<div id="map" tabindex="0" class="thumbnail"></div>
	</div>


	

	<hr>
	<div class="row-fluid" >    
		<div class="span12">
			<div  id="fx_date">
				<?php
				$forexs = array();
				foreach ($forex_dates as $date_forex)
				{
					$forexs[$date_forex['Date']] = $date_forex['Date'];
				}
				echo form_dropdown('forex_date', $forexs, '', 'id="forex_date"');
				?>
			</div><br>

			<center><div class="thumbnail" id="fx_current"><div id="current" class="fx_current"></div></div></center>

		</div>
	</div>		
   
	<div class="row-fluid" >
		<div class="span12" >
			<center>
				<p id="forex_p" >The buying and selling rate of different foreign currency 
					on any specified date can be found from the above graphs. <br>
					This graph also compares the difference in converted currency 
					between the different foreign currency.

				</p>
			</center>
		</div>				
	<hr>
    </div>
	

	<div class="row-fluid" >
		<div class="span8" >
			<div class="thumbnail">
			<div id="container" class="fx_cont"></div>
			
		</div>
        </div>    
		<div  class="span3" id="fx_span3">
			<a class="twitter-timeline" href="https://twitter.com/search?q=%23forex" data-widget-id="362480211285143552">Tweets about "#forex"</a>
			<script>!function(d, s, id) {
					var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
					if (!d.getElementById(id)) {
						js = d.createElement(s);
						js.id = id;
						js.src = p + "://platform.twitter.com/widgets.js";
						fjs.parentNode.insertBefore(js, fjs);
					}
				}(document, "script", "twitter-wjs");</script>
		</div>

            </div>  
<hr>
 
	
<div class="row-fluid">


		<center>
		<h5>COMPARISON BETWEEN DIFFERENT FOREIGN CURRENCIES WITH USD</h5>
		</center>
	</div>
	

<div class="row-fluid" >	

		<div class="span12" >
			<div class="unit_comp">
				<center>
				<div id="unit" class="thumbnail" ></div>
				</center>
			</div>   
		</div >
		
	</div>
<div class="row-fluid" >
			<div class="span12">
			<CENTER>
			<button id="EUR"  class="btn btn-primary" >EUR</button>
			<button id="GBP" class="btn btn-primary">GBP</button>
			<button id="CHF" class="btn btn-primary">CHF</button><BR>
            
			<button id="AUD" class="btn btn-primary">AUD</button>
			<button id="CAD" class="btn btn-primary">CAD</button>
			<button id="SGD" class="btn btn-primary">SGD</button>
			</CENTER>
			</div>

		</div>
</div>		


<ul id="demo_menu2" >
	<li><h5><u>Forex Naming Conventions</u></h5></li>
	<li>AED :  <em> UAE dirham</em></li>
	<li>AUD :  <em>Australian dollar</em></li>
	<li>CAD :  <em>Canadian dollar</em> </li>
	<li>CHF :  <em>Swiss franc	</em></li>
	<li>CNY :  <em>Chinese yuan renminbi </em></li>
	<li>DKK :  <em>Danish krone </em> </li>
	<li>EUR :  <em>EU euro	</em></li>
	<li>GBP :  <em>British pound</em>	</li>
	<li>HKD :  <em>Hong Kong SAR dollar </em></li>
	<li>INR :  <em>Indian rupee*</em>	</li>
	<li>JPY :  <em>Japanese yen**</em>	</li>
	<li>KPW :  <em>South Korean won***</em> </li>
	<li>MYR :  <em>Malaysian ringgit </em></li>
	<li>NPR :  <em>Nepalese rupee</em>	</li>
	<li>SAR :  <em>Saudi riyal </em></li>
	<li>SGD :  <em>Singapore dollar </em></li>
	<li>SEK :  <em>Swedish krona </em></li>
	<li>THB :  <em>Thai baht </em></li>
<li>USD : <em>US dollar</em>	</li>
<br>    
    <li>* INR in 100 units</li>
	<li>** JPY in 10 units</li>
	<li>*** KPW in 100 units</li>
</ul>

<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.sidebar.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/jquery-ui.min.js"></script>
<script type="text/javascript">
	$("ul#demo_menu1").sidebar();
	$("ul#demo_menu2").sidebar({
		position: "right",
		callback: {
			item: {
				enter: function() {
					$(this).find("a").animate({color: "red"}, 250);
				},
				leave: function() {
					$(this).find("a").animate({color: "white"}, 250);
				}
			}
		}
	});
	$("ul#demo_menu3").sidebar({
		position: "top",
		open: "click"
	});
	$("ul#demo_menu4").sidebar({
		position: "bottom"
	});
</script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/current_forex.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/history_forex.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/select_forex_date.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/unit_forex_compare.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/countries.js"></script>
<!--<script type="text/javascript" src="<?= base_url() ?>assets/js/leaflet.js"></script>-->
<script type="text/javascript" src="<?= base_url() ?>assets/js/mapbox.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/worldmap.js"></script>
<script type="text/javascript" src='<?= base_url() ?>lib/forex_today.js'></script>

