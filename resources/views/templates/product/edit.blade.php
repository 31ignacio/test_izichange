@extends('layouts.master2')

@section('content')

<div class="col-lg-8 col-md-10 mx-auto shadow rounded p-3 mb-5">
    <h5 class="text-muted text-center"> Editer un produit</h5>
</div>

    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-secondary">
            <div class="card-header">
                {{-- <h3 class="card-title">Editer un produit</h3> --}}
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="settings-form" method="POST" action="{{ route('product.update', ['id' => $product->id]) }}">

                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name">Produit</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" placeholder="Veuillez saisir le nom du produit">
                        
                        {{-- Affiche les erreur sous le input (le @error prend le name du input) --}}
                        @error('name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="priceHt">Prix hors taxe</label>
                            <input type="text" class="form-control" id="priceHt" name="priceHt" value="{{ $product->priceHt }}" placeholder="Veuillez saisir le prix hors taxe">
                        
                            {{-- Affiche les erreur sous le input (le @error prend le name du input) --}}
                            @error('priceHt')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-secondary" style="border-radius:10px;">Modifier</button>
                </div>
            </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-4"></div>

    </div>

@endsection
  