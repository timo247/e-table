@extends('template')

@section('contenu')
@foreach ($etablissements as $etablissement)
<BR>
<a href="/consommations/{{ $etablissement->id }}">{{$etablissement->nom}}</a>
@endforeach
@endsection
