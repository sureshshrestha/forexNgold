<div class="container" >

    <div class="row-fluid">
        <center>
            <h1 style="font-family:roboto">Visualization of Foreign Exchange and Gold Data</h1>
        </center>
    </div>



    <div class="row-fluid">

        <div class="span6" >	
            <div class="thumbnail">
                <img src="<?= base_url() ?>assets/img/gold.jpg" /> 
            </div>	 
        </div>	
        <div  class="span6" style="" >
            <p style="padding:10px;	height:260px; text-align:justify; text-indent:20px; color:black;font-size: small; vertical-align: middle;">
                
                ForexNGold is a common platform for data visualization on the market price of gold and the market
                value of major foreign currencies. <br>
                We have two major data sources from which we update our visualization charts on daily basis.<br><br>
                <strong>Data Set 1</strong><br>
                Data Source: 	<a href="http://www.nrb.org.np">www.nrb.org.np</a><br>
                Publisher:	Nepal Rastra Bank<br>
                Sectors:		Banking<br>
                Range:	Daily foreign exchange rates of major world currencies dated form January 01, 2000 to present<br><br>
                <strong>Data Set 2</strong><br>
                Data Source: 	<a href="http://www.negosida.com.np">www.negosida.com.np</a><br>
                Publisher:	Nepal Gold & Silver Dealer’s Association<br>
                Sectors:		Commerce<br>
                Range:		Daily gold and silver price rates from Jestha 18, 2067 to present<br>

            </p>
        </div> 
    </div>


    <div class="row-fluid">
        <div class="span12">
            <div class="thumbnail"   id="us_gold_stock" ></div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6" style="text-align: justify">
            <p>
<!--                The chart above shows gold's negative relation with the US dollar. As gold is traded primarily in dollars,
                a weaker dollar makes gold cheaper for other nations to purchase and increases their demand for the yellow metal. This increase in foreign demand then drives up the dollar price of gold, giving gold and the dollar their negative relationship. Some other explanations  as per the prepared report form the study of gold price for one year by Fergal O'Connor, LBMA Bursar and Dr Brian Lucey are as follows:
                <b>Trade weighted </b>
What needs to be highlighted about this finding   is that gold has a negative relationship to 
the trade-weighted valueof the dollar.-->

                <br>
              </p>
        </div>
        <div class="span6">
            <p>	
<!--             This 
measures movements in the bilateral value 
of the dollar versus all its trading partners’ 
currencies, weighted by the percentage of trade 
between the US and each partner, and creates 
an index showing whether the dollar is gaining 
or losing purchasing power on average versus its 
trading partners.
                The significance of the negative relationship 
between gold and the value of the dollar then 
seems to be another pointer towards gold’s role 
as an internationally traded currency, rather 
than a way of explaining movements in the value 
of gold expressed in dollars-->
            </p>
        </div>
    </div>

    <!--<div class="hero-unit" >

        <div id="map"></div>
    </div>-->

</div>	

<!--<script type="text/javascript" src='<?= base_url() ?>lib/forex_today.js'></script>-->
<script type="text/javascript" src='<?= base_url() ?>assets/js/us_vs_gold.js'></script>
<!--<script type="text/javascript" src='<?= base_url() ?>assets/js/unit_forex_compare.js'></script>-->
<script type="text/javascript" src='<?= base_url() ?>assets/js/countries.js'></script>
<!--<script type="text/javascript" src="http://localhost/forex_ci/assets/js/leaflet.js"></script>-->
<script type='text/javascript' src ='<?= base_url() ?>assets/js/mapbox.js'></script>
<script type='text/javascript' src ='<?= base_url() ?>assets/js/predictadme.js'></script>
<script type="text/javascript" src='<?= base_url() ?>assets/js/worldmap.js'></script>
