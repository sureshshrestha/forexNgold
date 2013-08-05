<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<link rel="stylesheet" type="text/css" href="assets/css/sidebar2.css" />
<!-- <link rel="stylesheet" type="text/css" href="assets/css/sidebar2.css" /> -->
<style>#navbar{
		position: absolute;
		padding: 15px;
		border-right: 1px solid black;
		height: auto;

		/*top:10px;*/
		/*height:25px;*//*
		 border: 1px solid black;
		 background: grey;*/
	}
	#navbar.fixed {
		position: fixed;
		top: 0px;
		z-index: 10000;
	}

	#navbar a:hover 
	{
		color:#BDBDBD;
		/*font-size: 11px;*/
		/*position: relative;*/
		background-color: grey;
	} 

	#navbar a
	{


		/*margin-right: 20px;*/
		display: inline;
		/*padding:5px;*/
		/*float: left;*/
		list-style:none;
		font-size: 10px;
		font-family:verdana;
		text-decoration:none;
		color:black;

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

<div class="container" style="margin-top: 3px">
	<div class="row-fluid"  >	
		<div id="navbar">

			<a href="#api"><h6>Api Documentation</h6></a>
			<a href="#notes"><h6>Notes Before Use</h6></a>
			<a href="#params"><h6>Parameters Used</h6></a>
			<a href="#ways"><h6>Ways To Use Api</h6></a>
			<a href="#response"><h6>Response Types</h6></a>
			<a href="#success"><h6>Success Response</h6></a>
			<a href="#error"><h6>Error Responses</h6></a>
			<button href="<?= base_url() ?>downloads/download_api_doc"><h6>Download Documentation</h6></button>
		</div>


		<div style="float:left;width:780px; position: relative; margin-left:250px" >
			<div id="api">
				<h3>Api Documentation</h3>
				<p>This api uses RESTFUL API as a base. The functionality are mostly provided within it. To use our api , the users should have an api key.
					For this they should visit our website and ask for one key.
					The key will be send to user’s email id.</p>
			</div>

			<div id="notes">
				<h3>Notes Before Use</h3>

				<ol>
					<li> User can get single key for with email id registered.</li>
					<li> User can used a particular key for limited numbers.(15, 20,..)</li>
					<li>The date should be entered as YYYY-MM-DD. Other format are not taken.</li>
					<li>The api default format is json.</li>
					<li>The api format can be generated in other formats as xml,csv, php & html. For getting other formats: add “&format=’desired format’.</li>
				</ol>
			</div>
			<div id="params">
				<h3>Parameters Used</h3>
				<table >
					<tr>
						<th>Parameters</th>
						<th>Function:</th>
					</tr>
					<tr>
						<td>forex</td>
						<td>For getting api related to foreign exchange data</td>
					</tr>
					<tr>
						<td>metal</td>
						<td>For getting api related to gold and silver</td>
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
						<td>For changing api format(xml, json, csv, html)</td>
					</tr>
				</table>
			</div>
			<div id="ways">
				<h3>Ways to use our api</h3>
				<ol>
					<u><li>For particular date:</u></li>
					<p>forex_ci/apis/forex?key=***********&date= YYYY-MM-DD<br>Or<br>
						forex_ci/ apis/metal?key=***********&date= YYYY-MM-DD</p>

					<u><li>For particular date range:</u></li>
					<p>forex_ci/apis/forex?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD<br>Or<br>
						forex_ci/apis/metal?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD</p>

					<u><li>For getting in other formats:</u></li>
					<p>forex_ci/apis/forex?key=***********&date= YYYY-MM-DD&format=***<br>Or<br>
						forex_ci/ apis/metal?key=***********&date= YYYY-MM-DD&format=***<br>&<br>
						forex_ci/apis/forex?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD format=***<br>Or<br>
						forex_ci/apis/metal?key=***********&start_date=YYYY-MM-DD&end_date= YYYY-MM-DD format=***</p>

				</ol>
			</div>
			<div id="response">
				<h3>Response Types</h3>
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
			</div>
			<div id="success">
				<h3>Success Response</h3>
				<table >
					<tr>
						<th>Type</th>
						<th>Description</th>
					</tr>
					<tr>
						<td>If request is correct.</td>
						<td>Description{"status":"true","message":"valid","result":[{}]}</td>
					</tr>
				</table>
			</div>
			<div id="error">
				<h3>Error Responses</h3>
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
						<td>{"status":"false","message":"invalid","error":"You have reached limit to use  api"}</td>
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



	<ul id="demo_menu22">
		<form action="contacts/user_register" method="post" id="form">
			<label>Your name:</label>
			<div ><input type="text" id="name" name="username" placeholder="Enter your name" required /></div>

			<label >Email:</label>
			<div ><input type="email" id="email" name="email" placeholder="Enter your email id" required /><div>
			<input type="submit" value="submit" id="submit"/>
		</form>
	</ul>

	<div class="container" style="margin-top: 3px">
		<div class="row-fluid" >	

			<!-- <ul id="demo_menu2" > -->

			<div id="response" style="display:inline-block" style="width:auto"></div>
			<!-- </ul>  -->
			<script type="text/javascript">
				$('#form').on('submit', function(event) {

					event.preventDefault();
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
						success: function() {
							$('#form').html("<div id='message'></div>");
							$('#message').html("<h2>Contact Form Submitted!</h2>")
									.append("<p>We will send you email soon.</p>")
									.hide()
									.fadeIn(1500, function() {

							});
						}
					});

					return false;
				});


			</script>

			<script type="text/javascript" src="assets/js/jquery.sidebar.js"></script>
			<script type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
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