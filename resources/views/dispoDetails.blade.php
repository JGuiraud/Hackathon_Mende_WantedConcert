@extends('layouts.app')

@section('content')
<div class="container container-user">
    <div class="col-md-5 col-md-offset-1">
        <label>Type d'emplacement</label><br>
        <p>{{ $dispo->type }}</p>
        <label>Superficie</label><br>
        <p>{{ $dispo->superficie }}</p>
        <label>Localité</label><br>
        <p>{{ $dispo->ville }}</p>
    </div>
    <div class="col-md-6">
        <div id="map" class="containerMap" ></div>
    </div>
</div>
@endsection
@section('extra-scripts')
<script type="text/javascript">
var map = L.map('map', {zoomControl: false}).setView([44.5179943, 3.5020318], 14);
map.dragging.disable();
map.doubleClickZoom.disable();

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    minZoom: 14,
    maxZoom: 14,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


L.circle([{{ $dispo->latA }}, {{ $dispo->lonA }} ], { radius: 1000 }).addTo(map);
</script>
@endsection
