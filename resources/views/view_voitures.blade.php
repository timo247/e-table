@extends('template')

@section('header')
@if(Auth::check())
<div class="btn-group pull-right">
    <a href='{{route("voitures.create")}}' class='btn btn-info'>Cr&eacute;er un voiture</a>
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
@foreach($voitures as $voiture)
<article class="row bg-primary">
    <div class="col-md-12">
        <header>
            <h1>{{$voiture->marque}}</h1>
        </header>
        <hr>
        <section>
            <p>{{$voiture->type}}</p>
            <p>{{$voiture->couleur}}</p>
            <p>{{$voiture->cylindree}}</p>
            <section>
                <p>appartient à {{$voiture->user->name}}</p>
                <div class="pull-right">
                    @foreach($voiture->accessoires as $accessoire)
                    <a href="{{url('voitures/accessoire', [$accessoire->type_url])}}" class="btn btn-xs btn-info">{{$accessoire->type}}</a>
                    @endforeach
                </div>
                @if ((Auth::check() && Auth::user()->admin) || (Auth::check() && Auth::user()->name == $voiture->user->name))
                <form method="POST" action="{{route('voitures.destroy', [$voiture->id])}}" accept-charset="UTF-8">
                    @csrf
                    @method('DELETE')
                    <input class="btn btn-danger btn-xs" onclick="return confirm('Vraiment supprimer cette voiture ?')" type="submit" value="Supprimer cette voiture">
                </form>
                @endif
            </section>
            <em class="pull-right">
                <span class="gliphicon glyphicon-pencil"></span>
                {{$voiture->user->name}} le {!! $voiture->created_at->format('d-m-Y') !!}
            </em>
        </section>
    </div>
</article>
<br>
@endforeach
{!! $links !!}
@endsection