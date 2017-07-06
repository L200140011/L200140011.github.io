<!DOCTYPE html>
<html lang="en">
<head>
<title>Tugas 3 | L200140011</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />


	<SCRIPT src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAXAJO4mUDJ_yfJKtISReCE79mjkYkmJAQ"></SCRIPT>

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


  <link rel="stylesheet" type="text/css" href="css.css">
	

 
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
<style type="text/css">
	body{
		margin-top:100px;
		font-family: Calibri;
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
    <script type="text/javascript">
    var peta_tampil, info_peta;


    function dapatkan_lokasi(nilai_latitude,nilai_longitude){
      nilai_latitude  = parseFloat(nilai_latitude);
      nilai_longitude = parseFloat(nilai_longitude);
      var latlng = new google.maps.LatLng(nilai_latitude, nilai_longitude);
      var geocoder = geocoder = new google.maps.Geocoder();
          geocoder.geocode({ 'latLng': latlng }, function (results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  if (results[0]) {
                      document.getElementById("lokasi").innerHTML  = String(results[0].formatted_address);
                  }
              }
          });
    }
    function tempel_info(nilai_latitude,nilai_longitude){
      
      // Tempel Hasil
      dapatkan_lokasi(nilai_latitude,nilai_longitude);
      document.getElementById("latitude").innerHTML     = nilai_latitude;
      document.getElementById("longitude").innerHTML    = nilai_longitude;
    }
    function load_peta(){
    	
      var tmp_lat = -7.557155997472517;
      var tmp_lng = 110.76918946579099;
      tempel_info(tmp_lat, tmp_lng);
      peta_tampil = new google.maps.Map(document.getElementById('bagian_peta'), {
          zoom: 17,
          center: {lat: tmp_lat, lng: tmp_lng},
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
      info_peta = new google.maps.InfoWindow;

      /* ========== KAMPUS 1 ============= */
      /* Hukum,B.Inggris & Geo */
      var huk_geo = [
            {lat: -7.557187904412667, lng: 110.76871370896697},
            {lat: -7.556924672085923, lng: 110.76875578612089},
            {lat: -7.556890770941271, lng: 110.76856199651957},
            {lat: -7.55696920887976, lng: 110.76854456216097},
            {lat: -7.556935307738607, lng: 110.76832680031657},
            {lat: -7.556969541243871, lng: 110.76832009479403},
            {lat: -7.556956246679038, lng: 110.76823895797133},
            {lat: -7.557263683386083, lng: 110.76818631961942},
            {lat: -7.557271992483233, lng: 110.76823459938169},
            {lat: -7.557398623104049, lng: 110.76821314170957},
            {lat: -7.5574072645623955, lng: 110.7682441547513},
            {lat: -7.557668502413512, lng: 110.76820258051157},
            {lat: -7.557732316215723, lng: 110.76860222965479},
            {lat: -7.557549516236292, lng: 110.7686384394764},
            {lat: -7.557521265323482, lng: 110.76848706230521},
            {lat: -7.557166633119487, lng: 110.76854255050421}
        ];

      var huk_geo_shp = new google.maps.Polygon({
          paths: huk_geo,
          strokeColor: '#E67E22',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#E67E22',
          fillOpacity: 0.35
        });

      huk_geo_shp.setMap(peta_tampil);
      huk_geo_shp.addListener('click', function(e) {
        var info = "<strong>- Fakultas Hukum</strong><br><strong>- Fakultas Geografi</strong><br><strong>- Fakultas Keguruan & Ilmu Pendidikan (FKIP)</strong><ul><li>Bahasa Inggris</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Hukum,B.Inggris & Geo */

      /* PGSD & PAUD */
      var pgd_paud = [
            {lat: -7.557992889143565, lng: 110.76841665431857},
            {lat: -7.5581208490059275, lng: 110.76911905780435},
            {lat: -7.557984247696948, lng: 110.76914420351386},
            {lat: -7.557853961250083, lng: 110.76844280585647}
        ];

      var pgd_paud_shp = new google.maps.Polygon({
          paths: pgd_paud,
          strokeColor: '#5DADE2',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#5DADE2',
          fillOpacity: 0.35
        });

      pgd_paud_shp.setMap(peta_tampil);
      pgd_paud_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Keguruan & Ilmu Pendidikan (FKIP)</strong><br><ul><li>PAUD</li><li>PGSD</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End PGSD & PAUD */

      /* FAI */
      var fai = [
            {lat:-7.558882214940925,lng: 110.76909656077419},{lat:-7.559004524376441,lng:110.76907510310207},{lat:-7.558995218224951,lng:110.76902145892177},
            {lat:-7.559005853826632,lng:110.76901743560825},{lat:-7.558867590984373,lng:110.76826708760564},{lat:-7.5587532582159715,lng:110.76828854527776},
            {lat:-7.5587685469018755,lng:110.76835895330532},{lat:-7.558760570196251,lng:110.76836230606659},{lat:-7.558886203292644,lng:110.76904023438487},
            {lat: -7.5588709146109, lng: 110.76904358714614}
        ];

      var fai_shp = new google.maps.Polygon({
          paths: fai,
          strokeColor: '#2980B9',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#2980B9',
          fillOpacity: 0.35
        });

      fai_shp.setMap(peta_tampil);
      fai_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Agama Islam (FAI)</strong>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End FAI */

      /* FIK */
      var fik = [
            {lat: -7.559035400803427, lng: 110.76883980635102},{lat: -7.559063654665527, lng: 110.76884129965629},
            {lat: -7.559080185076326, lng: 110.76889078406725},{lat: -7.559160064703932, lng: 110.76887189749061},
            {lat: -7.559144415698078, lng: 110.7688183486789},{lat: -7.559257060780287, lng: 110.7687995287879},
            {lat: -7.559134001701825, lng: 110.76815624536721},{lat: -7.559042269655953, lng: 110.7681736797258},
            {lat: -7.5590396107557885, lng: 110.76816160978524},{lat: -7.558977126597057, lng: 110.7681736797258},
            {lat: -7.558977519497847, lng: 110.76817542749245},{lat: -7.558978608699013, lng: 110.76818824623456},
            {lat: -7.5589294104337394, lng: 110.76819667965992},{lat: -7.558932734059796, lng: 110.7682201489888},
            {lat: -7.558919439555406, lng: 110.76822484285458},{lat: -7.558967964494454, lng: 110.76847898214851}, 
            {lat: -7.5589533405408025, lng: 110.76848166435752},{lat: -7.558962111279942, lng: 110.76851940446818},
            {lat: -7.558973204743041, lng: 110.76851566135474}
        ];

      var fik_shp = new google.maps.Polygon({
          paths: fik,
          strokeColor: '#A569BD',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#A569BD',
          fillOpacity: 0.35
        });

      fik_shp.setMap(peta_tampil);
      fik_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Ilmu Kesehatan (FIK)</strong>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End FIK */

      /* Farmasi */
      var farmasi = [
            {lat: -7.557967551977087, lng: 110.76716738195046},{lat: -7.55801275339, lng: 110.76715933532341},
            {lat: -7.5580180712029765, lng: 110.76718079299553},{lat: -7.558085873312619, lng: 110.767174087473},
            {lat:   -7.558083214406563, lng: 110.76715531200989},{lat: -7.558141045609679, lng: 110.76714525372608},
            {lat:   -7.558147028147491, lng: 110.76716201753243},{lat: -7.558145698694654, lng: 110.76716201753243},
            {lat: -7.5582367662047165, lng: 110.76715061814411},{lat: -7.558328265763516, lng:  110.76769718514697},
            {lat:   -7.558062530331256, lng:  110.767732456261},{lat:   -7.558037270721664, lng:  110.76757018269745},
            {lat: -7.557998716577836, lng:  110.76757018269745},{lat: -7.557976115871245, lng:  110.76741059126107},
            {lat: -7.558008079087888, lng:  110.76740931319227}
        ];

      var farmasi_shp = new google.maps.Polygon({
          paths: farmasi,
          strokeColor: '#00FFFF',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#00FFFF',
          fillOpacity: 0.35
        });

      farmasi_shp.setMap(peta_tampil);
      farmasi_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Farmasi</strong>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Farmasi */

      /* Matematika,Akuntasi,B. Indo,PKN, Biologi */
      var rnd = [
            {lat:-7.557816736543748,lng:110.76816368848085},{lat:-7.558260109176665,lng:110.76808640733361},
            {lat:-7.55826106748966,lng:110.76807675138014},{lat:-7.558395674522815,lng:110.76805227622287},
            {lat:-7.558400659968058,lng:110.76807306334274},{lat:-7.55843123736428,lng:110.76806803420084},
            {lat:-7.558426916645374,lng:110.76804791763323},{lat:-7.558794509960307,lng:110.76798522100262},
            {lat:-7.5587965041365655,lng:110.76799159124903},{lat:-7.558836720022547,lng:110.76798555627875},
            {lat:-7.558848020353464,lng:110.76805294678024},{lat:-7.558828410955498,lng:110.76805697009377},
            {lat:-7.558836055297179,lng:110.76810625568442},{lat:-7.558409966142499,lng:110.76818068697946},
            {lat:-7.558414286861569,lng:110.76820180937546},{lat:-7.55828599472307,lng:110.76822494342821},
            {lat:-7.558282006365817,lng:110.76820382103222},{lat:-7.557900785705328,lng:110.7682685293247},
            {lat:-7.557904441702695,lng:110.76829065754907},{lat:-7.5578632286396047,lng:110.76829736307161},
            {lat:-7.557857578461297,lng:110.76827624067562},{lat: -7.557837304291462, lng:  110.76827892288463}
        ];

      var rnd_shp = new google.maps.Polygon({
          paths: rnd,
          strokeColor: '#008080',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#008080',
          fillOpacity: 0.35
        });

      rnd_shp.setMap(peta_tampil);
      rnd_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Keguruan & Ilmu Pendidikan (FKIP)</strong><br><ul><li>Matematika</li><li>Akuntasi</li><li>Bahasa Indonesia</li><li>PKN</li><li>Biologi</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Matematika,Akuntasi,B. Indo,PKN, Biologi */
      /* ========== END KAMPUS 1 ============= */

      /* ========== KAMPUS 2 ============= */
      /* Fakultas FKI */
      var fki = [
          {lat: -7.556638838822166, lng:110.77082309871912},
          {lat: -7.556700658590594, lng:110.77118519693613},
          {lat: -7.556923342629321, lng:110.77112350612879},
          {lat: -7.556866175991528, lng:110.7707759924233},
          {lat: -7.556776770013765, lng:110.77078940346837},
          {lat: -7.5567744434639055, lng:110.77076526358724},
          {lat: -7.556710297155833, lng:110.77077565714717},
          {lat: -7.556714950256228, lng:110.77081052586436}
        ];

      var fki_shp = new google.maps.Polygon({
          paths: fki,
          strokeColor: '#E74C3C',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#E74C3C',
          fillOpacity: 0.35
        });

      fki_shp.setMap(peta_tampil);
      fki_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Komunikasi & Informatika</strong><br><ul><li>Informatika</li><li>Komunikasi</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Fakultas FKI */

      /* Start Fakultas Teknik */
      var teknik = [
            { lat: -7.556700658590594, lng: 110.77118519693613},
            { lat: -7.556746524864671, lng: 110.77146699652076},
            { lat: -7.556817318452067, lng: 110.77145559713244},
            { lat: -7.556819645001698, lng: 110.77147571370006},
            { lat: -7.556888776756208, lng: 110.77146364375949},
            { lat: -7.5568857854786, lng: 110.77144855633378},
            { lat: -7.556975523797902, lng: 110.77143296599388},
            { lat: -7.556923342629321, lng: 110.77112350612879}
        ];

      var teknik_shp = new google.maps.Polygon({
          paths: teknik,
          strokeColor: '#FFC300',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFC300',
          fillOpacity: 0.35
        });

      teknik_shp.setMap(peta_tampil);
      teknik_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Teknik</strong><br><ul><li>Teknik Sipil</li><li>Arsitektur</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Teknik */

      /* Start Ekonomi */
      var ekonomi = [
            {lat: -7.556447396902524, lng: 110.76978407800198},
            {lat: -7.556902071323114, lng: 110.76971836388111},
            {lat: -7.55701640458164, lng: 110.7706755772233},
            {lat: -7.556588984163763, lng: 110.7707479968667}
        ];

      var ekonomi_shp = new google.maps.Polygon({
          paths: ekonomi,
          strokeColor: '#2C3E50',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#2C3E50',
          fillOpacity: 0.35
        });

      ekonomi_shp.setMap(peta_tampil);
      ekonomi_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Ekonomi & Bisnis</strong>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Ekonomi */

      /* Start Fakultas Teknik Lanjutan 1 */
      var teknik_1 = [
            {lat: -7.5557255005672905, lng: 110.76983973383904},{lat: -7.5555898955962375, lng: 110.76987192034721},
            {lat: -7.555604519663792, lng: 110.76998122036457},{lat: -7.555576600988936, lng: 110.76999362558126},
            {lat: -7.555686570300709, lng: 110.77069349021747},{lat: -7.555713290349601, lng: 110.77069808081376},
            {lat:  -7.55574517901852, lng: 110.77088963165193},{lat:  -7.555914283887483, lng: 110.7708603143692},
            {lat: -7.555893012531584, lng: 110.77074900269508},{lat: -7.555805268177427, lng: 110.77075436711311},
            {lat: -7.555682957835861, lng: 110.7699604332447},{lat: -7.5557361362494895, lng:110.76994433999062}
        ];

      var teknik_1_shp = new google.maps.Polygon({
          paths: teknik_1,
          strokeColor: '#FFC300',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFC300',
          fillOpacity: 0.35
        });

      teknik_1_shp.setMap(peta_tampil);
      teknik_1_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Teknik</strong><br><ul><li>Teknik Elektro</li><li>Teknik Industri</li><li>Teknik Kimia</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Teknik Lanjutan 1 */

      /* Start Fakultas Teknik Lanjutan 2 */
      var teknik_2 = [
            {lat: -7.555487527109491, lng: 110.76997853815556},
            {lat: -7.555649056593744, lng: 110.77089216560125},
            {lat: -7.555404435787498, lng: 110.77093642205},
            {lat: -7.555240247288212, lng: 110.77003050595522}
        ];

      var teknik_2_shp = new google.maps.Polygon({
          paths: teknik_2,
          strokeColor: '#FFC300',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#FFC300',
          fillOpacity: 0.35
        });

      teknik_2_shp.setMap(peta_tampil);
      teknik_2_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Teknik</strong><br><ul><li>Teknik Mesin</li><li>Lab.Teknik</li></ul>";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
      /* End Teknik Lanjutan 2 */

      /* Start Psikologi */
      var psikologi = [
            {lat:-7.55507656625772,lng:110.77183300478237},{lat:-7.5550462122909865,lng:110.77183918655123},{lat:-7.555055518527562,lng:110.77189450711217},
      {lat:-7.555085737750847,lng:110.77188985673956},{lat:-7.555097064224117,lng:110.77195787430014},{lat:-7.5551379451856345,lng:110.77195016294922},
      {lat:-7.555130633144019,lng:110.77191093564238},{lat:-7.5551434624350495,lng:110.77190583945139},{lat:-7.555155959400773,lng:110.77194499968869},
      {lat:-7.5552363918469885,lng:110.77193091809136},{lat:-7.555227750345222,lng:110.77189940213543},{lat:-7.555276940429892,lng:110.77189001440388},
      {lat:-7.555285581930678,lng:110.77193091809136},{lat:-7.555358037584288,lng:110.77192085980755},{lat:-7.555350725546415,lng:110.77188062667233},
      {lat:-7.555397256694496,lng:110.77187258004528},{lat:-7.555406562923501,lng:110.77190811931473},{lat:-7.555490983706116,lng:110.77189537883214},
      {lat:-7.5554830069399594,lng:110.77183704078607},{lat:-7.555500217420943,lng:110.77183389528045},{lat:-7.5555128473001,lng:110.7718969271923},
      {lat:-7.555596603331609,lng:110.77188217504272},{lat:-7.555588687039858,lng:110.77182712875583},{lat:-7.555611369784136,lng:110.77182817085395},
      {lat:-7.555678969454564,lng:110.77217586928839},{lat:-7.555731483138562,lng:110.77217292040586},{lat:-7.55574113885764,lng:110.77219668007695},
      {lat:-7.555808622040928,lng:110.77218563042834},{lat:-7.555803636566909,lng:110.77215713195756},{lat:-7.555837537808428,lng:110.77215109697704},
      {lat:-7.555828896318685,lng:110.77210918746118},{lat:-7.555812278058548,lng:110.77211086384432},{lat:-7.555806960208282,lng:110.77208504758005},
      {lat:-7.555843520357855,lng:110.77207867733364},{lat:-7.555804966038486,lng:110.77185907147054},{lat:-7.555820617399542,lng:110.77185669405958},
      {lat:-7.555810646449441,lng:110.77176214620977},{lat:-7.555705026886427,lng:110.77167409658841},{lat:-7.555595346393231,lng:110.77169555426053},
      {lat:-7.555598138253571,lng:110.77173686027322},{lat:-7.555582650029233,lng:110.77174296229771},{lat:-7.555579658742568,lng:110.77173357456616},
      {lat:-7.555565367039377,lng:110.77173525094679},{lat:-7.555556393178985,lng:110.77168563008513},{lat:-7.5554744983669195,lng:110.77170333267077},
      {lat:-7.555484991384867,lng:110.77175431559874},{lat:-7.5554617355526865,lng:110.77175053954534},{lat:-7.555451099863733,lng:110.77170360088758},
      {lat:-7.5554517645942925,lng:110.77170561254434},{lat:-7.5553733263903915,lng:110.7717176824849},{lat:-7.555380638427896,lng:110.77176395059041},
      {lat:-7.555337430931749,lng:110.77177333832196},{lat:-7.555326795239727,lng:110.77172707021134},{lat:-7.555245698079467,lng: 110.77173914015702},
      {lat:-7.555256563410729,lng:110.77178765765552},{lat:-7.555212691171248,lng:110.77179402790193},{lat:-7.555204351818513,lng:110.77174628153443},
      {lat:-7.555122589904181,lng: 110.77175851911306},{lat:-7.555132228504649,lng:110.77181266620755},{lat:-7.55511002044555,lng:110.7718144492651},
      {lat:-7.555103445646817,lng:110.77178540826253},{lat:-7.555069544359218,lng: 110.77179144323281} 
        ];

      var psikologi_shp = new google.maps.Polygon({
          paths: psikologi,
          strokeColor: '#52BE80',
          strokeOpacity: 0.8,
          strokeWeight: 2,
          fillColor: '#52BE80',
          fillOpacity: 0.35
        });

      psikologi_shp.setMap(peta_tampil);
      psikologi_shp.addListener('click', function(e) {
        var info = "<strong>Fakultas Psikologi";
        info_peta.setContent(info);
        info_peta.setPosition(e.latLng);
        info_peta.open(peta_tampil);
        tempel_info(e.latLng.lat(),e.latLng.lng());
        document.getElementById("nama_lokasi").innerHTML  = info;
      });
        /* End Psikologi */


    /* Start GOR UMS */
    var gor = [
      {lat: -7.5559913925438185,  lng: 110.77003084123135},
      {lat: -7.5560392530822185,  lng: 110.77033795416355},
      {lat: -7.556172198994385,  lng: 110.77031649649143},
      {lat: -7.556180175747805,  lng: 110.77040132135153},
      {lat: -7.556338381327031,  lng: 110.77037416398525},
      {lat: -7.556338381327031,  lng: 110.77037550508976},
      {lat: -7.55632508674277,  lng: 110.77028699219227},
      {lat: -7.556444737986378,  lng: 110.77026687562466},
      {lat: -7.556402195325786,  lng: 110.76999094337225},
      {lat: -7.556279885153236,  lng: 110.77001072466373},
      {lat: -7.556262602191266,  lng: 110.76989656314254},
      {lat: -7.556096752194257,  lng: 110.76992405578494},
      {lat: -7.5561097144207565,  lng: 110.77000686898828}
    ];
    var gor_ket = new google.maps.Polygon({
      paths: gor,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#e85bf9',
      fillOpacity: 0.4
    });
    gor_ket.setMap(peta_tampil);
    gor_ket.addListener('click', function(e) {
      var info = "<b>GOR UMS</b>";
      info_peta.setContent(info);
      info_peta.setPosition(e.latLng);
      info_peta.open(peta_tampil);
      tempel_info (e.latLng.lat(),e.latLng.lng());
      document.getElementById("nama_lokasi").innerHTML  = info;
    });
    /* End GOR UMS */


    /* Start Perpustakaan Pusat UMS */
    var perpus = [
      {lat: -7.555932231593205,  lng: 110.77079694718122},
      {lat: -7.555988733624874,  lng: 110.77079694718122},
      {lat: -7.555992722003296,  lng: 110.77082980424166},
      {lat: -7.556228036265279,  lng: 110.77079828828573},
      {lat: -7.556222718430267,  lng: 110.77075067907572},    
      {lat: -7.5562606080033135,  lng: 110.77074464410543},   
      {lat: -7.556228036265279,  lng: 110.77050810679793},    
      {lat: -7.556188152501086,  lng: 110.77051347121596},    
      {lat: -7.556182169936139,  lng: 110.77046787366271},    
      {lat: -7.556076810306551,  lng: 110.77048128470778},    
      {lat: -7.556082792872962,  lng: 110.77052352949977},    
      {lat: -7.556054209499379,  lng: 110.77052755281329},    
      {lat: -7.556054209499379,  lng: 110.77052721753716},    
      {lat: -7.556048226932574,  lng: 110.77048664912581},    
      {lat: -7.555942534905417,  lng: 110.7705014012754},   
      {lat: -7.55594951456838,  lng: 110.77055471017957},   
      {lat: -7.555900324560286, lng: 110.77056074514985}
    ];
    
    var perpus_ket = new google.maps.Polygon({
      paths: perpus,
      strokeColor: '#FF0000',
      strokeOpacity: 0.8,
      strokeWeight: 2,
      fillColor: '#fff690',
      fillOpacity: 0.4
    });
    
    perpus_ket.setMap(peta_tampil);
    perpus_ket.addListener('click', function(e) {
      var info = "<b>Perpustakaan Pusat UMS</b>";
      info_peta.setContent(info);
      info_peta.setPosition(e.latLng);
      info_peta.open(peta_tampil);
      tempel_info (e.latLng.lat(),e.latLng.lng());
      document.getElementById("nama_lokasi").innerHTML  = info;
    });
    /* End Perpustakaan Pusat UMS */
    /* ========== END KAMPUS 2 ============= */


      google.maps.event.addListener(peta_tampil, 'click', function(e) {
        var nilai_latitude = e.latLng.lat();
        var nilai_longitude = e.latLng.lng();
        tempel_info(nilai_latitude,nilai_longitude);
      });

      startButtonEvents();
    }
    
    function startButtonEvents () {
      document.getElementById('btnR').addEventListener('click', function(){
        peta_tampil.setMapTypeId(google.maps.MapTypeId.ROADMAP);
      });
      document.getElementById('btnS').addEventListener('click', function(){
        peta_tampil.setMapTypeId(google.maps.MapTypeId.SATELLITE);
      });
      document.getElementById('btnH').addEventListener('click', function(){
        peta_tampil.setMapTypeId(google.maps.MapTypeId.HYBRID);
      });
      document.getElementById('btnT').addEventListener('click', function(){
        peta_tampil.setMapTypeId(google.maps.MapTypeId.TERRAIN);
      });
    }

    google.maps.event.addDomListener(window,"load",load_peta);
    </script>

    <!-- END -->
	<script type="text/javascript">
		//Defining map as a global variable to access from other functions
		var map,info_peta;

		function dapatkan_lokasi(nilai_latitude,nilai_longitude){
			nilai_latitude  = parseFloat(nilai_latitude);
			nilai_longitude = parseFloat(nilai_longitude);

			var latlng = new google.maps.LatLng(nilai_latitude, nilai_longitude);
			var geocoder = geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'latLng': latlng }, function (results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						document.getElementById("alamat").innerHTML  = String(results[0].formatted_address);
					}
				}
			});
		}

		function infowindow (nilai_latitude,nilai_longitude){
			dapatkan_lokasi(nilai_latitude,nilai_longitude);
			document.getElementById("latitude").innerHTML     = nilai_latitude;
			document.getElementById("longitude").innerHTML    = nilai_longitude;
		}
		
		function initMap(){
			var LAT = -7.557155997472517;
			var LNG = 110.76918946579099;

			infowindow (LAT,LNG);

			map = new google.maps.Map(document.getElementById('mapDiv'), {
				zoom: 17,
				center: {lat: LAT, lng: LNG},
				mapTypeId: google.maps.MapTypeId.ROADMAP
			});

		info_peta = new google.maps.InfoWindow;
  
		<!-- ######################FKI######################-->
		var fki = [
			{lat: -7.556638838822166, lng:110.77082309871912},
			{lat: -7.556700658590594, lng:110.77118519693613},
			{lat: -7.556923342629321, lng:110.77112350612879},
			{lat: -7.556866175991528, lng:110.7707759924233},
			{lat: -7.556776770013765, lng:110.77078940346837},
			{lat: -7.5567744434639055, lng:110.77076526358724},
			{lat: -7.556710297155833, lng:110.77077565714717},
			{lat: -7.556714950256228, lng:110.77081052586436}
		];
		var fki_ket = new google.maps.Polygon({
			paths: fki,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#c6e7ff',
			fillOpacity: 0.4
		});

		fki_ket.setMap(map);
		fki_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Komunikasi & Informatika</b><br/><ul><li>Informatika</li><li>Komunikasi</li></ul>";
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});
		
		<!-- ######################FT######################-->
		var ft = [
			{ lat: -7.556700658590594, lng: 110.77118519693613},
			{ lat: -7.556746524864671, lng: 110.77146699652076},
			{ lat: -7.556817318452067, lng: 110.77145559713244},
			{ lat: -7.556819645001698, lng: 110.77147571370006},
			{ lat: -7.556888776756208, lng: 110.77146364375949},
			{ lat: -7.5568857854786, lng: 110.77144855633378},
			{ lat: -7.556975523797902, lng: 110.77143296599388},
			{ lat: -7.556923342629321, lng: 110.77112350612879}
		];

		var ft_ket = new google.maps.Polygon({
			paths: ft,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#ffadc3',
			fillOpacity: 0.4
		});

		ft_ket.setMap(map);
		ft_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Teknik</b><br/><ul><li>Teknik Arsitektur</li><li>Teknik Sipil</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

    	<!-- ######################FT1######################-->
		var ft1 = [
			{ lat: -7.555745923320846, lng: 110.77088948226947},
			{ lat: -7.555915613347191, lng: 110.77085964381695},
			{ lat: -7.555895006721239, 	lng: 110.77074682340026},
			{ lat: -7.555810586017591, lng: 110.7707604020834},
			{ lat: -7.555686946217107, lng: 110.76995976269245},
			{ lat: -7.555748101391663, lng: 110.76994903385639},
			{ lat: -7.5557308184084215, lng: 110.76984543353319},
			{lat: -7.555586239579266, lng: 110.76986907050014},
			{lat: -7.555604852028956, lng: 110.76998641714454},
			{lat: -7.5555732773370545, lng: 110.76999144628644},
			{lat: -7.555683954931166, lng: 110.77069284394383},
			{lat: -7.555714200154659, lng: 110.7706874795258}
		];
		
		var ft1_ket = new google.maps.Polygon({
			paths: ft1,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#ffadc3',
			fillOpacity: 0.4
		});
		
		ft1_ket.setMap(map);
		ft1_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Teknik</b><br/><ul><li>Teknik Kimia</li><li>Teknik Industri</li><li>Teknik Elektro</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});  
		
				<!-- ######################FT2######################--> 
		var ft2 = [
			{ lat: -7.555246489273359, lng: 110.77002949194934},
			{ lat: -7.5554057652487705, lng: 110.77092904597521},
			{ lat: -7.555641079830514, 	lng: 110.77088613063097},
			{ lat: -7.5554808798043265, 	lng: 110.76998692005873}
		];
		
		var ft2_ket = new google.maps.Polygon({
			paths: ft2,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#ffadc3',
			fillOpacity: 0.4
		});
		
		ft2_ket.setMap(map);
		ft2_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Teknik</b><br/><ul><li>Teknik Mesin</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});
		
		<!-- ######################FEB######################-->
		var feb = [
			{ lat: -7.556460691483017, lng: 110.76980486512184},
			{ lat: -7.556481962810965, lng: 110.7699416577816},
			{ lat: -7.556511875614103, lng: 110.76995439827442},
			{ lat: -7.55663219153471, lng: 110.77073089778423},
			{ lat: -7.557013413304909, lng: 110.77067121863365},
			{ lat: -7.556892432762148, lng: 110.7698930427432},
			{ lat: -7.556874152732137, lng: 110.76988030225038},
			{ lat: -7.556854875608743, lng: 110.76974853873253},
			{ lat: -7.556698332040326, lng: 110.76977301388979},
			{ lat: -7.55669500839707, lng: 110.76974853873253},
			{ lat: -7.556672739986589, lng: 110.76975222676992},
			{ lat: -7.5566700810718315, lng: 110.76974250376224},
			{ lat: -7.556600284553507, lng: 110.7697532325983},
			{ lat: -7.556604272926292, lng: 110.76978206634521}	
		];

		var feb_ket = new google.maps.Polygon({
			paths: feb,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#80f762',
			fillOpacity: 0.4
		});
		
		feb_ket.setMap(map);
		feb_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Ekonomi Bisnis</b><br/><ul><li>Ekonomi Pembangunan</li><li>Akuntansi</li><li>Manajemen</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		<!-- ######################FP######################-->
		var fp = [
			{lat: -7.55507656625772,lng: 110.77183300478237},
			{lat: -7.5550462122909865,lng: 110.77183918655123},
			{lat: -7.555055518527562,lng: 110.77189450711217},
			{lat: -7.555085737750847,lng: 110.77188985673956},
			{lat: -7.555097064224117,lng: 110.77195787430014},
			{lat: -7.5551379451856345,lng: 110.77195016294922},
			{lat: -7.555130633144019,lng: 110.77191093564238},
			{lat: -7.5551434624350495,lng: 110.77190583945139},
			{lat: -7.555155959400773,lng: 110.77194499968869},
			{lat: -7.5552363918469885,lng: 110.77193091809136},
			{lat: -7.555227750345222,lng: 110.77189940213543},
			{lat: -7.555276940429892,lng: 110.77189001440388},
			{lat: -7.555285581930678,lng: 110.77193091809136},
			{lat: -7.555358037584288,lng: 110.77192085980755},
			{lat: -7.555350725546415,lng: 110.77188062667233},
			{lat: -7.555397256694496,lng: 110.77187258004528},
			{lat: -7.555406562923501,lng: 110.77190811931473},
			{lat: -7.555490983706116,lng: 110.77189537883214},
			{lat: -7.5554830069399594,lng: 110.77183704078607},
			{lat: -7.555500217420943,lng: 110.77183389528045},
			{lat: -7.5555128473001,lng: 110.7718969271923},
			{lat: -7.555596603331609,lng: 110.77188217504272},
			{lat: -7.555588687039858,lng: 110.77182712875583},
			{lat: -7.555611369784136,lng: 110.77182817085395},
			{lat: -7.555678969454564,lng: 110.77217586928839},
			{lat: -7.555731483138562,lng: 110.77217292040586},
			{lat: -7.55574113885764,lng: 110.77219668007695},
			{lat: -7.555808622040928,lng: 110.77218563042834},
			{lat: -7.555803636566909,lng: 110.77215713195756},
			{lat: -7.555837537808428,lng: 110.77215109697704},
			{lat: -7.555828896318685,lng: 110.77210918746118},
			{lat: -7.555812278058548,lng: 110.77211086384432},
			{lat: -7.555806960208282,lng: 110.77208504758005},
			{lat: -7.555843520357855,lng: 110.77207867733364},
			{lat: -7.555804966038486,lng: 110.77185907147054},
			{lat: -7.555820617399542,lng: 110.77185669405958},
			{lat: -7.555810646449441,lng: 110.77176214620977},
			{lat: -7.555705026886427,lng: 110.77167409658841},
			{lat: -7.555595346393231,lng: 110.77169555426053},
			{lat: -7.555598138253571,lng: 110.77173686027322},
			{lat: -7.555582650029233,lng: 110.77174296229771},
			{lat: -7.555579658742568,lng: 110.77173357456616},
			{lat: -7.555565367039377,lng: 110.77173525094679},
			{lat: -7.555556393178985,lng: 110.77168563008513},
			{lat: -7.5554744983669195,lng: 110.77170333267077},
			{lat: -7.555484991384867,lng: 110.77175431559874},
			{lat: -7.5554617355526865,lng: 110.77175053954534},
			{lat: -7.555451099863733,lng: 110.77170360088758},
			{lat: -7.5554517645942925,lng: 110.77170561254434},
			{lat: -7.5553733263903915,lng: 110.7717176824849},
			{lat: -7.555380638427896,lng: 110.77176395059041},
			{lat: -7.555337430931749,lng: 110.77177333832196},
			{lat: -7.555326795239727,lng: 110.77172707021134},
			{lat: -7.555245698079467, lng: 110.77173914015702},
			{lat: -7.555256563410729,lng: 110.77178765765552},
			{lat: -7.555212691171248,lng: 110.77179402790193},
			{lat: -7.555204351818513,lng: 110.77174628153443},
			{lat: -7.555122589904181, lng: 110.77175851911306},
			{lat: -7.555132228504649,lng: 110.77181266620755},
			{lat: -7.55511002044555,lng: 110.7718144492651},
			{lat: -7.555103445646817,lng: 110.77178540826253},
			{lat: -7.555069544359218, lng: 110.77179144323281} 
		];
		
		var fp_ket = new google.maps.Polygon({
			paths: fp,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#fdc526',
			fillOpacity: 0.4
		});
		
		fp_ket.setMap(map);
		fp_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Psikologi</b><br/><ul><li>Psikologi</li><li>Pasca Sarjana</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

      
		<!-- ######################PERPUS######################-->
		var perpus = [
			{lat: -7.555932231593205,  lng: 110.77079694718122},
			{lat: -7.555988733624874,  lng: 110.77079694718122},
			{lat: -7.555992722003296,  lng: 110.77082980424166},
			{lat: -7.556228036265279,  lng: 110.77079828828573},
			{lat: -7.556222718430267,  lng: 110.77075067907572},		
			{lat: -7.5562606080033135,  lng: 110.77074464410543},		
			{lat: -7.556228036265279,  lng: 110.77050810679793},		
			{lat: -7.556188152501086,  lng: 110.77051347121596},		
			{lat: -7.556182169936139,  lng: 110.77046787366271},		
			{lat: -7.556076810306551,  lng: 110.77048128470778},		
			{lat: -7.556082792872962,  lng: 110.77052352949977},		
			{lat: -7.556054209499379,  lng: 110.77052755281329},		
			{lat: -7.556054209499379,  lng: 110.77052721753716},		
			{lat: -7.556048226932574,  lng: 110.77048664912581},		
			{lat: -7.555942534905417,  lng: 110.7705014012754},		
			{lat: -7.55594951456838,  lng: 110.77055471017957},		
			{lat: -7.555900324560286, lng: 110.77056074514985}
		];
		
		var perpus_ket = new google.maps.Polygon({
			paths: perpus,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#fff690',
			fillOpacity: 0.4
		});
		
		perpus_ket.setMap(map);
		perpus_ket.addListener('click', function(e) {
			var fakultas = "<b>PERPUSTAKAAN UMS</b>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

      
		<!-- ######################GOR######################-->
		var gor = [
			{lat: -7.5559913925438185,  lng: 110.77003084123135},
			{lat: -7.5560392530822185,  lng: 110.77033795416355},
			{lat: -7.556172198994385,  lng: 110.77031649649143},
			{lat: -7.556180175747805,  lng: 110.77040132135153},

			{lat: -7.556338381327031,  lng: 110.77037416398525},
			{lat: -7.556338381327031,  lng: 110.77037550508976},
			{lat: -7.55632508674277,  lng: 110.77028699219227},
			{lat: -7.556444737986378,  lng: 110.77026687562466},
			{lat: -7.556402195325786,  lng: 110.76999094337225},
			{lat: -7.556279885153236,  lng: 110.77001072466373},
			{lat: -7.556262602191266,  lng: 110.76989656314254},
			{lat: -7.556096752194257,  lng: 110.76992405578494},
			{lat: -7.5561097144207565,  lng: 110.77000686898828}
		];

		var gor_ket = new google.maps.Polygon({
			paths: gor,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#e85bf9',
			fillOpacity: 0.4
		});
		gor_ket.setMap(map);
		gor_ket.addListener('click', function(e) {
			var fakultas = "<b>GEDUNG OLAH RAGA UMS</b>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		<!-- ######################FH######################-->
		var fh = [
			{ lat: -7.557187904412667,  lng: 110.76871370896697},
			{ lat: -7.556924672085923,  lng: 110.76875578612089},
			{ lat: -7.556890770941271,  lng: 110.76856199651957},
			{ lat: -7.55696920887976,  lng: 110.76854456216097},
			{ lat: -7.556935307738607,  lng: 110.76832680031657},
			{ lat: -7.556969541243871,  lng: 110.76832009479403},
			{ lat: -7.556956246679038,  lng: 110.76823895797133},
			{ lat: -7.557263683386083,  lng: 110.76818631961942},
			{ lat: -7.557271992483233,  lng: 110.76823459938169}, 
			{ lat: -7.557398623104049,  lng: 110.76821314170957},
			{ lat: -7.5574072645623955,  lng: 110.7682441547513},
			{ lat: -7.557650554779938,  lng: 110.76820861548185},
			{ lat: -7.557675149685026,  lng: 110.76834876090288},
			{ lat: -7.5576915454759215, lng: 110.76834683957725},
			{ lat: -7.5577063847359,  lng: 110.76844135173076},
			{ lat: -7.557691103136208, lng: 110.76844397932291},
			{ lat: -7.557719362331069,  lng: 110.76860495755409},
			{ lat: -7.5575485952794965,  lng: 110.76863306091082},
			{ lat: -7.557518274050238,  lng: 110.76843928545713},
			{ lat: -7.557440500938983,  lng: 110.76845269650221},
			{ lat: -7.557446483486502,  lng: 110.76849091798067},
			{ lat: -7.557251718285892,  lng: 110.76852310448885},
			{ lat: -7.557245071007879,  lng: 110.76849225908518},
			{ lat: -7.557156662200455,  lng: 110.76850969344378}
		];

		var fh_ket = new google.maps.Polygon({
			paths: fh,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#ff25a8',
			fillOpacity: 0.4
		});
		
		fh_ket.setMap(map);
		fh_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Hukum</b><br/><ul><li>Ilmu Hukum</li></ul><b>Fakultas Geografi</b><ul><li>Geografi</li></ul><b>FKIP</b><ul><li>Pendidikan Bahasa Inggris</li>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		<!-- ######################PGSD-PAUD######################-->
		var paud = [
			{lat: -7.557985870737221,lng: 110.76914024725454},
			{lat: -7.558119148413389, lng: 110.76911610737852},
			{lat: -7.5579898590972086,lng: 110.76841739190968},
			{ lat: -7.557972614980079,  lng: 110.76832981780171},
			{ lat: -7.557880882687473,  lng: 110.76834624633193},
			{ lat: -7.557897642582632,  lng: 110.76843462764941},
			{ lat: -7.557856075384981,  lng: 110.76844256336722}
		];
		var paud_ket = new google.maps.Polygon({
			paths: paud,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#00FF00',
			fillOpacity: 0.4
		});
		
		paud_ket.setMap(map);
		paud_ket.addListener('click', function(e) {
			var fakultas = "<b>FKIP</b><br/><ul><li>Fakultas PGSD</li><li>Fakultas PGPAUD</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});


		<!-- ######################FIK######################-->
		var FIK = [
			{ lat: -7.559037173457653,  lng: 110.76884446665645},
			{ lat: -7.559071074433812,  lng: 110.76883809641004},
			{ lat: -7.559082042396104,  lng: 110.76889174059033},
			{ lat: -7.559159248613498, lng: 110.76887536465495},
			{ lat: -7.559147850164059,  lng: 110.76882401481271},
			{ lat: -7.55925924942183,  lng: 110.76880257747098},
			{ lat: -7.5591395411030025,  lng: 110.7681574858725},
			{ lat: -7.559042269655953,  lng: 110.7681736797258},
			{ lat: -7.5590396107557885,  lng: 110.76816160978524},
			{ lat: -7.558977126597057,  lng: 110.7681736797258},
			{ lat: -7.558977519497847,  lng: 110.76817542749245},
			{ lat: -7.558978608699013,  lng: 110.76818824623456},
			{ lat: -7.5589294104337394,  lng: 110.76819667965992},
			{ lat: -7.558932734059796,  lng: 110.7682201489888},
			{ lat: -7.558919439555406,  lng: 110.76822484285458},
			{ lat: -7.558967964494454,  lng: 110.76847898214851}, 
			{ lat: -7.558951091555294,  lng: 110.76848236843944},
			{ lat: -7.558958071169634,  lng: 110.76851723715663},
			{ lat: -7.558973204743041,  lng: 110.76851566135474}
		];
		
		var FIK_ket = new google.maps.Polygon({
			paths: FIK,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#7286e8',
			fillOpacity: 0.4
		});
		
		FIK_ket.setMap(map);
		FIK_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Ilmu Kesehatan</b><br/><ul><li>Kesehatan Masyarakat</li><li>Ilmu Gizi</li><li>Keperawatan</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});


		<!-- ######################FARMASI######################-->
		var farmasi =[
			{ lat: -7.557967551977087,  lng: 110.76716738195046},
			{ lat: -7.55801275339,  lng: 110.76715933532341},
			{ lat: -7.5580180712029765,  lng: 110.76718079299553},
			{ lat: -7.558085873312619,  lng: 110.767174087473},
			{   lat: -7.558083214406563,  lng: 110.76715531200989},
			{ lat: -7.558141045609679,  lng: 110.76714525372608},
			{   lat: -7.558147028147491,  lng: 110.76716201753243},
			{ lat: -7.558145698694654,  lng: 110.76716201753243},
			{ lat: -7.5582367662047165,  lng: 110.76715061814411},
			{lat: -7.558319905309809,  lng: 110.76769947715229},
			{   lat: -7.558062530331256,   lng: 110.767732456261},
			{   lat: -7.558037270721664,   lng: 110.76757018269745},
			{ lat: -7.557998539320103,   lng: 110.76757645234466},
			{ lat: -7.557976115871245,   lng: 110.76741059126107},
			{ lat: -7.558008079087888,   lng: 110.76740931319227}
		];

		var farmasi_ket = new google.maps.Polygon({
			paths: farmasi,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#23f5ff',
			fillOpacity: 0.4
		});
		
		farmasi_ket.setMap(map);
		farmasi_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Farmasi</b><br/><ul><li>Farmasi</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		<!-- ######################FAI######################-->
		var fai = [
			{lat: -7.558882214940925, lng: 110.76909656077419},
			{lat: -7.559004524376441,lng: 110.76907510310207},
			{lat: -7.558995218224951,lng: 110.76902145892177},
			{lat: -7.559005853826632,lng: 110.76901743560825},
			{lat: -7.558867590984373,lng: 110.76826708760564},
			{lat: -7.5587532582159715,lng: 110.76828854527776},
			{lat: -7.5587685469018755,lng: 110.76835895330532},
			{lat: -7.558760570196251,lng: 110.76836230606659},
			{lat: -7.558886203292644,lng: 110.76904023438487},
			{ lat: -7.5588709146109,  lng: 110.76904358714614}
		];

		var fai_ket = new google.maps.Polygon({
			paths: fai,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#62dc62',
			fillOpacity: 0.4
		});
		fai_ket.setMap(map);
		fai_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Agama Islam</b><br/><ul><li>Pend. Agama Islam<li>Hukum Ekonomi Syariah</li> <li>Ilmu Al Qur'an & Tafsir <li>Tarbiyah</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		<!-- ######################FKIP######################-->
		var fkip = [ 
			{lat: -7.557816736543748,lng: 110.76816368848085},
			{lat: -7.558260109176665,lng: 110.76808640733361},
			{lat: -7.55826106748966,lng: 110.76807675138014},
			{lat: -7.558395674522815,lng: 110.76805227622287},
			{lat: -7.558400659968058,lng: 110.76807306334274},
			{lat: -7.55843123736428,lng: 110.76806803420084},
			{lat: -7.558426916645374,lng: 110.76804791763323},
			{lat: -7.558794509960307,lng: 110.76798522100262},
			{lat: -7.5587965041365655,lng: 110.76799159124903},
			{lat: -7.558836720022547,lng: 110.76798555627875},
			{lat: -7.558848020353464,lng: 110.76805294678024},
			{lat: -7.558828410955498,lng: 110.76805697009377},
			{lat: -7.558836055297179,lng: 110.76810625568442},
			{lat: -7.558409966142499,lng: 110.76818068697946},
			{lat: -7.558414286861569,lng: 110.76820180937546},
			{lat: -7.55828599472307,lng: 110.76822494342821},
			{lat: -7.558282006365817,lng: 110.76820382103222},
			{lat: -7.557900785705328,lng: 110.7682685293247},
			{lat: -7.557904441702695,lng: 110.76829065754907},
			{lat: -7.5578632286396047,lng: 110.76829736307161},
			{lat: -7.557857578461297,lng: 110.76827624067562},
			{ lat: -7.557837304291462,lng: 110.76827892288463}
		];
		
		var fkip_ket = new google.maps.Polygon({
			paths: fkip,
			strokeColor: '#FF0000',
			strokeOpacity: 0.8,
			strokeWeight: 2,
			fillColor: '#300bc5',
			fillOpacity: 0.4
		});
		
		fkip_ket.setMap(map);
		fkip_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Keguruan & Ilmu Pendidikan (FKIP)</b><br/><ul><li>Pend. Akuntansi</li> <li>Pend. Kewarganegaraan</li> <li>Pend. Bahasa dan Sastra Indonesia</li> <li>Pend. Bahasa Inggris</li> <li>Pend. Matematika</li> <li>Pend. Biologi</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		<!-- ######################FK######################-->
		var fk = [
			{lat: -7.5482030163917715,lng: 110.76934469863772},
			{lat: -7.54827248189556,lng: 110.7693218998611},
			{lat: -7.548289432806259,lng: 110.76937118545175},
			{lat: -7.54822395575533,lng: 110.76940705999732}
		];
		
		var fk_ket = new google.maps.Polygon({
		paths: fk,
		strokeColor: '#FF0000',
		strokeOpacity: 0.8,
		strokeWeight: 2,
		fillColor: '#d41919',
		fillOpacity: 0.4
		});
		
		fk_ket.setMap(map);
		fk_ket.addListener('click', function(e) {
			var fakultas = "<b>Fakultas Kedokteran</b><br/><ul><li>Kedokteran</li></ul>";;
			info_peta.setContent(fakultas);
			info_peta.setPosition(e.latLng);
			info_peta.open(map);
			infowindow (e.latLng.lat(),e.latLng.lng());
			document.getElementById("lokasi").innerHTML  = fakultas;
		});

		google.maps.event.addListener(map, 'click', function(e) {
			var nilai_latitude = e.latLng.lat();
			var nilai_longitude = e.latLng.lng();
			infowindow(nilai_latitude,nilai_longitude);
		});
		startButtonEvents();
		}
		
		function startButtonEvents () {
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
		}
		google.maps.event.addDomListener(window,"load",initMap);
    </script>
	
</head>
<body>
	<div class="row">
		<div class="container">
    	<div class="col-md-14">
		<nav class = "navbar navbar-default navbar-fixed-top" role = "navigation">

		<a href = "#"><center><h3><label>TUGAS 3  Lokasi Kampus UMS<br> Naisha Rahma Indraswari | L200140011 | Kelas A</label></h3></center></a>
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
    		<div id="tugas1" class="content-p collapse in">
    		<div class="well">
			<a href = "#"><center><h2><label>Lokasi Kampus UMS</label></h2></a>
			<input class="myButton" id="btnR" type="button" value="RoadMap">
          <input class="myButton" id="btnS" type="button" value="Satellite">
          <input class="myButton" id="btnH" type="button" value="Hybrid">
          <input class="myButton" id="btnT" type="button" value="Terrain"></center><br/><br>

				<div id="mapDiv"></div>


				<div class="table-responsive">
        <table class="table table-hover ">
          <thead>
            <tr>
              <th colspan="3">
                <div align="center"><strong><h4>Detail Informasi</h4></strong></div>
              </th>
            </tr>
          </thead>
          <tbody>
         <h4> <tr>
            <td><strong>Detail Lokasi</strong></td>
            <td>:</td>
            <td id="lokasi">-</td>
          </tr>
		  <tr>
            <td><strong>Alamat</strong></td>
            <td>:</td>
            <td id="alamat">-</td>
          </tr>
          <tr>
            <td><strong>Latitude</strong></td>
            <td>:</td>
            <td id="latitude">-</td>
          </tr>
          <tr>
            <td><strong>Longitude</strong></td>
            <td>:</td>
            <td id="longitude">-</td>
          </tr>
          </tbody></h4>
        </table>
        <hr >
        </div>

    		</div>
    		</div>
    		
    </div>
    </div>

</body>
</html>