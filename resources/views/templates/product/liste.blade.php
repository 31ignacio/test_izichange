@extends('layouts.master2')

@section('content')


<section class="content">

  <div class="col-lg-8 col-md-10 mx-auto shadow rounded p-3">
    <h3 class="text-muted text-center"> Liste des produits</b></h3>
</div>

    <div class="container-fluid">

 
      <div class="row">
        <div class="col-12">

          <a href="{{ route ('product.new')}}" class="btn btn-sm bg-gradient-primary"><i class="fas fa-plus-circle"></i> Ajouter</a><br><br>

           
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                  @if (Session::get('success_message'))
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                          {{ Session::get('success_message') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true" style="font-size: 30px;">&times;</span>
                          </button>
                      </div>
                  @endif
              </div>
              <div class="col-md-2"></div>
          </div>
          
          <div class="card">
            
            <!-- /.card-header -->
             <div class="card-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Produit</th>
                  <th>Prix hors taxe</th>
                  <th>Crée le</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)

                <tr>
                  <td>{{ $product->name }} </td>
                  <td>{{ $product->priceHt }}</td>
                  <td>{{ \Carbon\Carbon::parse($product->creationDate)->format('d/m/Y') }}</td>

                  <td>
                    <a class="btn-sm btn-warning" href="{{ route('product.edit', ['id' => $product->id]) }}" title="Modifier le produit"><i class="fas fa-edit"></i></a>

                    <a class="btn-sm btn-danger" href="#" title="Supprimer le produit" data-toggle="modal" data-target="#confirmDeleteModal{{$product->id}}">
                      <i class="fas fa-trash-alt"></i>
                    </a>  
                    
                    <div class="modal fade" id="confirmDeleteModal{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel{{$product->id}}" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="confirmDeleteModalLabel{{$product->id}}">Confirmation de suppression</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  Êtes-vous sûr de vouloir supprimer ce produit ?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <form id="deleteForm{{$product->id}}" action="{{ route('product.delete', ['id' => $product->id]) }}" method="POST">
                                      @csrf
                                      @method('get')
                                      <button type="button" class="btn btn-danger" onclick="confirmDelete({{$product->id}})">Supprimer</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                   
                  </td>
                </tr>
                @empty

                <tr>
                    <td class="cell text-center" colspan="7">Aucun produit ajoutés</td>

                </tr>
                @endforelse


                </tfoot>
              </table>
            </div> 
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>

  

  <script>
      function confirmDelete(productId) {
          document.getElementById('deleteForm' + productId).submit();
      }
  </script>

  @endsection
