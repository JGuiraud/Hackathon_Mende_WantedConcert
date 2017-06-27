@extends('layouts.app')

@section('content')

<div class="container container-user">
    <div class="row">
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                Lieux <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="#">Mende</a></li>
                <li><a href="#">Badaroux</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <h4>Liste des emplacements disponnibles</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="text-align:center;">Infos</th>
                    <th>Type d'emplacement</th>
                    <th>Superficie</th>
                    <th>Localité</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dispos as $dispo)
                <tr>
                    <td style="text-align:center;"><a href="/user/{{$dispo->id}}" target="_blank"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
                    <td>{{ $dispo->type }}</td>
                    <td>{{ $dispo->superficie }}</td>
                    <td>{{ $dispo->ville }}</td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
