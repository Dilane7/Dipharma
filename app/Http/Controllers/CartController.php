<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Models\Product;

class CartController extends Controller
{
    //
    /**
     * Affiche le contenu du panier du client.
     */
    public function index(): View
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['product']->prix * $item['quantity'];
        }
        return view('cart.index', compact('cart', 'total'));
    }

    /**
     * Ajoute un produit au panier.
     */
    public function add(Product $product, Request $request): JsonResponse
{
    $quantity = $request->input('quantity', 1);
    $cart = session()->get('cart', []);

    if (isset($cart[$product->id])) {
        $cart[$product->id]['quantity'] += $quantity;
    } else {
        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $quantity,
        ];
    }

    session()->put('cart', $cart);

    return response()->json(['success' => true, 'cartItemCount' => count(session('cart'))]);
}
    /**
     * Met à jour la quantité d'un produit dans le panier.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $request->quantity;
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Panier mis à jour !');
    }

    /**
     * Supprime un produit du panier.
     */
    public function remove(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Produit retiré du panier !');
    }
}
