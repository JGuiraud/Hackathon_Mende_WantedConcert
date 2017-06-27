var map = L.map('map', {zoomControl: false}).setView([44.5179943, 3.5020318], 14);
map.dragging.disable();
map.doubleClickZoom.disable();

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    minZoom: 14,
    maxZoom: 14,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


L.circle([{{ $dispo->latA }}, {{ $dispo->lonA }} ], { radius: 1000 }).addTo(map);
