@extends("layouts.admin")

@section('content')

    <div class="col-lg-12">
        <h2>Produit <a href="{{route('admin.product.add')}}" class="btn btn-success"><i class="fa fa-plus"></i> Ajouter</a></h2>
        <div class="table-responsive">
            @if($products)
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Auteur</th>
                        <th>Type</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->author }}</td>
                            <td>{{ $product->type->label }}</td>
                            <td>
                                <a href="{{route('admin.product.update',$product->id)}}" class="btn btn-info btn-xs" title="Edit"><span class="glyphicon glyphicon-edit"></span></a>
                                <button type="button" class="btn btn-danger btn-xs" title="Delete" data-toggle="modal" data-target="#userDialog{{ $product->id }}"><span class="glyphicon glyphicon-remove"></span>
                                </button>
                                <div class="modal fade" id="userDialog{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Confirmation nécessaire</h4>
                                            </div>
                                            <div class="modal-body">
                                                Souhaitez-vous réellement supprimé cet utilisateur ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <a href="{{route('admin.product.del',$product->id)}}" class="btn btn-danger">Confirmer</a>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>Aucun produit trouvé </p>
            @endif
        </div>
    </div>
    </div>

@stop