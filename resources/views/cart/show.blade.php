@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!$cart->isEmpty())
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix total</th>
                </tr>
                </thead>
                <tbody>
                <?php $sum = 0 ?>
                @foreach($cart as $item)
                    <?php $price = $item->product->price * $item->quantity ?>
                    <?php $sum += $price ?>
                    <tr>
                        <td><a href="{{ route('showProductDetails', $item->product->id) }}">{{$item->product->name }}</a></td>
                        <td><a href="{{route('user.cart.remove',$item->product->id)}}" class="btn btn-xs btn-info">-</a><span class="label label-primary">{{ $item->quantity }}</span><a href="{{route('user.cart.add',$item->product->id)}}" class="btn btn-xs btn-info">+</a></td>
                        <td>{{ $item->product->price }}</td>
                        <td>{{ $price }}</td>
                        <td>
                            <a href="{{route('user.cart.del',$item->product->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total : </td>
                        <td>{{$sum}}</td>
                    </tr>
                </tfoot>
            </table>
        @else
            <p>Aucun produit dans le panier </p>
        @endif
    </div>
@endsection