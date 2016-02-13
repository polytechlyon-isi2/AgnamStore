@extends('user.settings')

@section('settingTittle','Mot de passe')

@section('form')
    {!!  Form::model($user,['method' => 'put'])!!}
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

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-user"></i>Valider
            </button>
        </div>
    </div>
    {!!  Form::close()!!}

@endsection