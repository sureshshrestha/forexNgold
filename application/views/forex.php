
<link rel="stylesheet" type="text/css" href="assets/css/sidebar.css" />
<div class="container" style="margin-top: 3px">
	<div class="row-fluid" >    
		<div class="span12">
			<div  style="float: right;margin-right:20px;margin-bottom: 0px">
				<?php
				$forexs = array();
				foreach ($forex_dates as $date_forex)
				{
					$forexs[$date_forex['date_added']] = $date_forex['date_added'];
				}
				echo form_dropdown('forex_date', $forexs, '', 'id="forex_date"');
				?>
			</div><br>

			<center><div id="current" style="height: 500px;border:1px solid black;margin:20px 20px 0px 20px"></div></center>

		</div>
	</div>		
	<div class="row-fluid" >
		<div class="span12" style="margin:20px">
			<center>
				<p  style="text-color:white;text-align:center">The buying and selling rate of different foreign currency 
					on any specified date can be found from the above graphs. <br>
					This graph also compares the difference in converted currency 
					between the different foreign currency.

				</p>
			</center>
		</div>				

	</div>
	<div class="row-fluid">
		<hr>
	</div> 
	<div class="row-fluid" >
		<div class="span8" style="float:left">
			<div id="container" style="height: 500px;border:1px solid black;margin:20px  "></div>
		</div>

		<div  class="span3" style="margin:20px  ;border:solid black 1px;width:305px">
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
</div>		

<ul id="demo_menu2" >
	<li><h5><u>Forex Naming Conventions</u></h5></li>
	<li>AED : <em> UAE dirham</em></li>
	<li>AUD : <em>Australian dollar</em></li>
	<li>CAD : <em>Canadian dollar</em> </li>
	<li>CHF : <em>Swiss franc	</em></li>
	<li>CNY : <em>Chinese yuan renminbi </em></li>
	<li>DKK : <em>Danish krone </em> </li>
	<li>EUR : <em>EU euro	</em></li>
	<li>GBP : <em>British pound</em>	</li>
	<li>HKD : <em>Hong Kong SAR dollar </em></li>
	<li>INR : <em>Indian rupee*</em>	</li>
	<li>JPY : <em>Japanese yen**</em>	</li>
	<li>KPW : <em>North Korean won</em> </li>
	<li>MYR : <em>Malaysian ringgit </em></li>
	<li>NPR : <em>Nepalese rupee</em>	</li>
	<li>SAR : <em>Saudi riyal </em></li>
	<li>SGD : <em>Singapore dollar </em></li>
	<li>SEK : <em>Swedish krona </em></li>
	<li>THB : <em>Thai baht </em></li>
	<li>USD : <em>US dollar</em>	</li>
	
	<li><h6>* INR in 100 units</h6></li>
	<li><h6>** JPY in 10 units</h6></li>
	
</ul>

<script type="text/javascript" src="assets/js/jquery.sidebar.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
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
