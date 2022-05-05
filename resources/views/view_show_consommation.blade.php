@extends('template')


@section('header')
@if(Auth::check())
<div class="btn-group pull-right">
    <a href='{{route("consommations.create", ["etablissementId" =>
        $consommation->etablissement_id
        ])}}' class='btn btn-info'>Cr&eacute;er un consommation</a>
    <a href='{{url("logout")}}' class='btn btn-warning'>Deconnexion</a>
</div>
@else
<a href='{{url("login")}}' class='btn btn-info pull-right'>Se connecter</a>
@endif
@endsection

@section('contenu')
@if(isset($info))
<div class='row alert alert-info'> {{$info}}</div>
@endif
<article class="row bg-primary">
    <div class="col-md-12">
        <header>
            <h1>{{$consommation->nom}}</h1>
        </header>
        <br />
        <p>{{$consommation->description}}</p>
        <img src="{{$consommation->image_url}}" />
        <p style="color:green">{{$consommation->categorie}}</p>
        <section>
            <p>Prix: {{$consommation->prix}}</p>
            <div class="pull-right">
                <p>{{$consommation->tags}}</a>
            </div>
            <a href="{{route('consommations.edit', [$consommation->id])}}" class="btn btn-warning btn-block">Modifier</a>
            @if ((Auth::check() && Auth::user()->gerant) || (Auth::check() && Auth::user()->admin))
            <form method="POST" action="{{route('consommations.destroy', [$consommation->id])}}" accept-charset="UTF-8">
                @csrf
                @method('DELETE')
                <input class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer cette consommation ?')"
                    type="submit" value="Supprimer cette consommation">
            </form>
            @endif
        </section>
        </section>
    </div>
</article>
<br>


<p>coucou</p>
@endsection