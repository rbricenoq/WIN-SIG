var baseLayer = new ol.layer.Group({
    'title': '',
    layers: [
new ol.layer.Tile({
    'title': 'OSM',
    'type': 'base',
    source: new ol.source.OSM()
})
]
});
var format_ubicacion0 = new ol.format.GeoJSON();
var features_ubicacion0 = format_ubicacion0.readFeatures(json_ubicacion0, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_ubicacion0 = new ol.source.Vector({
    attributions: [new ol.Attribution({html: '<a href=""></a>'})],
});
jsonSource_ubicacion0.addFeatures(features_ubicacion0);var lyr_ubicacion0 = new ol.layer.Vector({
                source:jsonSource_ubicacion0, 
                style: style_ubicacion0,
                title: "ubicacion"
            });

lyr_ubicacion0.setVisible(true);
var layersList = [baseLayer,lyr_ubicacion0];
lyr_ubicacion0.set('fieldAliases', {'id_ubicacion': 'id_ubicacion', 'id_municipio': 'id_municipio', 'nombre': 'Nombre', 'tipo': 'Tipo de Fuente', 'Parametros_hidraulicos': 'Parámetros Hidráulicos', 'area_superficial': 'Área superficial (Km2)', });
lyr_ubicacion0.set('fieldImages', {'id_ubicacion': 'Hidden', 'id_municipio': 'Hidden', 'nombre': 'TextEdit', 'tipo': 'TextEdit', 'Parametros_hidraulicos': 'TextEdit', 'area_superficial': 'TextEdit', });
lyr_ubicacion0.set('fieldLabels', {'nombre': 'header label', 'tipo': 'header label', 'Parametros_hidraulicos': 'header label', 'area_superficial': 'header label', });
lyr_ubicacion0.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});