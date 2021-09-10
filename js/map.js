(function(){
  google.maps.event.addDomListener(window, 'load', init);
    var start = new google.maps.LatLng(55.756021, 37.659557);
    var one = new google.maps.LatLng(55.755520,37.660791);
    var two = new google.maps.LatLng(55.754512,37.660727);
    var three = new google.maps.LatLng(55.754222,37.662454);
    var fore = new google.maps.LatLng(55.754953,37.664235);
    var five = new google.maps.LatLng(55.754995,37.665791);
    var six = new google.maps.LatLng(55.755804,37.665534);
    var end = new google.maps.LatLng(mapCoord.lat,mapCoord.lng);


      function init() {

          var mapOptions = {
              zoom: 16,
              scrollwheel: false,
              center: new google.maps.LatLng(mapCoord.lat - .001485, mapCoord.lng - .001911),
              styles:
[
   {
       "featureType": "all",
       "elementType": "all",
       "stylers": [
           {
               "saturation": "0"
           },
           {
               "gamma": "1.00"
           }
       ]
   },
   {
       "featureType": "all",
       "elementType": "geometry",
       "stylers": [
           {
               "saturation": "-100"
           },
           {
               "gamma": "1.00"
           },
           {
               "lightness": "10"
           }
       ]
   },
   {
       "featureType": "all",
       "elementType": "labels",
       "stylers": [
           {
               "saturation": "1"
           }
       ]
   },
   {
       "featureType": "all",
       "elementType": "labels.icon",
       "stylers": [
           {
               "saturation": "1"
           }
       ]
   }
]
          };

          // Get the HTML DOM element that will contain your map
          // We are using a div with id="map" seen below in the <body>
          var mapElement = document.getElementById('map');

          // Create the Google Map using our element and options defined above
          var map = new google.maps.Map(mapElement, mapOptions);

          var pinImage = new google.maps.MarkerImage(mapMarker.icon ,
              new google.maps.Size(107, 74),
              new google.maps.Point(0,0),
              new google.maps.Point(10, 34));

          // Let's also add a marker while we're at it
          var marker = new google.maps.Marker({
              position: new google.maps.LatLng(mapCoord.lat,mapCoord.lng),
              map: map,
              icon: pinImage,
              title: ' Solnechnaya st. 4A'
          });

          var trip=[start,one, two , three, fore, five, six, end];
            var path=new google.maps.Polyline({
              path:trip,
              strokeColor:"#dc3e38",
              strokeOpacity:1,
              strokeWeight:5,
              });

              path.setMap(map);
      }

})();

(function() {
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 16,
            scrollwheel: true,
            center: new google.maps.LatLng(mapCoord.lat, mapCoord.lng),
        });
        const image = 
            "https://wordshop.academy/wp-content/themes/wordshop/images/ws-pin.svg";
        const beachMarker = new google.maps.Marker({
            position: new google.maps.LatLng(mapCoord.lat,mapCoord.lng),
            map,
            icon: image,
            title: 'Самотёчная д.7 стр.2'
        });
    }
})();