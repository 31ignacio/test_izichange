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
}
