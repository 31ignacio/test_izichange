<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductNewRequest;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    //

    public function index(){
    
        $products = Product::all();
        return view('templates.product.liste',compact('products'));

    }

    public function new(){


        return view('templates.product.new');

    }

    public function store(Product $product, ProductNewRequest $request){

        $date = Carbon::now();
        $dateFormatee = $date->format('Y-m-d H:i:s');

        try {
            $product->name = $request->name;
            $product->priceHt = $request->priceHt;
            $product->creationDate = $dateFormatee;


            $product->save();

            // dd($client);

            return redirect()->route('product.index')->with('success_message', 'Produit enregistré avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function edit($id){

        $product = Product::find($id);

        return view('templates.product.edit', compact('product'));
    }

    public function update($id, ProductNewRequest $request)
    {

        $product = Product::find($id);
        //Enregistrer un nouveau département
        $date = Carbon::now();
        $dateFormatee = $date->format('Y-m-d H:i:s');

        try {
            $product->name = $request->name;
            $product->priceHt = $request->priceHt;
            $product->dateUpdate = $dateFormatee;


            $product->update();

            return redirect()->route('product.index')->with('success_message', 'Produit mis à jour avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function delete($id)
    {
        $product = Product::find($id);
        try {
            $product->delete();

            return redirect()->route('product.index')->with('success_message', 'Produit supprimé avec succès');
        } catch (Exception $e) {
            dd($e);
        }
    }

    public function accueil(){

        return view('accueil');
    }
    
}
