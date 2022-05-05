@extends('template')
@section('contenu')
<BR>
<p>hello</p>
<div class="col-sm-offset-3 col-sm-6">
    <div class="panel panel-info">
        <div class="panel-heading">Ajout d'une consommation</div>
        <div class="panel-body">
            <form method="POST" action="/consommations/{{$etablissementId}}" accept-charset="UTF-8">
            @csrf
            <div class="form-group {!! $errors->has('nom') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Nom" name="nom" type="text">
                {!! $errors->first('nom', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="description" name="description" cols="50" rows="10" type="text"></input>
                {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('categorie') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Catégorie" name="categorie" cols="50" rows="10" type="text"></input>
                {!! $errors->first('categorie', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('prix') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Prix en CHF" name="prix" type="number" step="0.01"></input>
                {!! $errors->first('prix', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('tags') ? 'has-error' : '' !!}">
                <input class="form-control" placeholder="Tags" name="tags" cols="50" rows="10" type="text"></input>
                {!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('etablissement_id') ? 'has-error' : '' !!}">
                <input style="display:none"  class="form-control" placeholder="Etablissement id" value="{{$etablissementId}}" name="etablissement_id" type="number"></input>
                {!! $errors->first('etablissement_id', '<small class="help-block">:message</small>') !!}
            </div>
            <div  class="form-group {!! $errors->has('image_url') ? 'has-error' : '' !!}">
                <input style="display:none" class="form-control"  placeHolder="imagepng" value="imagepng" name="image_url" type="text"></input>
                {!! $errors->first('image_url', '<small class="help-block">:message</small>') !!}
            </div>
            <input class="btn btn-info pull-right" type="submit" value="Envoyer">
            </form>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span>Retour</a>
</div>
@endsection