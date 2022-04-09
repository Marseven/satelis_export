@extends('layouts.default')

@section('content')
    <h1 class="display-5 animated fadeIn mb-4">Importez un ou plusieurs <span class="text-primary">Fichiers</span></h1>
    <div class="position-relative" style="max-width: 400px;">
        <form method="post" action="{{route('import')}}" enctype="multipart/form-data">
            @csrf
            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" name="fichier[]" type="file" placeholder="Votre Fichier" multiple accept="csv/*">
            <button type="submit" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Importer</button>
        </form>
    </div>
@endsection
