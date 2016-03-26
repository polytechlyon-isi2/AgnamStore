@extends('layouts.admin')
@section('content')
    {{Form::model($user)}}
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        {!! Form::label('name','Pseudo') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
        @if ($errors->has('name'))
            <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('email','Email') !!}
        {!! Form::text('email',null,['class' => 'form-control']) !!}
        @if ($errors->has('email'))
            <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
        {!! Form::label('password','Mot de passe') !!}
        {!! Form::password('password',['class' => 'form-control']) !!}
        @if ($errors->has('password'))
            <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
        {!! Form::label('password_confirmation','Confirmation mot de passe') !!}
        {!! Form::password('password_confirmation',['class' => 'form-control']) !!}
        @if ($errors->has('password_confirmation'))
            <span class="help-block">
            <strong>{{ $errors->first('password_confirmation') }}</strong>
        </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
        {!! Form::label('role','Rôle') !!}
        {!! Form::select('role', array('ROLE_USER' => 'Utilisateur', 'ROLE_ADMIN' => 'Administrateur'), 'ROLE_USER',['class' => 'form-control']) !!}
        @if ($errors->has('role'))
            <span class="help-block">
            <strong>{{ $errors->first('role') }}</strong>
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

    {{Form::close()}}
@endsection
