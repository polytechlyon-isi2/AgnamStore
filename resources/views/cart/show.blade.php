@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!$cart->isEmpty())
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Prix</th>
                </tr>
                </thead>
                <tbody>
                <?php $sum = 0 ?>
                @foreach($cart as $item)
                    <?php $sum += $item->product->price ?>
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->price }}</td>
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