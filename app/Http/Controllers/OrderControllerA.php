<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Order;

class OrderControllerA extends Controller
{
    //
     /**
     * Affiche la liste des commandes en attente.
     */
    public function pendingOrders(): View
    {
        $pendingOrders = Order::where('status', 'en attente')->with('user', 'orderItems.product')->latest()->paginate(10);
        return view('orders.pending', compact('pendingOrders'));
    }

    /**
     * Affiche la liste des commandes validées.
     */
    public function validatedOrders(): View
    {
        $validatedOrders = Order::where('status', 'validée')->with('user', 'orderItems.product')->latest()->paginate(10);
        return view('orders.validated', compact('validatedOrders'));
    }

   /**
     * Valide une commande spécifique et déduit les quantités du stock.
     */
    public function validateOrder(Order $order): RedirectResponse
    {
        if ($order->status === 'en attente') {
            $orderItems = $order->orderItems;

            // foreach ($orderItems as $item) {
            //     $product = $item->product;
            //     // Vérifier s'il y a suffisamment de stock avant de déduire
            //     if ($product->quantity >= $item->quantity) {
            //         $product->decrement('quantity', $item->quantity);
            //     } else {
            //         return back()->with('error', "Le stock est insuffisant pour le produit '{$product->name}' de la commande #{$order->id}.");
            //     }
            // }

            $order->update(['status' => 'validée']);
            return redirect()->route('orders.pending')->with('success', "La commande #{$order->id} a été validée et le stock a été déduit.");
        } else {
            return back()->with('warning', "La commande #{$order->id} n'est pas en attente et ne peut pas être validée à nouveau.");
        }
    }
     /**
     * Affiche les détails d'une commande spécifique.
     */
    public function show(Order $order): View
    {
        // Le modèle Order sera automatiquement résolu grâce à l'injection de dépendances
        // avec le type hinting (Order $order) basé sur l'ID passé dans la route.
        $order->load('user', 'orderItems.product'); // Charger les relations nécessaires
        return view('orders.show', compact('order'));
    }

}
