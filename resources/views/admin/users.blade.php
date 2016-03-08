@extends("layouts.admin")

@section('content')

    <div class="col-lg-12">
        <h2>Utilisateur</h2>
        <div class="table-responsive">
            @if($users)
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>boutton</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <p>Aucun utilisateur trouvé </p>
            @endif
        </div>
    </div>
    </div>

@stop