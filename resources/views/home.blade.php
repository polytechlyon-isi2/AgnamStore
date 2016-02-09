@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($types as $type)
                @include('item.items', ['type'=>$type,'products'=> $type->products])
            @endforeach
        </div>
    </div>
@endsection
