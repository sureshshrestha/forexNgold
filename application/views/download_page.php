<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
<style type="text/css">

	.buttonPage,.buttonFinish,.buttonCancel{
		width:110px;
		height:21px;
		display: block;
		text-align: center;
		color: #fff;
		text-decoration: none;
		float: left;
	}
	.buttonPage {
		background:url(assets/img/bottonPage.gif) no-repeat left top;
	}
	.buttonFinish{
		background:url(assets/img/bottonFinish.gif) no-repeat left top;
	}
	.buttonCancel{
		background:url(assets/img/bottonCancel.gif) no-repeat left top;
		float: right !important;
	}
	a.buttonPage:hover, a.buttonFinish:hover, a.buttonCancel:hover{
		color: #ccc;
	}
	.dactive {
		color:#999 !important;
		background-position: bottom !important;
	}
	.td{
		text-align: center;
	}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$('#field').change(function() {
			var selTable = $(this).val();
			$.ajax({
//				url: "downloads/table_call",
				url: "http://localhost/forex_ci/downloads/table_call",
				async: false,
				type: "POST",
				data: "field_type=" + selTable,
				dataType: "html",
				success: function(data) {
					$('#date').html(data);
				}
			});
		});
	});



<!-- contact form ko lagi-->
	$(document).ready(function() {
		$('#contactform').hide();

		$("#contact-us").toggle(function() {
			$('#contactform').slideToggle();
		}, function() {
			$('#contactform').slideToggle();
		});

	});

</script>
<script src="assets/js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="assets/js/jquery.flipCounter.1.2.js" type="text/javascript"></script>

<script type="text/javascript">
	/* <![CDATA[ */
	jQuery(document).ready(function($) {
		$("#counter").flipCounter(
				"startAnimation", // scroll counter from the current number to the specified number
				{
					number: 5, // the number we want to scroll from
					end_number: 1024, // the number we want the counter to scroll to
					easing: jQuery.easing.easeOutCubic, // this easing function to apply to the scroll.
					duration: 5000, // number of ms animation should take to complete
//                onAnimationStarted: myStartFunction, // the function to call when animation starts
//                onAnimationStopped: myStopFunction, // the function to call when animation stops
//                onAnimationPaused: myPauseFunction, // the function to call when animation pauses
//                onAnimationResumed: myResumeFunction // the function to call when animation resumes from pause
				});
	});
	/* ]]> */
</script>
<div class="container">
	<left>
		<div class="row-fluid" style="margin:3px;padding:10px;height:300px">
			<div class="span6" style="background-color: white;">

				<h3><u>Download files as your need:</u></h3>
				<center>
					<?php echo form_open(base_url() . 'downloads/main'); ?>
					<table style="border:0px;padding:10px">
						<tr>
							<td>File type:</td>
							<td><?php
								$format = array(
//							'' => '--',
									'json' => 'JSON',
									'xml' => 'XML',
									'csv' => 'CSV'
								);

								echo form_dropdown('format', $format);
								?>
							</td>

						</tr>
						<tr>
							<td>Choose Field:</td>
							<td><?php
								$tables = array(
									'' => '',
									'final' => 'Forex',
									'goldpricenepal' => 'GoldnSilver'
								);

								echo form_dropdown('table', $tables, '', 'id="field"');
								?></td>
						</tr>

						<tr>
							<td></td>

							<td><div id="date" ></div></td>
						</tr>
						<tr>
							<td></td>
							<td> <?php echo form_submit('submit', 'Download file'); ?></td>

							<?php echo form_close(); ?>
						</tr>
					</table>
				</center>
			</div>
			<div class="span6" >
				<h3><u>Download Instructions:</u></h3>
				<ul>
					<li>Choose the required file format.</li>
					<li>Choose the field type.</li>
					<li>Select the data Range. </li>
					<li>Data range should be valid.</li>
					<li>All fields are required.</li>
				</ul>
			</div>
			<!--			
			<>\\<div id="counter">
							Download Counter: <input type="hidden" name="counter-value" value="0000" >
						</div>-->
		</div>

	</left>



</div>



<!--	<div id="contactform" class="contactform">
		<form action="" method="POST">
			<table>|
				<tr><td>Enter Name:</td><td><input type="text" name="name" /></td> </tr>
				<tr> <td>Email:</td> <td><input type="text" name="email" /></td> </tr>
				<tr> <td> Message:</td> <td><textarea name="message"></textarea></td> </tr>
				<input class="btn btn-primary" type="submit" />
		</form>
	</div>
	<div class="content">
		<p><span class="btn btn-primary" id="contact-us">Contact us</span></p>
	</div>-->

