<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductLookupController extends Controller
{
    public function lookup(Product $product)
    {
        if (!$product || !$product->is_available) {
            return response()->json(['error' => 'Produit non trouvé ou indisponible'], 404);
        }

        return response()->json([
            'id' => $product->id,
            'name' => $product->name,
            'prix' => $product->prix,
            'quantity' => $product->quantity, // Available quantity
        ]);
    }
}