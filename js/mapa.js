 var map;
 var gmarkers_f = [];
 var nombres_f = [];
 var codigos_f = [];
 var markers_f = [];
 var gmarkers_r = [];
 var markers_r = [];

 var guajira = {lat: 11.413754, lng: -72.169625};

 $( document ).ready( function() {

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      center: new google.maps.LatLng(11.413754, -72.169625),
      zoom: 10,

      styles: [
      {
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#f5f5f5"
        }
        ]
      },
      {
        "elementType": "labels.icon",
        "stylers": [
        {
          "visibility": "off"
        }
        ]
      },
      {
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#616161"
        }
        ]
      },
      {
        "elementType": "labels.text.stroke",
        "stylers": [
        {
          "color": "#f5f5f5"
        }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text",
        "stylers": [
        {
          "color": "#bdbdbd"
        }
        ]
      },
      {
        "featureType": "administrative.land_parcel",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#bdbdbd"
        }
        ]
      },
      {
        "featureType": "landscape.natural.terrain",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#53bd2f"
        }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#eeeeee"
        }
        ]
      },
      {
        "featureType": "poi",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#757575"
        }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#e5e5e5"
        }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text",
        "stylers": [
        {
          "visibility": "off"
        }
        ]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#9e9e9e"
        },
        {
          "visibility": "off"
        }
        ]
      },
      {
        "featureType": "road",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#ffffff"
        }
        ]
      },
      {
        "featureType": "road.arterial",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#757575"
        }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#dadada"
        }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#616161"
        }
        ]
      },
      {
        "featureType": "road.local",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#9e9e9e"
        }
        ]
      },
      {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#e5e5e5"
        }
        ]
      },
      {
        "featureType": "transit.station",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#eeeeee"
        }
        ]
      },
      {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
        {
          "color": "#6697e8"
        }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels",
        "stylers": [
        {
          "color": "#ffffff"
        },
        {
          "weight": 1.5
        }
        ]
      },
      {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
        {
          "color": "#ffffff"
        }
        ]
      }
      ],

      zoomControl: false,
      mapTypeControl: true,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
        mapTypeIds: ['roadmap', 'terrain','satellite']
      }          
    });

 var infoWindow = new google.maps.InfoWindow;

 downloadUrl('http://93.188.162.196/WIN-TIG/php/generarXML.php', function(data) {
  var xml = data.responseXML;
  var centerControlDiv = document.createElement('div');
  var centerControl = new CenterControl(centerControlDiv, map);
  centerControlDiv.index = 1;
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);
  markers_f = xml.documentElement.getElementsByTagName('marker_f');
  Array.prototype.forEach.call(markers_f, function(markerElem) {
    var id = markerElem.getAttribute('id');
    var codigo = markerElem.getAttribute('codigo');
    var usuario = markerElem.getAttribute('usuario');
    var nombre = markerElem.getAttribute('nombre');
    var tipofuente = markerElem.getAttribute('tipofuente');
    var fecha = markerElem.getAttribute('fecha_muestra');
    var ica_c = markerElem.getAttribute('ica_c');
    var ica_e = markerElem.getAttribute('ica_e');
    var irca_c = markerElem.getAttribute('irca_c');
    var irca_e = markerElem.getAttribute('irca_e');
    var tipoacceso = markerElem.getAttribute('tipoacceso');
    var tipouso = markerElem.getAttribute('tipouso');
    var tiempo_viaje = markerElem.getAttribute('tiempo_viaje');
    var distancia = markerElem.getAttribute('distancia');
    var dias_buscar_agua = markerElem.getAttribute('dias_buscar_agua');
    var cantidad_agua = markerElem.getAttribute('cantidad_agua');
    var numero_viajes = markerElem.getAttribute('numero_viajes');
    var nom_municipio = markerElem.getAttribute('nom_municipio');
    var contenido_f = '<b><center> DATOS FUENTE HÍDRICA </center></b>' + '<br><b>Codigo: </b>' + codigo + '<br><b>Usuario: </b>' + usuario + '<br><b>Nombre: </b>' + nombre + '<br><b>Tipo de fuente hidrica: </b>' + tipofuente + '<br><b>Fecha de la muestra: </b>' + fecha + '<br><b>ICA: </b>' + ica_c + '<br><b>Estado ICA: </b>'+ ica_e + '<br><b>IRCA: </b>' + irca_c + '<br><b>Estado IRCA: </b>'+ irca_e + '<b><br><br><center> Accesibilidad </center></b>' + '<br><b>Tipo de acceso: </b>' + tipoacceso + '<br><b>Tipo de viaje: </b>' + tiempo_viaje + '<br><b>Distancia a la Rancheria (Km): </b>' + distancia + '<br><b>Número de días que se busca agua: </b>' + dias_buscar_agua + '<br><b>Cantidad de Agua (Lt): </b>' + cantidad_agua + '<br><b>Número de viajes: </b>' + numero_viajes +'<br><br><b><center> Uso </center></b>' + '<br><b>Tipo de uso: </b>' + tipouso + '<br><br><b><center> Municipio </center></b>' + '<br><b>Municipio: </b>' + nom_municipio + '<br><br><button type="submit" style="text-align: center;" onclick="readRecordsFHM('+id+');" class="btn btn-primary center-block" href="#fuente_hidirica_mapa" data-toggle="modal"><i class="glyphicon glyphicon glyphicon-info-sign"></i> Más información</button>';
    var point = new google.maps.LatLng(
      parseFloat(markerElem.getAttribute('latitud_fh')),
      parseFloat(markerElem.getAttribute('longitud_fh')));
    var marker_f = new google.maps.Marker({
      map: map,
      position: point,
      category: tipofuente,
      animation: google.maps.Animation.DROP,
      icon: 'img/blue.png'
    });
    gmarkers_f.push(marker_f);
    google.maps.event.addListener(marker_f, 'click', (function(marker_f, tipofuente) {
      return function() {
        infoWindow.setContent(contenido_f);
        infoWindow.open(map, marker_f);
      }
    })(marker_f,tipofuente));
  });
});

 downloadUrl('http://93.188.162.196/WIN-TIG/php/generarXML.php', function(data) {
  var xml = data.responseXML;
  markers_r = xml.documentElement.getElementsByTagName('marker_r');
  Array.prototype.forEach.call(markers_r, function(markerElem) {
    var nombre = markerElem.getAttribute('nombre');
    var municipio = markerElem.getAttribute('municipio');
    var representante = markerElem.getAttribute('representante');
    var cantidad_personas = markerElem.getAttribute('cantidad_personas');
    var contenido_r = '<b> Rancheria: </b> '+ nombre + '<br><b>Representante: </b>'+ representante + '<br><b> Municipio: </b> '+ municipio + '<br><b>Cantidad Personas: </b>'+ cantidad_personas;
    var point = new google.maps.LatLng(
      parseFloat(markerElem.getAttribute('latitud')),
      parseFloat(markerElem.getAttribute('longitud')));
    var marker_r = new google.maps.Marker({
      map: map,
      position: point,
      category: municipio,
      animation: google.maps.Animation.DROP,
      icon: 'img/brown.png'

    });
    gmarkers_r.push(marker_r);
    google.maps.event.addListener(marker_r, 'click', (function(marker_r, municipio) {
      return function() {
        infoWindow.setContent(contenido_r);
        infoWindow.open(map,marker_r);
      }
    })(marker_r,municipio));
  });
});

 downloadUrl('http://93.188.162.196/WIN-TIG/php/generarXML.php', function(data) {
  var xml = data.responseXML;
  cod_f = xml.documentElement.getElementsByTagName('marker_f');
  nom_f = xml.documentElement.getElementsByTagName('marker_f');
  Array.prototype.forEach.call(cod_f, function(markerElem) {
    var codigo = markerElem.getAttribute('codigo');
    codigos_f.push(codigo);
  });
  Array.prototype.forEach.call(nom_f, function(markerElem) {
    var nombre = markerElem.getAttribute('nombre');
    nombres_f.push(nombre);
  });
  var elecciones = nombres_f.concat(codigos_f);
  $( "#b1" ).autocomplete({
    source: elecciones
  });
});


 var iconos = {
  fuente: {
    name: 'Fuente Hídrica',
    icon: 'img/blue16.png'
  },
  rancheria: {
    name: 'Ranchería',
    icon: 'img/brown16.png'
  },
  rojo: {
    name: 'ICA: Muy Mala - IRCA: Sanitariamente Inviable',
    icon: 'img/red16.png'
  },
  naranja: {
    name: 'ICA: Mala - IRCA: Riesgo Alto',
    icon: 'img/orange16.png'
  },
  amarillo: {
    name: 'ICA: Regular - IRCA: Riesgo Medio',
    icon: 'img/yellow16.png'
  },
  verde: {
    name: 'ICA: Aceptable - IRCA: Riesgo Bajo',
    icon: 'img/green16.png'
  },
  azul: {
    name: 'ICA: Buena - IRCA: Sin Riesgo',
    icon: 'img/blue_dark16.png'
  }
};

var legend = document.getElementById('leyenda');
for (var i in iconos) {
  var type = iconos[i];
  var name = type.name;
  var icon = type.icon;
  var div = document.createElement('div');
  div.innerHTML = '<img src="' + icon + '"> ' + name;
  legend.appendChild(div);
}
var log = document.createElement('div');
log.index = 0;
var logo = document.createElement('div');
logo.innerHTML = '<img src="img/LOGO.png" width="120PX" style="text-align: center; title="WIN-TIG"; max-width:100%; height:auto;>';
log.appendChild(logo);
map.controls[google.maps.ControlPosition.LEFT_TOP].push(log);
map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(legend);
}

function CenterControl(controlDiv, map) {

  var controlUI = document.createElement('div');
  controlUI.style.backgroundColor = '#fff';
  controlUI.style.border = '2px solid #fff';
  controlUI.style.borderRadius = '3px';
  controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
  controlUI.style.cursor = 'pointer';
  controlUI.style.marginBottom = '22px';
  controlUI.style.textAlign = 'center';
  controlUI.title = 'Click para centrar el mapa';
  controlDiv.appendChild(controlUI);
  var controlText = document.createElement('div');
  controlText.style.color = 'rgb(25,25,25)';
  controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
  controlText.style.fontSize = '16px';
  controlText.style.lineHeight = '38px';
  controlText.style.paddingLeft = '5px';
  controlText.style.paddingRight = '5px';
  controlText.innerHTML = 'Centrar Mapa';
  controlUI.appendChild(controlText);

  controlUI.addEventListener('click', function() {
    map.setCenter(guajira);
    map.setZoom(10);
  });

}

filtros_fuente_hidrica = function (tipofuente) {      
  for (i = 0; i<markers_f.length; i++) {
    marker_f = gmarkers_f[i];
    if (markers_f[i].getAttribute('tipofuente') == tipofuente) {
      marker_f.setVisible(true);  
    }
    else if (document.getElementById("pozo").checked==false && document.getElementById("jaguey").checked==false && document.getElementById("reservorio").checked==false) {
      marker_f.setVisible(true);
    }
    else {
      marker_f.setVisible(false);
    }
  }
}

filtros_ica = function (ica_e) {   
  for (i = 0; i<markers_f.length; i++) {
    marker_f = gmarkers_f[i];
    marker_f.setIcon('img/blue.png');
    if (markers_f[i].getAttribute('ica_e') == ica_e) {
      if (document.getElementById("muy_mala").checked==true && document.getElementById("mala").checked==false && document.getElementById("regular").checked==false && document.getElementById("aceptable").checked==false && document.getElementById("buena").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/red.png');
      }
      else if (document.getElementById("muy_mala").checked==false && document.getElementById("mala").checked==true && document.getElementById("regular").checked==false && document.getElementById("aceptable").checked==false && document.getElementById("buena").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/orange.png');

      }
      else if (document.getElementById("muy_mala").checked==false && document.getElementById("mala").checked==false && document.getElementById("regular").checked==true && document.getElementById("aceptable").checked==false && document.getElementById("buena").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/yellow.png');

      }
      else if (document.getElementById("muy_mala").checked==false && document.getElementById("mala").checked==false && document.getElementById("regular").checked==false && document.getElementById("aceptable").checked==true && document.getElementById("buena").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/green.png');

      }
      else if (document.getElementById("muy_mala").checked==false && document.getElementById("mala").checked==false && document.getElementById("regular").checked==false && document.getElementById("aceptable").checked==false && document.getElementById("buena").checked==true) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/blue_dark.png');
      }
    }        
    else if (document.getElementById("muy_mala").checked==false && document.getElementById("mala").checked==false && document.getElementById("regular").checked==false && document.getElementById("aceptable").checked==false && document.getElementById("buena").checked==false) {
      marker_f.setVisible(true);
    }
    else {
      marker_f.setVisible(false);
    }
  }
}

filtros_irca = function (irca_e) {      
  for (i = 0; i<markers_f.length; i++) {
    marker_f = gmarkers_f[i];
    marker_f.setIcon('img/blue.png');
    if (markers_f[i].getAttribute('irca_e') == irca_e) {
      if (document.getElementById("sin_riesgo").checked==true && document.getElementById("riesgo_bajo").checked==false && document.getElementById("riesgo_medio").checked==false && document.getElementById("riesgo_alto").checked==false && document.getElementById("inviable").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/blue_dark.png');
      }
      else if (document.getElementById("sin_riesgo").checked==false && document.getElementById("riesgo_bajo").checked==true && document.getElementById("riesgo_medio").checked==false && document.getElementById("riesgo_alto").checked==false && document.getElementById("inviable").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/green.png');
      }
      else if (document.getElementById("sin_riesgo").checked==false && document.getElementById("riesgo_bajo").checked==false && document.getElementById("riesgo_medio").checked==true && document.getElementById("riesgo_alto").checked==false && document.getElementById("inviable").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/yellow.png');
      }
      else if (document.getElementById("sin_riesgo").checked==false && document.getElementById("riesgo_bajo").checked==false && document.getElementById("riesgo_medio").checked==false && document.getElementById("riesgo_alto").checked==true && document.getElementById("inviable").checked==false) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/orange.png');
      }
      else if (document.getElementById("sin_riesgo").checked==false && document.getElementById("riesgo_bajo").checked==false && document.getElementById("riesgo_medio").checked==false && document.getElementById("riesgo_alto").checked==false && document.getElementById("inviable").checked==true) {
        marker_f.setVisible(true);
        marker_f.setIcon('img/red.png');
      }
    }
    else if (document.getElementById("sin_riesgo").checked==false && document.getElementById("riesgo_bajo").checked==false && document.getElementById("riesgo_medio").checked==false && document.getElementById("riesgo_alto").checked==false && document.getElementById("inviable").checked==false) {
      marker_f.setVisible(true);
    }
    else {
      marker_f.setVisible(false);
    }
  }
}

filtros_municipio_rancheria = function (municipio) {
  for (j = 0; j<markers_r.length; j++) {
    marker_r = gmarkers_r[j];
    if (markers_r[j].getAttribute('municipio') == municipio) {
      marker_r.setVisible(true);  
    }
    else if (document.getElementById("manaure").checked==false && document.getElementById("maicao").checked==false) {
      marker_r.setVisible(true);
    }
    else {
      marker_r.setVisible(false);
    }
  }
}

filtros_municipio_fuente = function (nom_municipio) {
  for (j = 0; j<markers_f.length; j++) {
    marker_f = gmarkers_f[j];
    if (markers_f[j].getAttribute('nom_municipio') == nom_municipio) {
      marker_f.setVisible(true);  
    }
    else if (document.getElementById("manaure_f").checked==false && document.getElementById("maicao_f").checked==false) {
      marker_f.setVisible(true);
    }
    else {
      marker_f.setVisible(false);
    }
  }
}

function downloadUrl(url, callback) {
  var request = window.ActiveXObject ?
  new ActiveXObject('Microsoft.XMLHTTP') :
  new XMLHttpRequest;

  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      request.onreadystatechange = doNothing;
      callback(request, request.status);
    }
  };

  request.open('GET', url, true);
  request.send(null);
}

filterMarkers = function (category) {
  for (i = 0; i < markers1.length; i++) {
    marker = gmarkers1[i];
    if (marker.category == category || category.length === 0) {
      marker.setVisible(true);
    }
    else {
      marker.setVisible(false);
    }
  }
}

filtro_busqueda = function () {

  for (i = 0; i<markers_f.length; i++) {
    marker_f = gmarkers_f[i];
    if (markers_f[i].getAttribute('nombre') == document.getElementById("b1").value || markers_f[i].getAttribute('codigo') == document.getElementById("b1").value || document.getElementById("b1").value == '' ) {
      marker_f.setVisible(true);
    }
    else {
      marker_f.setVisible(false);
    }
  }
  document.getElementById("b1").value="";
}

google.maps.event.addDomListener(window, "resize", function() {
  var center = map.getCenter();
  google.maps.event.trigger(map, "resize");
  map.setCenter(center);
});

function doNothing() {
}

google.maps.event.addDomListener(window, 'load', initMap);
});