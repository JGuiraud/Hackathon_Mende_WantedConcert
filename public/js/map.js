var map = L.map('map').setView([44.5179943, 3.5020318], 15);
var mapElement = document.getElementById("map");
var state = "move";
var placeBtn = document.getElementById("place");
var rect = null;
var pressed = false;

map.bounds = [];
map.setMaxBounds([
    [42.277309, 2.60376],
    [48.502048, -5.152588],
    [51.069017, 2.625732],
    [48.908059, 8.294678]
]);
function toggleState() {
    if (state == "move") {
        state = "place";
        if (rect != null) {
            map.removeLayer(rect);
            rect = null;
        }
        mapElement.style.cursor = "crosshair";
        map.dragging.disable();
    } else {
        state = "move";
        mapElement.style.cursor = "grab";
        map.dragging.enable();
    }
}


placeBtn.addEventListener("click", toggleState);

map.on('mousedown', function (e) {
    if (state == "place") {
        pressed = true;
        coordsA = [e.latlng.lat, e.latlng.lng];
        rect = L.rectangle([coordsA, coordsA], { color: "#ff7800", weight: 1 }).addTo(map);
    }
});

map.on('mousemove', function (e) {
    if (state == "place" && pressed) {
        intermediateCoords = [e.latlng.lat, e.latlng.lng];
        map.removeLayer(rect);
        rect = L.rectangle([coordsA, intermediateCoords], { color: "#ff7800", weight: 1 }).addTo(map);
    }
})

map.on('mouseup', function (e) {
    if (state == "place") {
        coordsB = [e.latlng.lat, e.latlng.lng];
        toggleState();
        map.removeLayer(rect)
        rect = L.rectangle([coordsA, coordsB], { color: "#ff7800", weight: 1 }).addTo(map);
        pressed = false;
    }
})

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    minZoom: 7,
    maxZoom: 19,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);