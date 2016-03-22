
{!!  Form::open(['method' => 'put'])!!}
<div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
    {!! Form::label('role','Rôle') !!}
    {!! Form::select('role', array('ROLE_USER' => 'Utilisateur', 'ROLE_ADMIN' => 'Administrateur'), $user->role,['class' => 'form-control']) !!}
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
{!!  Form::close()!!}

