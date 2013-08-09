<div class="container" >
	
	<div class="row-fluid" >
		<div class="span8"  >
			<div id="drop_down" >
				<?php
				$date_array = array();
				foreach ($dates as $date)
				{
					$date_array[$date['Date']] = $date['Date'];
				}
				echo form_dropdown('gold_date', $date_array, '', 'id="gold_date"');
				?>
			</div>
			<div id="current_gold" ></div>
		</div>   
		<div class="span4" id="g_span4"> 
			<a class="twitter-timeline" href="https://twitter.com/search?q=%23goldprice" data-widget-id="362438888259719169">Tweets about "#goldprice"</a>
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
	<div class="row-fluid"  >	
		<div class="span12" >
			<div   id="history_gold" ></div>
			<center><p >This graph shows the increases and decreases in the price of gold and silver from the year 2067BS </p></center>
			<hr>
		</div>
	</div>

</div>

<script type="text/javascript" src="<?=base_url()?>assets/js/current_gold.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/history_gold.js"></script> 
<script type="text/javascript" src="<?=base_url()?>assets/js/select_gold_date.js"></script> 
