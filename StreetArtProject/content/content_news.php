<h2>C'est le code PHP de la page des news</h2>
<p>j'espère que ça marche<p/>

<!DOCTYPE html>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: 48.858, lng: 2.35};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBBdxZ0rHyuuYMsy0CcuhqpwYKnvKQb8M&callback=initMap">
    </script>
  </body>
</html>
