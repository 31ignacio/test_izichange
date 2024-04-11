@extends('layouts.master2')

@section('content')


<section class="content">
    <div class="container-fluid">

 
      <div class="row">
        <div class="col-12">

            {{-- <a href="{{ route ('client.create')}}" class="btn  bg-gradient-primary">Ajouter client</a><br><br> --}}

           
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
            <div class="card-header">
              <h2 class="card-title">Liste des produits</h2>
            </div>
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
                    {{-- <a href="{{ route('client.detail', ['client' => $client->id]) }}" class="btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                    <a class="btn-sm btn-warning" href="{{ route('client.edit', $client->id) }}"><i class="fas fa-edit"></i></a>

                    
                   
                    <a class="btn-sm btn-danger" href="{{ route('client.delete', $client->id) }}"><i class="fas fa-trash-alt"></i></a> --}}
                 
                   
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>

  @endsection
