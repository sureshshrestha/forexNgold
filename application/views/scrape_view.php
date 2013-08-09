<style>  @import url('<?=base_url()?>assets/css/style_login.css');</style>
<div class="container" style="margin-top: 3px">

	<div class="hero-unit" style="height:600px;padding-top: 20px; padding-left: 20px">
		<div class="row-fluid">
			<div id="scrape">
				<div style="padding:0px; display: inline">
					<div align="left" >
						<a href=<?= base_url()."scrape_engine_forex"?>>Scrape Forex</a>
						<a href=<?= base_url()."scrape_engine/scrapeData"?>>Scrape Gold</a>
						<a href="site/log_out/" id="logout"> Logout</a>
					</div>
				</div>
			</div>
		</div>
	<div class="row-fluid">
        <div>
			<div align="left" style="overflow: hidden; margin: 15px; max-width: 410px; float:right;">
				<iframe scrolling="no" src="http://www.nrb.org.np/fxmexchangerate1.php" style="border: 0px none; margin-left: -250px; height: 820px; margin-top: -200px; width: 700px; float:right;"></iframe>

			</div>
			<div align="right" style="overflow: hidden; margin: 15px; max-width: 540px; float:left;" >
				<iframe scrolling="no" src="http://www.negosida.com.np" style="border: 0px none; margin-left: -500px; height: 150px; margin-top: -45px; width: 1210px; float:left;"></iframe>
			 <div>
			<?php IF (isset($result))echo $result; ?><br>
			<?php IF (isset($result_gold))echo $result_gold; ?><br>
			<?php IF (isset($exist))echo $exist; ?><br>
			<?php IF (isset($existGold))echo $existGold; ?>
		</div>
            </div>
            
		</div>
        </div>
		
	</div>
</div>