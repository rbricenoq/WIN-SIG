var map;
var marker;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 11.910625, lng: -72.009213},
		zoom: 10		
	});
	marker = new google.maps.Marker({
		position: {lat: 11.801717, lng: -71.966775},
		title:"Hello World!"
	});
}

