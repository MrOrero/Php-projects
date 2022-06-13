x = navigator.geolocation;

x.getCurrentPosition(success, failure);



function success(position)
{

  var myLat = position.coords.latitude;
  var myLong = position.coords.longitude;

  //var myLat = 6.8950557;
  //var myLong = 3.7210702;
  //console.log(myLat);
  //console.log(myLong);

  var myLatLng = {lat: myLat , lng:myLong };
  var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 12,
  center: myLatLng
  });

  var coords = new google.maps.LatLng(myLat,myLong);
  var marker = new google.maps.Marker({position: coords,map: map, icon: 'Location/blue_MarkerA.png'});

  var cdata = JSON.parse(document.getElementById('data').innerHTML);
  console.log(cdata);

  var allData = JSON.parse(document.getElementById('allData').innerHTML);
  showAllColleges(allData)



   //console.log(lat);
   //console.log(lng);
   function showAllColleges(allData) {

     console.log(myLat);
     console.log(myLong);
    var infoWind = new google.maps.InfoWindow;
   	Array.prototype.forEach.call(allData, function(data){
      var latitude = data.lat;
      var longitude = data.lng;
      //console.log(typeof latitude);

      console.log(+latitude);
      console.log(+longitude);



       var request = {
         origin: myLatLng ,

         destination: {lat: +latitude , lng: +longitude },
         travelMode: google.maps.TravelMode.DRIVING,
         unitSystem: google.maps.UnitSystem.METRIC
       };

       var directionsService = new google.maps.DirectionsService();


       directionsService.route(request, (result,status) => {

         if (status === 'OK'){

          distance = result.routes[0].legs[0].distance.text;

          var content = document.createElement('div');
          var strong = document.createElement('strong');
          var strong2 = document.createElement('strong');

          strong.textContent = data.firstname;
          content.appendChild(strong);

          strong2.textContent = "  "+distance+ " away";
          content.appendChild(strong2);


           var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data.lat, data.lng),
            map: map
          });
          marker.addListener('mouseover', function(){
            infoWind.setContent(content);
            infoWind.open(map, marker);
          })
          marker.addListener('click', function(){
            var point = {};
            point.id = data.id;
            sendRequest(point);
          })
          function sendRequest(point) {

            console.log(point)
            $.ajax({
                url:"Location/request.php",
                method:"post",
                data: point,
                success: function(res) {
                    console.log(res)
                }
          })
          }



          //console.log(distance);
          //updateDistanceMarker();
        //  function updateDistanceMarker()
        //  {
        //    return distance;

        //  }
      //  updateDistanceMarker(distance);
         } else {
              console.log("err0r");
         }

      });

    //  updateDistanceMarker();

    //  function updateDistanceMarker(myDistance)
    //  {
        //return myDistance;
        //myDist = distance;
      //  console.log(myDistance);

        //function updateDistance()
         //{
        //    console.log(myDistance);

        //}
    //  }



      //console.log(updateDistanceMarker());





    })
  }



     Array.prototype.forEach.call(cdata, function(data){
       var points = {};
    	 points.id = data.id;
       points.lat = position.coords.latitude;
       points.lng = position.coords.longitude;
       updateCollegeWithLatLng(points);
	  });


//};
function updateCollegeWithLatLng(points) {
  console.log(points)
  $.ajax({
      url:"action.php",
      method:"post",
      data: points,
      success: function(res) {
          console.log(res)
      }
})
   //console.log(points);
}

};
function failure(position){
  console.log("wahala");
}
