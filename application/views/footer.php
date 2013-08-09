<div id="footer">
   <center>
         <p id="footer_p">Courtesy of Team Young,2013</p></center>
</body>
<script>
	jQuery(document).ready(function(e) {
		$('#navbar a').click(function(e) {
			var $this = $(this);
			var top = $($this.attr('href')).offset().top - 10;

			$('html, body').stop().animate({
				scrollTop: top
			}, 'slow');

			e.preventDefault();
		});
	});
</script>

<script type="text/javascript" src="<?= base_url() ?>assets/js/predictadme.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/highcharts/highstock.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/js/highcharts/exporting.js"></script>
</html>