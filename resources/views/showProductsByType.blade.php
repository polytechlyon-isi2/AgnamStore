@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                @include('product.products', ['type'=>$type,'products'=> $type->products])
        </div>
    </div>
@endsection