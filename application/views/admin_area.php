<div class="container" style="margin-top: 3px">
	<div class="row-fluid" >	
		<div style="padding:20px">
			<div id ="admin_body">
				<h1>Welcome to Admin Panel!!! <?php echo $this->session->userdata('username') ?>!!! </h1>

				<a href="site/log_out/"> Logout</a>
				<a href="scrape_engine_forex">Scrape Forex</a>
				<a href="scrape_engine/scrapeData">Scrape Gold</a>

				<h2>Gold History Data: </h2>

				<table border="1" width="100">
					<thead>
						<tr>
							<td>Date</td>
							<td>Hallmark Gold</td>
							<td>Tejabi Gold</td>
							<td>Silver</td>
						</tr>
					</thead>
					<?php if (isset($goldpricenepal)) :foreach ($goldpricenepal as $key => $goldRow) : ?>
							<tbody>
								<tr>
									<td><?php echo $goldRow->date_added ?></td>
									<td><?php echo $goldRow->hallmark_amt ?></td>
									<td><?php echo $goldRow->tejabi_amt ?></td>
									<td><?php echo $goldRow->silver_amt ?></td>
									<td><?php echo anchor("site/deleteGold/$goldRow->date_added", 'Delete'); ?></td>
									<td><?php echo anchor("site/updateGold/$goldRow->date_added", 'Update'); ?></td>

								<?php endforeach; ?>	
							</tr>
						</tbody>
					</table>
				<?php else : ?>

					<h2>No records!!!</h2>

				<?php endif; ?>

				<p><?php echo $links; ?></p>
				<p>Page rendered in <strong>{elapsed_time}</strong>seconds.</p>
				<h2>Forex History Data: </h2>
				<table border="1" width="100">
					<thead>
						<tr>
							<td>Date</td>
							<td>IC Buy</td>
							<td>IC Sell</td>
							<td>US Dollar Buy</td>
							<td>US Dollar Sell</td>
							<td>Euro Buy</td>
							<td>Euro Sell</td>
							<td>Pound Buy</td>
							<td>Pound Sell</td>
							<td>Swiss Franc Buy</td>
							<td>Swiss Franc Sell</td>
							<td>Australian Dollar Buy</td>
							<td>Australian Dollar Sell</td>
							<td>Canadian Dollar Buy</td>
							<td>Canadian Dollar Sell</td>
							<td>Singapour Dollar Buy</td>
							<td>Singapour Dollar Sell</td>
							<td>Yen Buy</td>
							<td>Yen Sell</td>
							<td>Yuan Buy</td>
							<td>Yuan Sell</td>
							<td>Swedish kr Buy</td>
							<td>Danish Kr Buy</td>
							<td>HK Dollar Buy</td>
							<td>SA Riyal Buy</td>
							<td>SA Riyal Sell</td>
							<td>Qat Riyal Buy</td>
							<td>Qat Riyal Sell</td>
							<td>Baht Buy</td>
							<td>Baht Sell</td>
							<td>Dirham Buy</td>
							<td>Dirham Sell</td>
							<td>Ringgit Buy</td>
							<td>Ringgit Sell</td>
							<td>Won Buy</td>
							<td>Won Sell</td>
						</tr>
					</thead>
					<?php //if (isset($records)) :foreach ($records as $key => $row) : ?>
					<?php if (isset($results)) :foreach ($results as $key => $row) : ?>
							<h5>
								<tbody>
									<tr>
										<td><?php echo $row->date_added; ?></td>
										<td><?php echo $row->ic_buy; ?></td>
										<td><?php echo $row->ic_sell; ?></td>
										<td><?php echo $row->usDollar_buy; ?></td>
										<td><?php echo $row->usDollar_sell; ?></td>
										<td><?php echo $row->euro_buy; ?></td>
										<td><?php echo $row->euro_sell; ?></td>
										<td><?php echo $row->stPound_buy; ?></td>
										<td><?php echo $row->stPound_sell; ?></td>
										<td><?php echo $row->swissFranc_buy; ?></td>
										<td><?php echo $row->swissFranc_sell; ?></td>
										<td><?php echo $row->ausDollar_buy; ?></td>
										<td><?php echo $row->ausDollar_sell; ?></td>
										<td><?php echo $row->canDollar_buy; ?></td>
										<td><?php echo $row->canDollar_sell; ?></td>
										<td><?php echo $row->singDollar_buy; ?></td>
										<td><?php echo $row->singDollar_sell; ?></td>
										<td><?php echo $row->yen_buy; ?></td>
										<td><?php echo $row->yen_sell; ?></td>
										<td><?php echo $row->yuan_buy; ?></td>
										<td><?php echo $row->yuan_sell; ?></td>
										<td><?php echo $row->swedishKr_buy; ?></td>
										<td><?php echo $row->danishKr_buy; ?></td>
										<td><?php echo $row->hkDollar_buy; ?></td>
										<td><?php echo $row->saRiyal_buy; ?></td>
										<td><?php echo $row->saRiyal_sell; ?></td>
										<td><?php echo $row->qatRiyal_buy; ?></td>
										<td><?php echo $row->qatRiyal_sell; ?></td>
										<td><?php echo $row->baht_buy; ?></td>
										<td><?php echo $row->baht_sell; ?></td>
										<td><?php echo $row->dirham_buy; ?></td>
										<td><?php echo $row->dirham_sell; ?></td>
										<td><?php echo $row->ringgit_buy; ?></td>
										<td><?php echo $row->ringgit_sell; ?></td>
										<td><?php echo $row->won_buy; ?></td>
										<td><?php echo $row->won_sell; ?></td>
										<td><?php echo anchor("site/delete/$row->date_added", 'Delete'); ?></td>
										<td><?php echo anchor("site/update/$row->date_added", 'Update'); ?></td>
									</tr>

								</tbody>

							</h5>
						<?php endforeach; ?>
						<p><?php echo $links; ?></p>
						<p>Page rendered in <strong>{elapsed_time}</strong>seconds.</p>
					<?php else : ?>

						<h2>No records!!!</h2>

					<?php endif; ?>
			</div>
		</div>
	</div>
</div>
