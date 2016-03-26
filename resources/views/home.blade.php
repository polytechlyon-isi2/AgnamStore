@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($types as $type)
                @include('product.products', ['type'=>$type,'products'=> $type->getFourLastProduct()])
            @endforeach
        </div>
    </div>
@endsection
