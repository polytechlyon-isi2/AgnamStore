<div class="cadre-header">
    @if(isset($type) && $type)
        <div class="page-header text-center">
            <h2>Liste des {{ $type->label }}s</h2>
        </div>
    @endif
    <div class="container-fluid">
        @if($products )
            @foreach($products as $product)
                <div class="col-sm-4 col-md-3">
                    <div class="thumbnail-agnam">
                        <a href="{{ route ('showProductDetails', $product->id) }} "><img class="item-img"
                                                                 src="/images/produit/{{ $product->image }}"
                                                                 title="{{ $product->name }}"/></a>
                        <div class="caption">
                            <div class="item-tile">
                                <h4>{{ $product->name }}</h4>
                            </div>
                            <div class="row">
                                <div class="col-sm-5"><a class="btn btn-agnam"
                                                         href="{{ route('showProductDetails', $product->id) }}">Détail</a></div>
                                <a class="btn btn-warning"
                                   href="{{ route('user.cart.add',$product->id)}}">{{ $product->price }} € <span
                                            class="glyphicon glyphicon-shopping-cart"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">Aucun produit trouvé pour cette catégorie.</div>
        @endif
    </div>
</div>