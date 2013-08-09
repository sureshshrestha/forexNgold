<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/sidebar2.css" />

<style>
	#navbar{
		position: absolute;
		padding: 15px;
		border-right: 1px solid black;
		height: auto;
	}
	#navbar.fixed {
		position: fixed;
		top: 0px;
		z-index: 10000;
	}

	#navbar a
	{

		list-style:none;
		font-size: 10px;
		font-family:verdana;
		text-decoration:none;
		color:black;

	}

	#navbar > a:active
	{

		border-bottom:1px #333 solid;
	}
	#navbar > a:active

	{
		background-color: #BDBDBD;
		border-bottom:1px #333 solid;
	}

	#navbar a:hover 
	{
		color:#BDBDBD;

		background-color: grey;
	} 
	#API_main{
		float:left;width:780px; position: relative; margin-left:250px;
	}

	table td,tr,th{
		padding:2px;
		border:1px solid black;


	}
	table th{
		background-color: #A8A8A8;
	}
	table{
		margin-bottom: 10px;
	}

</style>

<div class="container">
	<div class="row-fluid"  > 
		<div id="navbar">

			<a href="#API_p"><h5>API Documentation</h5></a>
			<a href="#notes"><h5>Notes Before Use</h5></a>
			<a href="#params"><h5>Parameters Used</h5></a>
			<a href="#ways"><h5>Ways To Use API</h5></a>
			<a href="#response"><h5>Response Types</h5></a>
			<a href="#success"><h5>Success Response</h5></a>
			<a href="#error"><h5>Error Responses</h5></a>
			<button ><a href="<?= base_url() ?>downloads/download_API_doc"><h5>Download Documentation</h5></a></button>
		</div>


		<div id="API_main" >
			<div id="API_p">
				 <h4>API Documentation</h4>
        <p>This API uses RESTFUL API as a base. The functionality are mostly provided within it. Since this API gives API developer and the client application the choice of data formats to use, it is opened up to a
          much wider audience and can be used with more programming languages and systems. The formats
          supported with our API are:
          <ul>
            <li>json – useful for JavaScript and increasingly PHP apps.</li>
            <li>xml – almost any programming language can read XML</li>
            <li>php – Representation of PHP code </li>
          </ul>
          
    <img src='<?=base_url()?>assets/img/format.png' style="padding:10px 0px"alt="">
   <br><t> To use our API , the users should have an API key.For this they should visit our website and ask for one key.The
          The key will be send to user’s email id.</p>
				<HR>			
			</div>

			<div id="notes">
				<h4>Notes Before Use</h4>

				<ol>
					<li> User can get single key for with single email id registered.API key will be send to user's email id!</li>
					<li> User can used a particular key for limited numbers i.e. '20' in our case.</li>
					<li>The date should be entered as YYYY-MM-DD. Other format are not taken.</li>
					<li>The API default format is json.</li>
					<li>The API format can be generated in other formats as xml,csv, php & html. For getting other formats: add “&format=’desired format’.</li>
				</ol>
				<HR>
			</div>
			<div id="params">
				<h4>Parameters Used</h4>
				<table >
					<tr>
						<th>Parameters</th>
						<th>Function:</th>
					</tr>
					<tr>
						<td>forex</td>
						<td>For getting API related to foreign exchange data</td>
					</tr>
					<tr>
						<td>metal</td>
						<td>For getting API related to gold and silver</td>
					</tr>
					<tr>
						<td>date</td>
						<td>For getting particular date.</td>
					</tr>
					<tr>
						<td>start_date, end_date</td>
						<td>For getting date range</td>
					</tr>
					<tr>
						<td>key</td>
						<td>For authentication</td>
					</tr>
					<tr>
						<td>format</td>
						<td>For changing API format(xml, json, csv, html)</td>
					</tr>
				</table>
				<HR>
			</div>
			<div id="ways">
				<h4>Ways to use our API</h4>
				<ol>
					<u><li>For particular date:</u></li>
					<p>forex_ci/APIs/forex?key=***********&date= YYYY-MM-DD<br>Or<br>
						forex_ci/ APIs/metal?key=***********&date= YYYY-MM-DD</p>

					<u><li>For particular date range:</u></li>
					<p>forex_ci/APIs/forex?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD<br>Or<br>
						forex_ci/APIs/metal?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD</p>

					<u><li>For getting in other formats:</u></li>
					<p>forex_ci/APIs/forex?key=***********&date= YYYY-MM-DD&format=***<br>Or<br>
						forex_ci/ APIs/metal?key=***********&date= YYYY-MM-DD&format=***<br>&<br>
						forex_ci/APIs/forex?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD format=***<br>Or<br>
						forex_ci/APIs/metal?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD format=***</p>

				</ol>
				<HR>
			</div>
			<div id="response">
				<h4>Response Types</h4>
				<table >
					<tr>
						<th>HTTP response codes</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>202</td>
						<td>For successful request</td>
					</tr>
					<tr>
						<td>400</td>
						<td>Bad request</td>
					</tr>
					<tr>
						<td>403</td>
						<td>Forbidden</td>
					</tr>
					<tr>
						<td>404</td>
						<td>Resource dosen't exist</td>
					</tr>
					<tr>
						<td>405</td>
						<td>Not allowed</td>
					</tr>
				</table>
				<HR>
			</div>
			<div id="success">
				<h4>Success Response</h4>
				<table >
					<tr>
						<th>Type</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>If request is correct.</td>
						<td>{"status":"true","message":"valid","result":[{...}]}</td>
					</tr>
				</table>
				<hr>
			</div>
			<div id="error">
				<h4>Error Responses</h4>
				<table >
					<tr>
						<th>Error type</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>If the key is not valid</td>
						<td>{"status":false,"error":"Invalid API Key."}</td>
					</tr>
					<tr>
						<td>If no. of key usage exceeds</td>
						<td>{"status":"false","message":"invalid","error":"You have reached limit to use  API"}</td>
					</tr>
					<tr>
						<td>If date range is not valid</td>
						<td>{"status":"false","message":"invalid","error":"Date Range Not Allowed"}</td>
					</tr>
					<tr>
						<td>If date parameter is missing</td>
						<td>{"status":"false","message":"invalid","error":"Date parameters missing"}</td>
					</tr>
					<tr>
						<td>If date is not available</td>
						<td>{"status":"false","message":"invalid","error":"Date doesnot exist"}</td>
					</tr>
					<tr>
						<td>If start date or end date is not available</td>
						<td style="padding-left:0px"> {"status":"false","message":"invalid","error":"Start date or end date doesn't exist"}</td>
					</tr>

				</table>
			</div>
		</div>
	</div>
	
</div>


<ul id="demo_menu22">
    <form action="contacts/user_register" method="post" id="form">
		<label>Your name:</label>
		<div ><input type="text" id="name" name="username" placeholder="Enter your name" required /></div>

		<label >Email:</label>
		<div ><input type="email" id="email" name="email" placeholder="Enter your email id" required /><div>
				<input type="submit" value="submit" id="submit"/>
				</form>

				<img src="<?= base_url() ?>assets/img/ajax-loader.gif" style="display: none;" id="loading_image">
				</ul>

				<script type="text/javascript">
					$('#form').on('submit', function(event) {

						$('#loading_image').show();
						$('#submit').attr('disabled', true);
						//event.preventDefault();
						var that = $(this),
								url = that.attr('action'),
								type = that.attr('method'),
								data = {};

						that.find('[name]').each(function(index, value) {
							// console.log(value);
							var that = $(this),
									name = that.attr('name'),
									value = that.val();

							data[name] = value;
						});

						$.ajax({
							url: url,
							type: type,
							data: data,
							success: function(data) {
								$('#loading_image').hide();
								$('#form').html("<div id='message'></div>");
								$('#message').html(data)
										.hide()
										.fadeIn(1500, function() {
								});

							}
						});

						return false;
					});
				</script>

				<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.sidebar.js"></script>
      <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-ui.min.js"></script>
				<script type="text/javascript">
					$("ul#demo_menu1").sidebar();
					$("ul#demo_menu22").sidebar({
						position: "right",
						callback: {
							item: {
								enter: function() {
									$(this).find("a").animate({color: "red"}, 250);
								},
								leave: function() {
									$(this).find("a").animate({color: "white"}, 250);
								}
							}
						}
					});
					$("ul#demo_menu3").sidebar({
						position: "top",
						open: "click"
					});
					$("ul#demo_menu4").sidebar({
						position: "bottom"
					});
				</script>

				<script type="text/javascript">
					jQuery(function($) {
						var $el = $('#navbar'),
								top = $el.offset().top;

						$(window).scroll(function() {
							var pos = $(window).scrollTop();

							if (pos > top && !$el.hasClass('fixed')) {
								$el.addClass('fixed');
							} else if (pos < top && $el.hasClass('fixed')) {
								$el.removeClass('fixed');
							}

						});

					});
				</script>