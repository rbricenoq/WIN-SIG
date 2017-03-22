var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 11.501007, lng: -72.549250},
		zoom: 8
	});
}