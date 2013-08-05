<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Forex'N'Gold</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--<link rel="stylesheet" href="http://localhost/forex_ci/assets/css/style.css">-->
		<link rel="stylesheet" href="http://localhost/forex_ci/assets/css/bootstrap.css">
		<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
		<script type="text/javascript" src="http://localhost/forex_ci/assets/js/highcharts/jquery-1.7.1.min.js"></script>
		<!--<script type="text/javascript" src="http://localhost/forex_ci/assets/js/jquery-ui.min.js"/>-->
		
		<style type="text/css" style="display: none !important;">
			object[classid$=":D27CDB6E-AE6D-11cf-96B8-444553540000"],object[classid$=":d27cdb6e-ae6d-11cf-96b8-444553540000"],object[codebase*="swflash.cab"],object[data*=".swf"],embed[type="application/x-shockwave-flash"],embed[src*=".swf"],object[type="application/x-shockwave-flash"],object[src*=".swf"],object[codetype="application/x-shockwave-flash"],iframe[type="application/x-shockwave-flash"],object[classid$=":166B1BCA-3F9C-11CF-8075-444553540000"],object[codebase*="sw.cab"],object[data*=".dcr"],embed[type="application/x-director"],embed[src*=".dcr"],object[type="application/x-director"],object[src*=".dcr"],object[classid$=":15B782AF-55D8-11D1-B477-006097098764"],object[codebase*="awswaxf.cab"],object[data*=".aam"],embed[type="application/x-authorware-map"],embed[src*=".aam"],object[type="application/x-authorware-map"],object[src*=".aam"],object[classid*="32C73088-76AE-40F7-AC40-81F62CB2C1DA"],object[type="application/ag-plugin"],object[type="application/x-silverlight"],object[type="application/x-silverlight-2"],object[source*=".xaml"],object[sourceelement*="xaml"],embed[type="application/ag-plugin"],embed[source*=".xaml"]{display: none !important;}</style>
		<link rel="stylesheet" href="http://localhost/forex_ci/assets/css/leaflet.css">
		
		<style type="text/css">
			* {
				margin: 0;
				padding: 0;
			}
			button{
				min-width:200px;
			}

			.scrollup{
				width:40px;
				height:40px;
				opacity:0.3;
				position:fixed;
				bottom:50px;
				right:100px;
				display:none;
				text-indent:-9999px;
				/*background: url('img/icon_top.png') no-repeat;*/
			}
			#forex #gold #api #cont #down{
				padding-left: 30px;
			}
			#mainnavbar{
				padding-left:98px;
			}

			.container{
				width:1024px;

			}

			.hero-unit{
				margin:0px;
				padding:0px;
				margin-top: 0px;
				height:500px;
			}

			.row-fluid{
				background-color: #F8F8F8;
			}
			.para{
				font-family:verdana;
				padding:20px;
				margin:0px 10px 10px 0px; max-height:400px;
				text-align:justify; text-indent:20px;
				color:black;
				font-size: 1.2em;

			}  

			.navbar{
				margin-bottom: 0px;

			}
			.id{
				margin-bottom: 0px;

			}
			.dvg{
				min-height: 300px; border:1px solid black; float:right;margin:20px 20px 20px 0px;
			}
			.unit_comp{
				min-height: 400px; 
				border:1px solid black;
				float:left;
				margin:10px;
			}
			#map {
				width: 1024px;
				height: 500px
					/*padding:0;*/

			}

			.info {
				padding: 6px 8px;
				font: 14px/16px Arial, Helvetica, sans-serif;
				background: white;
				background: rgba(255,255,255,0.8);
				box-shadow: 0 0 15px rgba(0,0,0,0.2);
				border-radius: 5px;
			}
			.info h4 {
				margin: 0 0 5px;
				color: #777;
			}

			.legend {
				text-align: right;
				line-height: 18px;
				color: #555;
			}
			.legend i {
				width: 18px;
				height: 18px;
				float: right;
				margin-right: 8px;
				opacity: 0.7;
			}
		</style>
	
	</head>
	<body style="background-color:">



		<header>
			<div class="row-fluid">
				<div class="span12" style="width:100%">
					<img id="header" src="http://localhost/forex_ci/assets/img/bannerImg.jpg" alt="image not shown;header 123.jpg"/>

					<div class="navbar " >
						<div class="navbar-inner">
							<ul class="nav"  >
								<li  id="mainnavbar"class="<?= ($this->uri->segment(2) === 'index') ? 'active' : '' ?>"><a href="<?= base_url() ?>charts/index">Home</a></li>
								<li  id="forex" class="<?= ($this->uri->segment(1) === 'forex') ? 'active' : '' ?>"><a href="<?= base_url() ?>forex">Forex</a></li>
								<li  id="gold" class="<?= ($this->uri->segment(1) === 'gold') ? 'active' : '' ?>"><a href="<?= base_url() ?>gold">Gold</a></li>
								<li  id="api" class="<?= ($this->uri->segment(1) === 'api') ? 'active' : '' ?>"><a href="<?= base_url() ?>api">API</a></li>
								<li  id="down" class="<?= ($this->uri->segment(1) === 'downloads') ? 'active' : '' ?>"><a href="<?= base_url() ?>downloads">Download</a></li>
								<li  id="cont" class="<?= ($this->uri->segment(1) === 'aboutus') ? 'active' : '' ?>"><a href="<?= base_url() ?>aboutus">About Us</a></li>
							</ul>


						</div>

					</div> 



					</header>
