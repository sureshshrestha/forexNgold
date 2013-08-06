
<a href="#" class="scrollup" style="display: inline;">Scroll</a>
<footer  style="background-color:#C0C0C0">
        <p align="center" >Courtesy Team Young, 2013</p>
   </footer>
</body>
 <script>
jQuery(document).ready(function(e){
    $('#navbar a').click(function (e) {
        var $this = $(this);
        var top = $($this.attr('href')).offset().top - 10;
        
        $('html, body').stop().animate({
            scrollTop: top
        }, 'slow');
        
        e.preventDefault();
    });
});
</script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/current_forex.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/current_gold.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/history_gold.js"></script>      
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/history_forex.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/us_vs_gold.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/select_gold_date.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/select_forex_date.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/unit_forex_compare.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/countries.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/leaflet.js"></script>
    <script type="text/javascript" src="http://localhost/forex_ci/assets/js/worldmap.js"></script>
	<!--<script type="text/javascript" src="http://localhost/forex_ci/assets/js/predictadme.js"></script>-->
	<script type="text/javascript" src="http://localhost/forex_ci/assets/js/highcharts/highstock.js"></script>
  <script type="text/javascript" src="http://localhost/forex_ci/assets/js/highcharts/exporting.js"></script>
  <!--<script type="text/javascript" src="http://localhost/forex_ci/assets/js/highcharts/highcharts.js"></script>-->
</html>