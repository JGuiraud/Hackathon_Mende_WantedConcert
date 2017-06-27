@extends('layouts.app')

@section('content')
<div class="container-formulaire">


    <form method="post" action="{{ route('postDispo') }}" class="col-md-10 col-md-offset-1">
        {{ csrf_field() }}

        <div class="partform col-md-4 col-xs-12">
            <label for="">Type de bien : </label>
            <br>
            <select class="selectPro form-check-input" name="type" id="">
                <option value="terrain" selected>Terrain</option>
                <option value="batiment">Batiment</option>
            </select>
        </div>

        <div class="partform col-md-4 col-xs-12">
            <label for="">Superficie en m² : </label>
            <br>
            <input name="superficie" type="text" value="2000" class="form-check-input">
        </div>

        <div class="partform col-md-4 col-xs-12">
            <label for="">Lieu : </label>
            <br>
            <input type="text" name="lieu" value="Mende" class="form-check-input">
        </div>

        <button class="buttonpro col-md-4 col-md-offset-4" href='#map'>Suite</button>

    </form>


</div>
@endsection
