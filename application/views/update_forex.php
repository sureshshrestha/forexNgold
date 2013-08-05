<div>
	<?php include 'c:/wamp/www/forex_ci/application/views/header.php'; ?>
	<div class="container" style="margin-top: 3px">
		<div class="row-fluid" >	
			<div style="padding:20px">
				<?php echo form_open('site/update_forex_data'); ?>
				<?php $i = 0 ?>
				<?php if (isset($records)) :foreach ($records as $key => $row) : ?>
						<h5>
							<?php echo "{$key}"; ?>
							<?php if (isset($row)): ?>
								<?php echo form_input('newValue' . $i, $row); ?>
							<?php else : ?>
								<?php $row = NULL; ?>
							<?php endif; ?>
						</h5>
						<?php $i++; ?>
					<?php endforeach; ?>	
				<?php else : ?>
					<h2>No records!!!</h2>
				<?php endif; ?>
				<?php echo form_submit('submit', 'Update');
				exit(); ?>
			</div>
		</div>
	</div>
</div>