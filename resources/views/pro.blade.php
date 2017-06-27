@extends('layouts.app')

@section('content')
<div class="container-formulaire">
{{-- <div class="tests"> --}}
    <form method="POST" action="{{ route('postDispo') }}"
    class="col-md-10 col-md-offset-1">
        {{ csrf_field() }}

        <div class="partform col-md-4 col-xs-12 form-group selectContainer">
            <label class="labelform" for="">Type de bien : </label>

            <select class="selectPro form-control" name="type" id="">
                <option value="terrain" selected>Terrain</option>
                <option value="batiment">Bâtiment</option>
            </select>
        </div>

        <div class="partform col-md-4 col-xs-12">
            <label class="labelform" for="">Superficie en m² : </label>

            <input name="superficie" type="text" value="2000" class="form-check-input">
        </div>

        <div class="partform col-md-4 col-xs-12">
            <label class="labelform" for="">Ville : </label>

            <input type="text" name="ville" value="Mende" id="inputtest" class="form-check-input">
        </div>

        <input type="text" name="latVille" type="" hidden value="44.51667">
        <input type="text" name="lonVille" type="" hidden value="3.5">
        <input type="text" name="latA" type="" hidden value="44.51611234843277">
        <input type="text" name="lonA" type="" hidden value="3.5019457340240483">
        <input type="text" name="latB" type="" hidden value="44.51558830517571">
        <input type="text" name="lonB" type="" hidden value="3.502771854400635">

        <div class="containerButton">
            <a class="buttonpro col-md-4" type="button" href='#map'>Suite</a>
        </div>


        </div>
            <div class="containerMap" id="map">
        </div>

        <div class="buttondiv">
            <button id="place">Selectionner une zone</button>
        </div>


        <div class="container-buttonsend">

            <div class="footer">
                <button type="submit" class='boutonenvoyer'>Ajouter mon bien</button>
            </div>

        </div>

    </form>
</div>
@endsection

@section('extra-script')
    <script src="{{ asset('js/map.js') }}"></script>
@endsection
