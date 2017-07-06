<!DOCTYPE html>
<html lang="en">
<head>
<title>Tugas 2 | L200140011</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Memanggil pustaka Google Map -->
	<SCRIPT src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXAJO4mUDJ_yfJKtISReCE79mjkYkmJAQ"></SCRIPT>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Memanggil pustaka Google Map -->
	<script type="Text/Javascript" src="geolocation.js"></script>
 
	<!-- CSS Untuk mengatur ukuran Peta -->
	<style type="text/css">
		body{
			font-family: Comic Sans MS;
		}
		#mapDiv { 
			width: 785px; 
			height: 350px;
		}
	</style>
 
	
	<link rel="stylesheet" type="text/css" href="css.css">

<style type="text/css">
	body{
		margin-top:100px;
		font-family: Calibri;
	}
	.well{
			text-align: center;
			font-size: 25px;
		}
	.glyphicon { margin-right:10px; }
	.panel-body { padding:0px; }
	.panel-body table tr td { padding-left: 15px }
	.panel-body .table {margin-bottom: 0px; }
	a:link {text-decoration: none}
	a:visited {text-decoration: none}
	a:active {text-decoration: none}
	h1{font-family: Calibri;}
	 #pages {
	   padding:8px 16px;
	   border:1px solid #ccc;
	   color:#408c99;
	   font-weight:bold;
	  }
</style>
	


<style>
	body{margin-top:100px;}
	.glyphicon { margin-right:10px; }
	.panel-body { padding:0px; }
	.panel-body table tr td { padding-left: 15px }
	.panel-body .table {margin-bottom: 0px; }
	a:link {text-decoration: none}
	a:visited {text-decoration: none}
	a:active {text-decoration: none}
	h1{font-family: Calibri;}
	 #pages {
	   padding:8px 16px;
	   border:1px solid #ccc;
	   color:#408c99;
	   font-weight:bold;
	  }
	  
.myButton {
	-moz-box-shadow: 0px 10px 14px -7px #276873;
	-webkit-box-shadow: 0px 10px 14px -7px #276873;
	box-shadow: 0px 10px 14px -7px #276873;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #599bb3), color-stop(1, #408c99));
	background:-moz-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-webkit-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-o-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:-ms-linear-gradient(top, #599bb3 5%, #408c99 100%);
	background:linear-gradient(to bottom, #599bb3 5%, #408c99 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#599bb3', endColorstr='#408c99',GradientType=0);
	background-color:#599bb3;
	-moz-border-radius:8px;
	-webkit-border-radius:8px;
	border-radius:8px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:bold;
	padding:13px 32px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #408c99), color-stop(1, #599bb3));
	background:-moz-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-webkit-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-o-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:-ms-linear-gradient(top, #408c99 5%, #599bb3 100%);
	background:linear-gradient(to bottom, #408c99 5%, #599bb3 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#408c99', endColorstr='#599bb3',GradientType=0);
	background-color:#408c99;
}
.myButton:active {
	position:relative;
	top:1px;
}


</style>
<!-- membuat script untuk menampilkan peta -->
	<SCRIPT>
	//variabel GLOBAL
	var  map; //langsung di eksekusi oleh browser  
	function initMap() {
		//dieksekusi jika nama fungsi di panggil
		// mengatur opsi map 
		var mapOptions = {
		//lokasi awal yang akan di tampilkan di tengah layar
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
	// variabel utk mengontrol elemen div
	var mapElement = document.getElementById('mapDiv');
	// proses membuat peta dan meletakannya pada elemen div
	map = new google.maps.Map(mapElement, mapOptions); 
	}
	// menampilkan peta, pada saat dokumen html di // LOAD dalam screen browser
	// panggil fungsi initMap() pada saat dokumen di load dalam screen
	google.maps.event.addDomListener(window, 'load', initMap); 
	</SCRIPT>
	
	<script>
	if (navigator.geolocation) {
	//minta ijin kepada user, jika diijinkan 
	//navigator.geolocation = True
	 
	//membaca posisi/lokasi client (browser) saat ini
	navigator.geolocation.getCurrentPosition(
		// position adalah data lokasi hasil pembacaan 
		// berupa lokasi dalam json
		function(position) {
			console.log(position);   //menulis di konsole
			var lat = position.coords.latitude
			var lng = position.coords.longitude;
	 
		// devCenter adalah data lokasi dengan format 
		// google.maps
		var devCenter =  new google.maps.LatLng(lat, lng);
		// mengatur lokasi PUSAT peta (map) 
		map.setCenter(devCenter);
		//mengatur Level ZOOM (18)
		map.setZoom(18);
										
		console.log(latitude + " -- " + longitude);
		});
	}
	</script>



	
</head>
<body>
	<div class="row">
		<div class="container">
    	<div class="col-md-14">
		<nav class = "navbar navbar-default navbar-fixed-top" role = "navigation">

		<a href = "#"><center><h3><label>TUGAS 2  GEOLOCATION <br> Naisha Rahma Indraswari | L200140011 | Kelas A</label></h3></center></a>
	</div>
	<br>
	<div class="row">
		<div class="container">
			<div class="col-md-3">
				<div class="panel-group">
				<a href="index.php" class="myButton" width='30'>
								<h4 class="panel-title">
	                            	HOME
	                        	</h4>
							</a><br><br>
	                        <a href="https://github.com/L200140011/Sistem-Informasi-Geografi-2017/" class="myButton">
								<h4 class="panel-title">
	                            	Tugas 1 
	                        	</h4>
							</a><br><br>
							<a href="tugas2.php" class="myButton">
								<h4 class="panel-title">
	                            	Tugas 2 
	                        	</h4>
							</a><br><br><a href="tugas3.php" class="myButton">
								<h4 class="panel-title">
	                            	Tugas 3 
	                        	</h4>
							</a><br><br><a href="tugas4.php" class="myButton">
								<h4 class="panel-title">
	                            	Tugas 4 
	                        	</h4>
							</a><br><br><a href="tugas5.php" class="myButton">
								<h4 class="panel-title">
	                            	Tugas 5 
	                        	</h4>
							</a><br><br><a href="https://github.com/L200140011/Sistem-Informasi-Geografi-2017/" class="myButton">
								<h4 class="panel-title">
	                            	myGithub
	                        	</h4>
							</a>
				</div>				
				</div>				

		<div class="col-md-9">
    		<div class="panel-body page-contents">
    		<div id="tugas2" class="content-p collapse in">
    		<div class="well">
			<a href = "#"><center><h2><label>Geolocation</label></h2></center></a>
				<input id="btnRoad" class='myButton' type="button" value="RoadMap">
    <input id="btnSat" type="button" class='myButton' value="Satellite">
	<input id="btnHyb" type="button" class='myButton' value="Hybrid">
    <input id="btnTer" type="button" class='myButton' value="Terrain"><br><br>
				<script>
document.getElementById('btnRoad').addEventListener('click', function(){
               map.setMapTypeId(google.maps.MapTypeId.ROADMAP); 
});
document.getElementById('btnSat').addEventListener('click', function(){
                      map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
});
document.getElementById('btnHyb').addEventListener('click', function(){
               map.setMapTypeId(google.maps.MapTypeId.HYBRID);
});
document.getElementById('btnTer').addEventListener('click', function(){
                      map.setMapTypeId(google.maps.MapTypeId.TERRAIN);
});
</script>
<!-- lokasi untuk menampilkan peta -->
<div id="mapDiv"></div>
				
				
    		</div>
    		</div>
    </div>
    </div>


			
</body>
</html>