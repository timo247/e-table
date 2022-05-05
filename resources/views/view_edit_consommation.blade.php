@extends('template')

@section('contenu')
<br>
<div class="col-sm-offset-4 col-sm-4">
    <div class="panel panel-primary">
        <div class="panel-heading">Modification d'une consommation</div>
        <div class="panel-body">
            <div class="col-sm-12">
                <form method="POST" action="{{route('consommations.update', [$consommation->id])}}" accept-charset="UTF-8" class="form-horizontalpanel">
                    @csrf
                    @method('PUT')
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        <input type="text" name="nom" value="{{$consommation->nom}}" placeholder="{{$consommation->nom}}" class="form-control">  
                        {!! $errors->first('name', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('description') ? 'has-error' : '' !!}">
                        <input type="text" name="description" value="{{$consommation->description}}" placeholder="Description" class="form-control">  
                        {!! $errors->first('description', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        <input type="text" name="categorie" value="{{$consommation->categorie}}" placeholder="Catégorie" class="form-control">  
                        {!! $errors->first('categorie', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('prix') ? 'has-error' : '' !!}">
                        <input type="number" name="prix" value="{{$consommation->prix}}" placeholder="Prix" class="form-control">  
                        {!! $errors->first('prix', '<small class="help-block">:message</small>') !!}
                    </div>
                    <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                        <input type="text" name="tags" value="{{$consommation->tags}}" placeholder="Tags" class="form-control">  
                        {!! $errors->first('tags', '<small class="help-block">:message</small>') !!}
                    </div>
                    <input class="btn btn-primary pull-right" type="submit" value="Envoyer">
                </form>
            </div>
        </div>
    </div>
    <a href="javascript:history.back()" class="btn btn-primary">
        <span class="glyphicon glyphicon-circle-arrow-left"></span>Retour
    </a>
</div>
@endsection