@extends('template')

@section('contenu')
<BR>
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel panel-info">
        <div class="panel-heading">Ajout d'un voiture</div>
        <div class="panel-body">
            <form method="POST" action="{{route('voitures.store')}}" accept-charset="UTF-8">
            @csrf
            <div class="form-group {!! $errors->has('marque') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Marque" name="marque" type="text">
                {!! $errors->first('marque', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Type" name="type" cols="50" rows="10" type="text"></input>
                {!! $errors->first('type', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Couleur" name="couleur" cols="50" rows="10" type="text"></input>
                {!! $errors->first('couleur', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('type') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Cylindree" name="cylindree" cols="50" rows="10" type="number"></input>
                {!! $errors->first('cylindree', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('motcles') ? 'has-error' :
'' !!}">
<input class="form-control" placeholder="Entrez les accessoires 
spérarés par des virgules (pas d'espaces)" name="accessoires" type="text">
{!! $errors->first('accessoires', '<small class="helpblock">:
message</small>') !!}
</div>
            <input class="btn btn-info pull-right" type="submit" value="Envoyer">
            </form>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span>Retour</a>
</div>
@endsection