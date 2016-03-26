{!!  Form::model($product,['method' => $type])!!}
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name','Nom du produit') !!}
    {!! Form::text('name',null,['class' => 'form-control']) !!}
    @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description','Description') !!}
    {!! Form::textarea('description',null,['class' => 'form-control']) !!}
    @if ($errors->has('description'))
        <span class="help-block">
            <strong>{{ $errors->first('description') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
    {!! Form::label('price','Prix ') !!}
    {!! Form::number('price',null,['class' => 'form-control']) !!}
    @if ($errors->has('price'))
        <span class="help-block">
            <strong>{{ $errors->first('price') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('year') ? ' has-error' : '' }}">
    {!! Form::label('year','Année de publication ') !!}
    {!! Form::number('year',null,['class' => 'form-control']) !!}
    @if ($errors->has('year'))
        <span class="help-block">
            <strong>{{ $errors->first('year') }}</strong>
        </span>
    @endif
</div>

<div class="form-group {{ $errors->has('author') ? ' has-error' : '' }}">
    {!! Form::label('author','Auteur') !!}
    {!! Form::text('author',null,['class' => 'form-control']) !!}
    @if ($errors->has('author'))
        <span class="help-block">
            <strong>{{ $errors->first('author') }}</strong>
        </span>
    @endif
</div>
<div class="form-group {{ $errors->has('image') ? ' has-error' : '' }}">
    {!! Form::label('image','Image') !!}
    {!! Form::text('image',null,['class' => 'form-control']) !!}
    @if ($errors->has('author'))
        <span class="help-block">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-btn fa-user"></i>Valider
        </button>
    </div>
</div>
{!!  Form::close()!!}