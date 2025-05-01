<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockMutation;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function index(): View
    {
        $stockMutations = StockMutation::with('product', 'user')->latest()->paginate(15);
        return view('stock.index', compact('stockMutations'));
    }

    public function addStock(Product $product): View
    {
        return view('stock.add', compact('product'));
    }

    public function storeAddStock(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'reason' => 'nullable|string|max:255',
        ]);

        StockMutation::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'quantity_change' => $request->quantity,
            'type' => 'ajout',
            'reason' => $request->reason,
        ]);

        $product->increment('quantity', $request->quantity);

        return redirect()->route('products.edit', $product)->with('success', 'Stock ajouté avec succès.');
    }

    public function removeStock(Product $product): View
    {
        return view('stock.remove', compact('product'));
    }

    public function storeRemoveStock(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->quantity,
            'reason' => 'nullable|string|max:255',
        ]);

        StockMutation::create([
            'product_id' => $product->id,
            'user_id' => Auth::id(),
            'quantity_change' => -$request->quantity,
            'type' => 'retrait',
            'reason' => $request->reason,
        ]);

        $product->decrement('quantity', $request->quantity);

        return redirect()->route('products.edit', $product)->with('success', 'Stock retiré avec succès.');
    }
}
