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
                <br>
                ForexNGold is a common platform for data visualization on the market price of gold and the market<br>
                value of major foreign currencies. <br>
                We have two major data sources from which we update our visualization charts on daily basis.<br><br>
                Data Set 1<br>
                Data Source: 	http://www.nrb.org.np<br>
                Publisher:	Nepal Rastra Bank<br>
                Sectors:		Banking<br>
                Range:	Daily foreign exchange rates of major world currencies dated form January 01, 2000 to present<br><br>
                Data Set 2<br>
                Data Source: 	http://www.negosida.com.np<br>
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
        <div class="span6">
            <p>
                The chart above shows gold's negative relation with the US dollar. As gold is traded primarily in dollars,
                a weaker dollar makes gold cheaper for other nations to purchase and increases their demand for the yellow metal. This increase in foreign demand then drives up the dollar price of gold, giving gold and the dollar their negative relationship. Some other explanations  as per the prepared report form the study of gold price for one year by Fergal O'Connor, LBMA Bursar and Dr Brian Lucey are as follows:
                Trade weighted 
What needs to be highlighted about this finding 
is that gold has a negative relationship to 
the trade-weighted valueof the dollar. This 
measures movements in the bilateral value 
of the dollar versus all its trading partners’ 
currencies, weighted by the percentage of trade 
between the US and each partner, and creates 
an index showing whether the dollar is gaining 
or losing purchasing power on average versus its 
trading partners.
Seeing the negative relationship in these 
terms means that when other currencies are 
on average gaining value against the dollar, so 
is gold. One way to view this relationship is to 
see that gold acts like just another currency. 
When the dollar is losing value against the 
majority of currencies, it is also losing value 
against gold. The correlation would then be just 
that, a correlation and not indicating a causal 
relationship where the value of the dollar affects 
the value of gold.
Gold in other currencies 
If this theory were correct, we could expect to see 
negative correlations between the sterling value 
of gold and the trade-weighted value of sterling, 
and the same for the yen, and Australian and 
Canadian dollars. This is because, on average, 
the value of gold expressed in a currency (e.g. 
the pound) would move with the value of other 
currencies expressed relative to the pound, their 
bilateral exchange rate. This would then give us 
a negative relationship between gold expressed 
in terms of pounds and the trade-weighted value 
of the pound.
The chart below shows the one-year rolling 
correlation between the daily return on 
currencies’ trade-weighted values and the 
daily return on gold in that currency. The data 
runs from January 1975 to February 2012 and 
comes from the Bank of England, with some 
calculations by the author.
For most of the time, the correlation between 
the returns on gold expressed in a currency 
and the returns on the trade-weighted value 
of that currency is negative, over 90% of the 
time for each currency. The occasional positive 
correlation between gold and a currency over 
such a long period can simply be put down to 
the law of averages. Gold and any currency are 
bound to move together sometimes. 
And this finding is not specific to one-year 
correlations. If we instead look at 30-day 
correlations, between 80% and 90% are 
negative. And over the whole period, all the 
correlations were negative, with the US dollar 
being about average with a long-run correlation 
of -30%. The Australian dollar had the strongest 
long-run correlation at -40% and the Canadian 
dollar the weakest at 20%. So the returns on 
gold in a currency have a negative relationship 
with the currency’s trade-weighted returns over 
short, medium and long horizons.
The significance of the negative relationship 
between gold and the value of the dollar then 
seems to be another pointer towards gold’s role 
as an internationally traded currency, rather 
than a way of explaining movements in the value 
of gold expressed in dollars.
                <br>
                The currency is the legal tender of a nation. It is issued by a nation’s central bank i.e. Nepal Rastra Bank in Nepal. The national currency is usually the predominant currency used for the financial transactions in the country. So the status of national currency is very important in international world trade. Currencies like U.S. dollar and Euro have achieved global status as reserve currencies and are extensively used in international trade transactions.
            </p>
        </div>
        <div class="span6">
            <p>	
                We target to study the economical stability of Nepali currency and its stability in comparison to other foreign currencies. Development of a nation is reflected by the value of the currency. Stability of economic sector is also an important factor that significantly illustrated by the strength of national currency. More over we also analyze the negative relation of gold price to U.S. dollar which creates a direct impact on Nepali banking and business markets.
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
