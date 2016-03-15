@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Paramétre : @yield('settingTittle')</div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <ul class="nav nav-pills nav-stacked">
                                <li role="presentation" class="@if($settingsMenu == 1)active @endif"><a href="{{route('user.profile')}}">Profil</a></li>
                                <li role="presentation" class="@if($settingsMenu == 2)active @endif"><a href="{{route('user.password')}}">Mot de passe</a></li>
                                <li role="presentation" class="@if($settingsMenu == 2)active @endif"><a href="{{route('user.password')}}">Role</a></li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                        @yield('form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
