@extends('template')


@section('header')
@if(Auth::check())
<div class="btn-group pull-right">
<a href='{{route("consommations.create", ["etablissementId" =>
        $consommations[0]->etablissement_id
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
{!!$links!!}
@foreach($consommations as $consommation)
<article class="row bg-primary">
    <div class="col-md-12">
        <header>
            <h1>{{$consommation->nom}}</h1>
        </header>
        <hr>
        <section>        'nom','description','image_url','categorie','prix','tags','etablissement_id'
            <br/>
            <p>{{$consommation->description}}</p>
            <img src="{{$consommation->image_url}}"/>
            <p style="color:green">{{$consommation->categorie}}</p>
            <section>
                <p>Prix: {{$consommation->prix}}</p>
                <div class="pull-right">            
                    <p>{{$consommation->tags}}</a>
                </div>
                @if ((Auth::check() && Auth::user()->gerant) || (Auth::check() && Auth::user()->admin))
                <form method="POST" action="{{route('consommations.destroy', [$consommation->id])}}" accept-charset="UTF-8">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer cette consommation ?')" type="submit" value="Supprimer cette consommation">
                </form>
                @endif
            </section>
        </section>
    </div>
</article>
<br>
@endforeach
{!! $links !!}


<p>coucou</p>
@endsection