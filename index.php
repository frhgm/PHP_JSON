<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Test PHP</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" />
  <script type="text/javascript" src="geoJSON.js"></script>
  <script src="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js"></script>
  <link href="https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
  <form action="insertar.php" method="post">
    <div class="row">
      <div class="col-md-6">
        <label for="txtNombre">Ingrese nombre</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Juan Pablo" class="form-control">

        <label for="txtEmail">Ingrese email</label>
        <input type="email" name="txtEmail" id="txtEmail" placeholder="JuanPablo@mail.com" class="form-control">

        <label for="txtPass">Ingrese contraseña</label>
        <input type="password" name="txtPass" id="txtPass" placeholder="663401993" class="form-control">
        <!--
      <label for="txtPassConf">Valide contraseña</label>
      <input type="password" name="" id="txtPassConf" placeholder="663401993" class="form-control">
-->
      </div>
      <div class="col-md-6">
        <label for="txtLatitud">Ingrese latitud</label>
        <input type="text" name="txtLatitud" id="txtLatitud" placeholder="-33.37" class="form-control">
        <label for="txtLongitud">Ingrese longitud</label>
        <input type="text" name="txtLongitud" id="txtLongitud" placeholder="-70.56" class="form-control">
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <form action="post">
          <input type="submit" value="Submit" class="btn btn-primary btn-block" name="submit">
        </form>
      </div>
    </div>
  </form>

  <div id="map"></div>

  <script>
    mapboxgl.accessToken = "pk.eyJ1IjoiZnJoZ20iLCJhIjoiY2ticGJiNWVlMmF6YTJ0bno0cTUyajhvaSJ9.WunbH1t2AY7TP_0t2HmH9w";
    var jsonData = $.ajax({
      url: 'conexion.php',
      //data: {'periodo':periodo,'action':'ajax'},
      dataType: 'json',
      async: false
    }).responseText;

    var obj = jQuery.parseJSON(jsonData);

    var geojson = obj;
    var map = new mapboxgl.Map({
      container: "map",
      style: "mapbox://styles/mapbox/streets-v11",
      center: [-70.567521, -33.37625],
      zoom: 12,
      attributionControl: false,
    });

    // add markers to map
    geojson.features.forEach(function(marker) {
      // create a HTML element for each feature
      var el = document.createElement("div");
      el.className = "marker";

      // make a marker for each feature and add to the map
      new mapboxgl.Marker(el)
        .setLngLat(marker.geometry.coordinates)
        .setPopup(
          new mapboxgl.Popup({
            offset: 25,
          }) // add popups
          .setHTML("<h3>" + marker.properties.title + "</h3><p>" + marker.properties.description + "</p>")
        )
        .addTo(map);
    });
  </script>
</body>

</html>