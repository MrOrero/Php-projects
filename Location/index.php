
<!DOCTYPE html>
<html>
<head>
  <title> Welcome || MONKEY .D. SPATCH || Delivery </title>
  <meta charset="utf-8">
  <meta name = "description" content="This is a Logistics Website">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="Location\availablerider.js" charset="utf-8"></script>
	<style type="text/css">
		.container {
			height: 450px;
		}
		#map {
      height: 150%;
      width: 100%;
      margin: 20px auto;
		}
		#data, #allData {
      display: none;
		}
	</style>
</head>

<body>
      <div class="container">
          <center><h1>Monkey D. Spatch</h1></center>
          <?php
                require 'location.php';
                $edu = new education;
                $coll = $edu->getCollegesBlankLatLng();
                $coll = json_encode($coll, true);
                echo '<div id="data">' . $coll . '</div>';

                $allData = $edu->getAllColleges();
			          $allData = json_encode($allData, true);
			          echo '<div id="allData">' . $allData . '</div>';

              //  $allData = $edu->getAllColleges();
                //$allData = json_encode($allData, true);
                //echo '<div id="allData">' . $allData . '</div>';
           ?>
          <div id="map"></div>
    </div>

          <script src="https://maps.googleapis.com/maps/api/js?key=apikey&libraries=places"></script>




     </div>
</body>
</html>
