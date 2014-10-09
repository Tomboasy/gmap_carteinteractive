<!DOCTYPE html>
<html>
  <head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body, #map-canvas {
        height: 400px;
        width: 800px;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
var map;

var data = [
	{"category":"category1", "latitude":48.4432983398438, "longitude":-68.5397033691406, "title":"Observation du saumon de l'Atlantique", "content":"content 1", "id_icon":"1"},
	{"category":"category1", "latitude":48.4508018493652, "longitude":-68.5295028686523, "title":"Les Promenades historiques de Rimouski", "content":"content 2", "id_icon":"1"},
	{"category":"category2", "latitude":48.4575004577637, "longitude":-68.5218963623047, "title":"Hôtel Rimouski et Centre de Congr�s", "content":"content 3"},
	{"category":"category2", "latitude":48.4546012878418, "longitude":-68.5244979858398, "title":"Hôtel Le Navigateur", "content":"content 4"},
    {"category":"category3", "latitude":48.4575004577637, "longitude":-68.5218963623047, "title":"Hôtel Rimouski et Centre de Congr�s", "content":"content 3"},
	{"category":"category3", "latitude":48.4546012878418, "longitude":-68.5244979858398, "title":"Hôtel Le Navigateur", "content":"content 4"}
];
var pathImage = 'images/pin_' + data.category + '.png';
        
function initialize() {
	var mapOptions = {
		zoom: 12,
		center: new google.maps.LatLng(48.433073, -68.507309)
	};
    //--> Configuration de l'icône personnalisée
        /*var image = {
            // Adresse de l'icône personnalisée
            url: 'images/pin_' + data[i].category + '.png',
            // Taille de l'icône personnalisée
            size: new google.maps.Size(40, 65),
            // Origine de l'image, souvent (0, 0)
            origin: new google.maps.Point(0, 0),
            // L'ancre de l'image. Correspond au point de l'image que l'on raccroche à la carte. Par exemple, si votre îcone est un drapeau, cela correspond à son mâts
            anchor: new google.maps.Point(0, 65)
        };*/
    
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

	for(var i in data) {
		var infowindow = new google.maps.InfoWindow({
			content: data[i].content
		});
		
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(data[i].latitude, data[i].longitude),
			title: data[i].title,
			infowindow: infowindow,
            icon: new google.maps.MarkerImage('images/pin_' + data[i].category + '.png', new google.maps.Size(40, 65), new google.maps.Point(0, 0), new google.maps.Point(0, 65))
		});
		data[i].marker = marker;

		google.maps.event.addListener(data[i].marker, 'click', function() {
			this.infowindow.open(map, this);
		});
	}
}

google.maps.event.addDomListener(window, 'load', initialize);

function setMarker(cbox) {
	for(var i in data) {
		if (cbox.name == data[i].category) {
			if (cbox.checked) {
				data[i].marker.setMap(map);
			}
			else {
				data[i].marker.infowindow.close();
				data[i].marker.setMap(null);
			}
		}
	}
}
    </script>
  </head>
  <body>
      <?php
      //Connection BD
    //$connect_db = mysql_connect('localhost','root','root') or die ("erreur de connexion");
    //mysql_select_db('dev-tour_riki_20',$connect_db) or die ("erreur de connexion base");
      ?>
      
      
      
      
    <div id="map-canvas"></div>
	<label><input type="checkbox" name="category1" onclick="setMarker(this)">Category 1</label>
	<label><input type="checkbox" name="category2" onclick="setMarker(this)">Category 2</label>
	<label><input type="checkbox" name="category3" onclick="setMarker(this)">Category 3</label>
  </body>
</html>
