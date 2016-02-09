@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($types as $type)
                @include('product.products', ['type'=>$type,'products'=> $type->products])
            @endforeach
        </div>
    </div>
@endsection
