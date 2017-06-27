@extends('layouts.app')

@section('content')
<div class="container-formulaire">
{{-- <div class="tests"> --}}
    <form method="post" action="{{ route('postDispo') }}" class="col-md-10 col-md-offset-1">
        {{ csrf_field() }}

        <div class="partform col-md-4 col-xs-12 form-group selectContainer">
            <label class="labelform" for="">Type de bien : </label>
            <br>
            <select class="selectPro form-control" name="type" id="">
                <option value="terrain" selected>Terrain</option>
                <option value="batiment">Batiment</option>
            </select>
        </div>

        <div class="partform col-md-4 col-xs-12">
            <label class="labelform" for="">Superficie en m² : </label>
            <br>
            <input name="superficie" type="text" value="2000" class="form-check-input">
        </div>

        <div class="partform col-md-4 col-xs-12">
            <label class="labelform" for="">Lieu : </label>
            <br>
            <input type="text" name="lieu" value="Mende" id="inputtest" class="form-check-input">
        </div>

        <div class="containerButton">
            <a class="buttonpro col-md-4" type="button" href='#map'>Suite</a>
        </div>

    </form>
{{-- </div> --}}

</div>

<div class="containerMap" id="map">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<div class="container-buttonsend">

    <div class="footer">
        <button class='boutonenvoyer'>Envoyer</button>
    </div>

</div>


@endsection
