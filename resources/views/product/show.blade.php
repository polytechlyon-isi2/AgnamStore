@extends('layouts.app')

@section('content')
    @if($product)
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <h2>{{ $product->name }}</h2>
            </div>
            <div class="container-fluid">
                <div class="col-sm-3">
                    <img class="img-thumbnail" src="/images/produit/{{ $product->image }}" title="{{ $product->name }}"/>
                </div>
                <div class="col-sm-9 panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="page-item">
                                    <h4>Information Générale</h4>
                                    <ul class="list-unstyled">
                                        <li>Auteur : {{ $product->author }}</li>
                                        <li>Année : {{ $product->year }}</li>
                                        <li>Genre : TEXTE</li>
                                    </ul>
                                    <br/>
                                    <h4>Description</h4>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <br/>
                            <!-- <a class="btn btn-agnam" href="/items/type={{ $product->type_id }}" >Retour </a>  FORMAT SANT JS-->
                            <a class="btn btn-agnam" href="javascript:history.go(-1)">Retour </a>
                            <a class="btn btn-warning" href="{{ route('user.cart.add',$product->id)}}">{{ $product->price }} € <span
                                        class="glyphicon glyphicon-shopping-cart"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection