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
									'forex' => 'Forex',
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
		</div>
	</left>
</div>
