
<div class="container" >
 
<div class="row-fluid" style="margin-top:3px" >	
	 <div class="span12" >
		<div  class="" id="history_gold"  style=" border:1px solid black;height: 400px;margin:20px"></div>
		<center><p stye="text-color:gray;border:solid white 1px">This graph shows the increases and decreases in the price of gold and silver from the year 2067BS </p></center>
		<hr>
	</div>
		     <!--<button id="toggle-opposite">Opposite</button>-->
	
	  </div>



<div class="row-fluid" >
			
	<div class="span8"  >
		
				<div id="drop_down" style="margin-top:1px;float:right;margin-right:30px;margin-buttom:1px">
	    	 		<?php
	            	$date_array=array();
			            foreach($dates as $date){
			                    $date_array[$date['date_added']]=$date['date_added'];
			                    }
			            echo form_dropdown('date_added', $date_array,'', 'id="date_added"');
					?>
				</div>
			
	     <div id="current_gold" style=" border:1px solid black;height: 500px;margin:40px 30px 20px 20px;"></div>
	
	</div>   
	    
	<div class="span4" style=" border:1px solid black;margin:40px 20px 20px 0px;float:right"> 
	    	<a class="twitter-timeline" href="https://twitter.com/search?q=%23goldprice" data-widget-id="362438888259719169">Tweets about "#goldprice"</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>	
  </div>
<hr>
</div>


