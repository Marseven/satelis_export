@extends('layouts.default')

@section('content')
    <h1 class="display-5 animated fadeIn mb-4">Exporter <span class="text-primary">Le Fichier Consolidé</span></h1>
    <a href="{{route('download')}}" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Télécharger</a>
@endsection
