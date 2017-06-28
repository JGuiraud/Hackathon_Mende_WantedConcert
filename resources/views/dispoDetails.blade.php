@extends('layouts.app')

@section('content')

<div class="container container-user">
    <div class="infodetail">
        <label>Type d'emplacement</label><br>
        <p>{{ $dispo->type }}</p>
        <label>Superficie</label><br>
        <p>{{ $dispo->superficie }}</p>
        <label>Localité</label><br>
        <p>{{ $dispo->ville }}</p>
    </div>
    <div class="map2 col-xs-12">
        <div id="map" class="map2" ></div>
    </div>
</div>
@endsection
@section('extra-scripts')
<script type="text/javascript">
var map = L.map('map', {zoomControl: false}).setView([{{ $dispo->latA }}, {{ $dispo->lonA }}], 14);
map.dragging.disable();
map.doubleClickZoom.disable();

L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
    minZoom: 14,
    maxZoom: 14,
    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


L.circle([{{ $dispo->latA }}, {{ $dispo->lonA }} ], { radius: 500 }).addTo(map);
</script>
@endsection
