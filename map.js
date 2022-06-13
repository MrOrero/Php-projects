x = navigator.geolocation;

x.getCurrentPosition(success, failure);


function success(position)
{
   //var myLat = position.coords.latitude;
   //var myLong = position.coords.longitude;

   var myLat = 6.8950557;
   var myLong = 3.7210702;

   console.log(myLat);
   console.log(myLong);
   var coords = new google.maps.LatLng(myLat,myLong);
   var marker = new google.maps.Marker({map:map, position:coords});


   var options = {
    types: ['(cities)']
   }

   var input1 = document.getElementById("from");
   var autocomplete1 = new google.maps.places.Autocomplete(input1, options)

   var input2 = document.getElementById("to");
   var autocomplete2 = new google.maps.places.Autocomplete(input2, options)



   var myLatLng = { lat: myLat, lng: myLong};
   var mapOptions = {
     center: myLatLng,
     zoom: 15,
     mapTypeId: google.maps.MapTypeId.ROADMAP
   };

   var map = new google.maps.Map(document.getElementById("map"), mapOptions);
   var marker = new google.maps.Marker({map:map, position:myLatLng});

   var directionsService = new google.maps.DirectionsService();

   var directionsDisplay = new google.maps.DirectionsRenderer();

   directionsDisplay.setMap(map);


   var button = document.getElementById("go-button");

   button.addEventListener("click", function () {
     console.log("chai");

       var request = {
         origin: myLatLng ,
         //destination: {lat: 6.5160863, lng: 3.3080240},
         destination: document.getElementById("to").value,
         travelMode: google.maps.TravelMode.DRIVING,
         unitSystem: google.maps.UnitSystem.METRIC
       };

       directionsService.route(request, (result,status) => {
         if (status === 'OK'){

           console.log("help me");
           distance = result.routes[0].legs[0].distance.text;
           dist = distance;
           console.log(+dist);
           //console.log(typeof distance);
           var price = 112 * distance;

           console.log(price);
           const output = document.querySelector('#output')
           output.innerHTML = "<div class = 'info'> Bike distance is: " + distance + ".<br /> Duration is : " + result.routes[0].legs[0].duration.text +".</div>";

           directionsDisplay.setDirections(result);
         } else {

           directionsDisplay.setDirections({ routes : []});

           map.setCenter(myLatLng);

           output.innerHTML = "<div class = 'danger'>Could not retrieve distance. </div>";
         }

       });


   });
};







function failure(position){
 console.log("wahala");
}
